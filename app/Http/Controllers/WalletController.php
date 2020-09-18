<?php

namespace App\Http\Controllers;

use ArkEcosystem\Ark\Facades\Ark;
use Exception;
use Illuminate\Support\Facades\Log;

class WalletController extends Controller
{
    /**
     * Show a list of all wallet
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            $apiResponse = Ark::connection(auth()->user()->net)->wallets()->all();
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $wallets = $apiResponse['data'] ?? [];

        return view('wallet.index', compact('wallets'));
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
            $apiResponse = Ark::connection(auth()->user()->net)->wallets()->show($walletAddress);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        // Filter out transactions as they are fetched below
        $wallet = array_filter($apiResponse['data'] ?? [], fn($key) => $key !== 'transactions');

        try {
            $apiResponse = Ark::connection(auth()->user()->net)->wallets()->transactions($walletAddress);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $transactions = $apiResponse['data'] ?? [];

        return view('wallet.show', compact('wallet', 'transactions'));
    }
}
