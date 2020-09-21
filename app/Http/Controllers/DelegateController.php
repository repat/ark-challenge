<?php

namespace App\Http\Controllers;

use ArkEcosystem\Ark\Facades\Ark;
use Exception;
use Illuminate\Support\Facades\Log;

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
        try {
            $apiResponse = Ark::connection(auth()->user()->net ?? config('ark.default'))->delegates()->show($delegateAddress);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        // Filter out transactions as they are fetched below
        $delegate = array_filter($apiResponse['data'] ?? [], fn ($key) => $key !== 'transactions');

        return view('delegate.show', compact('delegate'));
    }

    /**
     * Rendered partial for all Delegates
     *
     * @return string
     */
    public function _partial()
    {
        try {
            $apiResponse = Ark::connection(auth()->user()->net ?? config('ark.default'))->delegates()->all();
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $delegates = $apiResponse['data'] ?? [];

        return view('_partials.delegates', compact('delegates'))->render();
    }

    /**
     * Rendered transaction partial for one specific Delegate
     *
     * @return string
     */
    public function _partialAddress(string $delegateAddress)
    {
        try {
            $apiResponse = Ark::connection(auth()->user()->net ?? config('ark.default'))->delegates()->transactions($delegateAddress);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $transactions = $apiResponse['data'] ?? [];

        return view('_partials.transactions', compact('transactions'))->render();
    }
}
