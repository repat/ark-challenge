<?php

namespace App\Http\Controllers;

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
        $block = $this->arkService->blocks()->show($blockId);

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
            return $this->arkService->blocks()->all(['limit' => config('ark.limits.blocks')]) ?? [];
        });
        return view('_partials.blocks', compact('blocks'))->render();
    }
}
