<?php

namespace App\Contracts\Services;


use Illuminate\Http\Request;

interface FacebookMarketingContract
{
    public function adAccountAPI(Request $request); // done

    public function getPageListAPI(Request $request); // done

    public function getPixelListAPI($accessToken, $businessId);

    public function getInstagramListAPI();

    public function getAdAccountListAPI();

    public function InvitePeopleAPI(Request $request);

    public function grantAccessToAssetsForAnotherBusinessManagerAPI(Request $request);

    public function getSystemUserAPI(Request $request);

    public function createBusinessManagerAPI();

    public function clientAdAccountAPI();

    public function claimClientPageAPI();

    public function claimAdAccountAPI();
}


