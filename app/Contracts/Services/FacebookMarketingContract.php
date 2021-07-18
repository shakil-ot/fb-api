<?php

namespace App\Contracts\Services;


use Illuminate\Http\Request;

interface FacebookMarketingContract
{
    public function adAccountAPI(Request $request); // done

    public function getPageListAPI(Request $request); // done

    public function getPixelListAPI(Request $request); //done

    public function getInstagramListAPI(Request $request); //done

    public function InvitePeopleAPI(Request $request); //done

    public function grantAccessToAssetsForAnotherBusinessManagerAPI(Request $request); //done

    public function getSystemUserAPI(Request $request); //done

    public function createBusinessManagerAPI(Request $request); //done

    public function clientAdAccountAPI(Request $request); //done

    public function claimClientPageAPI(Request $request); //done

    public function claimAdAccountAPI(Request $request); //done
}


