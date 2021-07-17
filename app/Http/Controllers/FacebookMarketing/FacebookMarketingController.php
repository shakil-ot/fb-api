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

    public function adAccount(Request $request)
    {
        return $this->facebookMarketingService->adAccountAPI($request);
    }

    public function getPageList(Request $request)
    {
        return $this->facebookMarketingService->getPageListAPI($request);
    }

    public function getPixelList(Request $request)
    {
        // dd($request->all());
        return $this->facebookMarketingService->getPixelListAPI($request['access_token'], $request['business_id']);
    }

    public function getInstagramList(Request $request)
    {
        return $this->facebookMarketingService->getInstagramListAPI();
    }

    public function invitePeople(Request $request)
    {
        return $this->facebookMarketingService->invitePeopleAPI($request);
    }


    public function grantAccessToAssetsForAnotherBusinessManagerAPI(Request $request)
    {
        return $this->facebookMarketingService->grantAccessToAssetsForAnotherBusinessManagerAPI($request);
    }


    public function getSystemUser(Request $request)
    {
        return $this->facebookMarketingService->getSystemUserAPI($request);
    }

    public function createBusinessManager(Request $request)
    {
        return $this->facebookMarketingService->createBusinessManagerAPI($request);
    }

    public function clientAdAccount(Request $request)
    {
        return $this->facebookMarketingService->clientAdAccountAPI($request);
    }

    public function claimClientPage(Request $request)
    {
        return $this->facebookMarketingService->claimClientPageAPI($request);
    }

    public function claimAdAccount(Request $request)
    {
        return $this->facebookMarketingService->claimAdAccountAPI($request);
    }
}
