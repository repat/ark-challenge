<?php

namespace App\Http\Controllers;

use ArkEcosystem\Ark\Facades\Ark;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
     * Dashboard: Overview of Transactions and Blocks
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $blocks = Cache::remember('blocks', config('ark.blockchain_update_seconds'), function () {
            try {
                $apiResponse = Ark::connection(auth()->user()->net)->blocks()->all(['limit' => config('ark.limits.blocks')]) ?? [];
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
            return $apiResponse['data'] ?? [];
        });

        $transactions = Cache::remember('transactions', config('ark.blockchain_update_seconds'), function () {
            try {
                $apiResponse = Ark::connection(auth()->user()->net)->transactions()->all(['limit' => config('ark.limits.transactions')]) ?? [];
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
            return $apiResponse['data'] ?? [];
        });

        return view('dashboard', compact('blocks', 'transactions'));
    }
}
