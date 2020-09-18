<?php

namespace App\Http\Controllers;

use ArkEcosystem\Ark\Facades\Ark;
use Exception;
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
            $apiResponse = Ark::connection(auth()->user()->net)->transactions()->show($transactionId);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $transaction = $apiResponse['data'] ?? [];

        return view('transaction.show', compact('transaction'));
    }
}
