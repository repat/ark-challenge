<?php

namespace App\Http\Controllers;

use ArkEcosystem\Ark\Facades\Ark;
use Exception;
use Illuminate\Support\Facades\Cache;
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

    /**
     * Rendered partial
     *
     * @return string
     */
    public function _partial()
    {
        $blocks = Cache::remember('blocks', config('ark.blockchain_update_seconds'), function () {
            try {
                $apiResponse = Ark::connection(auth()->user()->net)->blocks()->all(['limit' => config('ark.limits.blocks')]) ?? [];
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
            return $apiResponse['data'] ?? [];
        });
        return view('_partials.blocks', compact('blocks'))->render();
    }
}
