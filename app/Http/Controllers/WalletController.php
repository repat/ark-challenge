<?php

namespace App\Http\Controllers;

use ArkEcosystem\Ark\Facades\Ark;
use Exception;
use Illuminate\Support\Facades\Log;

class WalletController extends Controller
{
    /**
     * Show a list of all Wallet
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('wallet.index');
    }

    /**
     * Show one specific Wallet
     *
     * @param string $walletAddress
     * @return \Illuminate\View\View
     */
    public function show(string $walletAddress)
    {
        try {
            $apiResponse = Ark::connection(auth()->user()->net ?? config('ark.default'))->wallets()->show($walletAddress);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        // Filter out transactions as they are fetched below
        $wallet = array_filter($apiResponse['data'] ?? [], fn ($key) => $key !== 'transactions');

        return view('wallet.show', compact('wallet'));
    }

    /**
     * Rendered partial for all Wallets
     *
     * @return string
     */
    public function _partial()
    {
        try {
            $apiResponse = Ark::connection(auth()->user()->net ?? config('ark.default'))->wallets()->all();
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $wallets = $apiResponse['data'] ?? [];

        return view('_partials.wallets', compact('wallets'))->render();
    }

    /**
     * Rendered transaction partial for one specific Wallet
     *
     * @return string
     */
    public function _partialTransactions(string $walletAddress)
    {
        try {
            $apiResponse = Ark::connection(auth()->user()->net ?? config('ark.default'))->wallets()->transactions($walletAddress);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $transactions = $apiResponse['data'] ?? [];

        return view('_partials.transactions', compact('transactions'))->render();
    }
}
