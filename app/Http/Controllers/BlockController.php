<?php

namespace App\Http\Controllers;

use ArkEcosystem\Client\Connection;
use Exception;
use Illuminate\Support\Facades\Log;

class BlockController extends Controller
{
    /**
     * Connection to the ARK API
     *
     * @var \ArkEcosystem\Client\Connection
     */
    protected $connection;

    /**
     * Constructor for Blocks
     *
     * @param \ArkEcosystem\Client\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Show one specific Block
     *
     * @param string $blockId
     * @return \Illuminate\View\View
     */
    public function show(string $blockId)
    {
        try {
            $apiResponse = $this->connection->blocks()->show($blockId);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $block = $apiResponse['data'] ?? [];

        return view('block.show', compact('block'));
    }
}
