<?php

namespace App\Http\Controllers;

use Exception;
use ArkEcosystem\Client\Connection;

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
     * @param string $blockId@
     * @return \Illuminate\View\View
     */
    public function show(string $blockId)
    {
        try {
            $block = $this->connection->blocks()->show($blockId);
        } catch(Exception $e) {
            abort(418); // TODO
        }

        return view('block.show', compact('block'));
    }
}
