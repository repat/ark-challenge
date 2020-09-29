<?php

namespace App\Http\Controllers;

use App\Services\ArkService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Service class for Ark API connection
     *
     * `protected` so extended Controllers can access it
     */
    protected ?ArkService $arkService;

    public function __construct(ArkService $arkService)
    {
        $this->arkService = $arkService;
    }
}
