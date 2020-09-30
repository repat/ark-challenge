<?php

namespace App\Http\Controllers;

use App\Facades\ArkService;

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
        $delegate = ArkService::delegates()->show($delegateAddress);

        return view('delegate.show', compact('delegate'));
    }

    /**
     * Rendered partial for all Delegates
     *
     * @return string
     */
    public function _partial()
    {
        $delegates = ArkService::delegates()->all();

        return view('_partials.delegates', compact('delegates'))->render();
    }

    /**
     * Rendered wallet partial for one specific Delegate, picking out `vote` attribute in view
     *
     * @return string
     */
    public function _partialVote(string $delegateAddress)
    {
        $wallet = ArkService::wallets()->show($delegateAddress);

        return view('_partials.vote', compact('wallet'))->render();
    }
}
