<?php

namespace App\Http\Controllers;

class DelegateController extends Controller
{
    /**
     * Show a list of all Delegates
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('delegate.index');
    }

    /**
     * Show one specific Delegate
     *
     * @param string $delegateAddress
     * @return \Illuminate\View\View
     */
    public function show(string $delegateAddress)
    {
        $delegate = $this->arkService->delegates()->show($delegateAddress);

        // Filter out transactions as they are fetched below
        $delegate = array_filter($delegate, fn ($key) => $key !== 'transactions');

        return view('delegate.show', compact('delegate'));
    }

    /**
     * Rendered partial for all Delegates
     *
     * @return string
     */
    public function _partial()
    {
        $delegates = $this->arkService->delegates()->all();

        return view('_partials.delegates', compact('delegates'))->render();
    }

    /**
     * Rendered wallet partial for one specific Delegate, picking out `vote` attribute in view
     *
     * @return string
     */
    public function _partialVote(string $delegateAddress)
    {
        $wallet = $this->arkService->wallets()->show($delegateAddress);

        return view('_partials.vote', compact('wallet'))->render();
    }
}
