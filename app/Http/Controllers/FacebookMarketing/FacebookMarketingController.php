<?php

namespace App\Http\Controllers\FacebookMarketing;

use App\Contracts\Services\FacebookMarketingContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacebookMarketingController extends Controller
{
    /**
     * @var FacebookMarketingContract
     */
    private $facebookMarketingService;

    public function __construct(FacebookMarketingContract $facebookMarketingService)
    {
        $this->facebookMarketingService = $facebookMarketingService;

    }

    public function initTesting(Request $request)
    {
        return $this->facebookMarketingService->testApi($request);
    }

}
