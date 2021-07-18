<?php

namespace App\Http\Controllers\FacebookMarketing;

use App\Contracts\Services\FacebookMarketingContract;
use App\Http\Controllers\Controller;
use App\User;
use Facebook\Facebook;
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

    public function fbLogin()
    {
        if(!session_id())
        {
            session_start();
        }

        $facebook = new Facebook([
            'app_id' => '2408007206010027', // Replace {app-id} with your app id
            'app_secret' => 'cc18de68828a45a105997e343bac2b6a',
            'default_graph_version' => 'v11.0',
        ]);

        $facebook_output = '';

        $facebook_helper = $facebook->getRedirectLoginHelper();

        if(isset($_GET['code']))
        {
            if(isset($_SESSION['access_token']))
            {
                $access_token = $_SESSION['access_token'];
                User::where([
                    'id' => 1
                ])->update([
                    'fb_access_token' => $access_token
                ]);
            }
            else
            {
                $access_token = $facebook_helper->getAccessToken();

                $_SESSION['access_token'] = $access_token;

                $facebook->setDefaultAccessToken($_SESSION['access_token']);
            }

            $_SESSION['user_id'] = '';
            $_SESSION['user_name'] = '';
            $_SESSION['user_email_address'] = '';
            $_SESSION['user_image'] = '';

            $graph_response = $facebook->get("/me?fields=name,email", $access_token);

            $facebook_user_info = $graph_response->getGraphUser();

            if(!empty($facebook_user_info['id']))
            {
                $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
            }

            if(!empty($facebook_user_info['name']))
            {
                $_SESSION['user_name'] = $facebook_user_info['name'];
            }

            if(!empty($facebook_user_info['email']))
            {
                $_SESSION['user_email_address'] = $facebook_user_info['email'];
            }

        }
        else
        {
            // Get login url
            $facebook_permissions = ['email']; // Optional permissions

            $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost:8000/fbLogin/');

            // Render Facebook login button
            $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'">Log in</a></div>';
        }




        $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost:8000/fbLogin/');

        // Render Facebook login button
        $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'">Log in</a></div>';


        return view('login-fb')->with([
            'facebook_login_url' => $facebook_login_url
        ]);


    }

}
