<?php

namespace App\Http\Controllers;

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
        $wallet = $this->arkService->wallets()->show($walletAddress);

        // Filter out transactions as they are fetched below
        $wallet = array_filter($wallet ?? [], fn ($key) => $key !== 'transactions');

        return view('wallet.show', compact('wallet'));
    }

    /**
     * Rendered partial for all Wallets
     *
     * @return string
     */
    public function _partial()
    {
        $wallets = $this->arkService->wallets()->all();

        return view('_partials.wallets', compact('wallets'))->render();
    }

    /**
     * Rendered transaction partial for one specific Wallet
     *
     * @return string
     */
    public function _partialTransactions(string $walletAddress)
    {
        $transactions = $this->arkService->wallets()->transactions($walletAddress);

        return view('_partials.transactions', compact('transactions'))->render();
    }
}
