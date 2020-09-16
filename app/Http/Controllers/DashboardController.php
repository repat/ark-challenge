<?php

namespace App\Http\Controllers;

use ArkEcosystem\Client\Connection;

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
        $blocks = $this->connection->blocks()->all() ?? [];

        return view('dashboard', compact('blocks'));
    }
}
