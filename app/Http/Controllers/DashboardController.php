<?php

namespace App\Http\Controllers;

use ArkEcosystem\Client\Connection;
use Exception;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
     * Connection to the ARK API
     *
     * @var \ArkEcosystem\Client\Connection
     */
    protected $connection;

    /**
     * Constructor for DashboardController
     *
     * @param \ArkEcosystem\Client\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Dashboard: Overview of Transactions and Blocks
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            $apiResponse = $this->connection->blocks()->all(['limit' => config('ark.limits.blocks')]) ?? [];
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        $blocks = $apiResponse['data'] ?? [];

        try {
            $apiResponse = $this->connection->transactions()->all(['limit' => config('ark.limits.transactions')]) ?? [];
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        $transactions = $apiResponse['data'] ?? [];

        return view('dashboard', compact('blocks', 'transactions'));
    }
}
