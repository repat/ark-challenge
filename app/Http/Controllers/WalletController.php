<?php

namespace App\Http\Controllers;

use App\Facades\ArkService;

class WalletController extends Controller
{
    /**
     * Show a list of all Wallets
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
        $wallet = ArkService::wallets()->show($walletAddress);

        return view('wallet.show', compact('wallet'));
    }

    /**
     * Rendered partial for all Wallets
     *
     * @return string
     */
    public function _partial()
    {
        $wallets = ArkService::wallets()->all();

        return view('_partials.wallets', compact('wallets'))->render();
    }

    /**
     * Rendered transaction partial for one specific Wallet
     *
     * @return string
     */
    public function _partialTransactions(string $walletAddress)
    {
        $transactions = ArkService::wallets()->transactions($walletAddress);

        return view('_partials.transactions', compact('transactions'))->render();
    }
}
