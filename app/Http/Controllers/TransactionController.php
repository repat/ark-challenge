<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    /**
     * Show one specific Transaction
     *
     * @param string $transactionId
     * @return \Illuminate\View\View
     */
    public function show(string $transactionId)
    {
        try {
            $transaction = $this->arkService->transactions()->show($transactionId);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        // Replace Transaction type number by title from API's /transaction/types directly in underlying `data` array
        $transaction->setDataArray($this->replaceTransactionTypes($transaction->getDataArray()));

        return view('transaction.show', compact('transaction'));
    }

    /**
     * Rendered partial
     *
     * @return string
     */
    public function _partial()
    {
        $transactions = Cache::remember('transactions', config('ark.blockchain_update_seconds'), function () {
            return $this->arkService->transactions()->all(['limit' => config('ark.limits.transactions')]);
        });

        return view('_partials.transactions', compact('transactions'))->render();
    }

    /**
     * Replaces transaction type based on groupId with english identifier returned by API
     * Cached forever, will have to be flushed when a new one is added
     *
     * @param array $transaction
     * @return array
     */
    private function replaceTransactionTypes(array $transaction) : array
    {
        // This won't change much, remember it forever aka until next redployment
        $types = Cache::rememberForever('transaction.types', function () {
            try {
                /**
                 * 1 : // Group
                 *      - Transfer : 0
                 *      - SecondSignature : 1
                 *      - ...
                 * 2: // Group
                 *      - BusinessRegistration : 0
                 *      - BusinessResignation : 1
                 *      - ...
                 */
                return $this->arkService->reset()->transactions()->types()->getDataArray();
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
        });

        $types = $types[$transaction['typeGroup']] ?? [];
        $types = array_flip($types); // not array anymore but ArkModel
        $transaction['type'] = $types[$transaction['type']] ?? trans('general.crud.unknown');

        return $transaction;
    }
}
