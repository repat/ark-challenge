<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Log;

class BlockController extends Controller
{
    /**
     * Show one specific Block
     *
     * @param string $blockId
     * @return \Illuminate\View\View
     */
    public function show(string $blockId)
    {
        try {
            $apiResponse = Ark::connection(auth()->user()->net)->blocks()->show($blockId);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $block = $apiResponse['data'] ?? [];

        return view('block.show', compact('block'));
    }
}
