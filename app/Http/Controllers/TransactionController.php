<?php

namespace App\Http\Controllers;

use ArkEcosystem\Client\Connection;
use Exception;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    /**
     * Connection to the ARK API
     *
     * @var \ArkEcosystem\Client\Connection
     */
    protected $connection;

    /**
     * Constructor for Transaction
     *
     * @param \ArkEcosystem\Client\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Show one specific Transaction
     *
     * @param string $transactionId
     * @return \Illuminate\View\View
     */
    public function show(string $transactionId)
    {
        try {
            $apiResponse = $this->connection->transactions($transactionId);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $transaction = $apiResponse['data'] ?? [];

        return view('transaction.show', compact('transaction'));
    }
}
