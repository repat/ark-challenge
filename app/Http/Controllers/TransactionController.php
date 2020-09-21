<?php

namespace App\Http\Controllers;

use ArkEcosystem\Ark\Facades\Ark;
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
            $apiResponse = Ark::connection(auth()->user()->net ?? config('ark.default'))->transactions()->show($transactionId);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $transaction = $apiResponse['data'] ?? [];

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
            try {
                $apiResponse = Ark::connection(auth()->user()->net ?? config('ark.default'))->transactions()->all(['limit' => config('ark.limits.transactions')]) ?? [];
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
            return $apiResponse['data'] ?? [];
        });

        return view('_partials.transactions', compact('transactions'))->render();
    }
}
