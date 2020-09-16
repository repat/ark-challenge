<?php

namespace App\Http\Controllers;

use Exception;
use ArkEcosystem\Client\Connection;

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
     * Show one specific Trnasaction
     *
     * @param string $transactionId@
     * @return \Illuminate\View\View
     */
    public function show(string $blockId)
    {
        try {
            $transaction = $this->connection->blocks()->transactions($blockId);
        } catch(Exception $e) {
            abort(418); // TODO
        }

        return view('transaction.show', compact('transaction'));
    }
}
