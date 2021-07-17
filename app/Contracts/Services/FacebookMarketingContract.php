<?php

namespace App\Contracts\Services;


interface FacebookMarketingContract
{
    //public function testApi();
    public function AdAccountAPI($accessToken, $actAdAccount);

    public function getPageListAPI($accessToken);

    public function getPixelListAPI($accessToken, $businessId);

    public function getInstagramListAPI();

    public function getAdAccountListAPI();

    public function InvitePeopleAPI($accessToken, $businessId, $email, $role);

    public function GrantAccesstoAssetsforAnotherBusinessManagerAPI();

    public function getSystemUserAPI();

    public function createBusinessManagerAPI();

    public function clientAdAccountAPI();

    public function claimClientPageAPI();

    public function claimAdAccountAPI();
}


