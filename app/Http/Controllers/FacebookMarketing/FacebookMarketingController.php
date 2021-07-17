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

    public function AdAccount(Request $request)
    {
        //dd($request->all());
        return $this->facebookMarketingService->AdAccountAPI($accessToken = 'EAAqXFOLkdBcBAFh8PwhdZBJcIyu8BFDn5JO4skOZBkoy1tlF90arZA68LkVL7jMMoGwjGmqTMreiuiLravtZBZCYXep8rae3QnMQb319beWGQNKoceqm2CD5HNdZArqehBf3YVpqQeoPhS6NherpDZALYLay9TdfZAVF8cW6ZB8IKUkHZBBhGGmMrZCx6ZCWn8ddfDIZCP2ZBOWzZCRDQZDZD', $actAdAccount = 'act_343129890791839');
    }

    public function getPageList(Request $request)
    {
        //dd($request->all());
        return $this->facebookMarketingService->getPageListAPI($request['access_token']);
    }

    public function getPixelList(Request $request)
    {
        // dd($request->all());
        return $this->facebookMarketingService->getPixelListAPI($request['access_token'],['business_id']);
    }

    public function getInstagramList(Request $request)
    {
        dd($request->all());
        return $this->facebookMarketingService->getInstagramListAPI();
    }

    public function getAdAccountList(Request $request)
    {
        dd($request->all());
        return $this->facebookMarketingService->getAdAccountListAPI();
    }

    public function InvitePeople(Request $request)
    {
        //dd($request->all());
        return $this->facebookMarketingService->InvitePeopleAPI($request['access_token,business_id,email,role']);
    }


    public function GrantAccesstoAssetsforAnotherBusinessManager(Request $request)
    {
        dd($request->all());
        return $this->facebookMarketingService->GrantAccesstoAssetsforAnotherBusinessManagerAPI($request[]);
    }


    public function getSystemUser(Request $request)
    {
        dd($request->all());
        return $this->facebookMarketingService->getSystemUserAPI($request[]);
    }

    public function createBusinessManager(Request $request)
    {
        dd($request->all());
        return $this->facebookMarketingService->createBusinessManagerAPI($request[]);
    }

    public function clientAdAccount(Request $request)
    {
        dd($request->all());
        return $this->facebookMarketingService->clientAdAccountAPI($request[]);
    }

    public function claimClientPage(Request $request)
    {
        dd($request->all());
        return $this->facebookMarketingService->claimClientPageAPI($request[]);
    }

    public function claimAdAccount(Request $request)
    {
        dd($request->all());
        return $this->facebookMarketingService->claimAdAccountAPI($request[]);
    }
}
