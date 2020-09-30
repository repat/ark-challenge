<?php

namespace App\Http\Controllers;

use App\Facades\ArkService;
use Illuminate\Support\Facades\Cache;

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
        $block = ArkService::blocks()->show($blockId);

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
            return ArkService::blocks()->all(['limit' => config('ark.limits.blocks')]) ?? [];
        });
        return view('_partials.blocks', compact('blocks'))->render();
    }
}
