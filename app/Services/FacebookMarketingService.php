<?php

namespace App\Services;

use App\Contracts\Services\FacebookMarketingContract;
use Illuminate\Http\Request;

class FacebookMarketingService implements FacebookMarketingContract
{
    /**
     * @var string
     */
    private $fbUrl;

    public function __construct()
    {
        $this->fbUrl = "https://graph.facebook.com/" . env("FB_VERSION") . "/";
    }


    /**
     * @return mixed
     */
    public function testApi()
    {
        return "Test success";
    }

    public function adAccountAPI(Request $request)
    {

        $ch = curl_init();
        $url = $this->fbUrl.'/me/businesses?access_token='.trim($request['access_token']);


        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $headers = array();

        $headers[] = 'Content-Type: application/x-www-form-urlencoded';

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }

    public function getPageListAPI(Request $request)
    {
        $ch = curl_init();

        $url = $this->fbUrl . "me/accounts?access_token=" . trim($request['access_token']);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }

    /**
     * This is The list of pixel ID
     *
     * future work : get the name of the pixel like ?fields=name
//     * @param$accessToken
//     * @param$businessId
     * @returnmixed
     */


    public function getPixelListAPI(Request $request)
    {
        $ch = curl_init();
        $url = $this->fbUrl.$request['businessId'].'/adspixels?fields=name&access_token='.trim($request['access_token']);

        //curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v11.0/<business_id>/adspixels?fields=name&&access_token=');

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        // curl_setopt($ch, CURLOPT_POSTFIELDS, "fields=name\"code\"&access_token=");

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;

    }

    public function getInstagramListAPI(Request $request)
    {
        //To check all the Instagram accounts that are owned by a business or that can be accessed by a business,
        // make a GET request:

        $ch = curl_init();

        $url = $this->fbUrl.$request['businessId']."/instagram_accounts?fields=username&access_token=".$request['access_token'];

        curl_setopt($ch, CURLOPT_URL, $url);


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


        $headers = array();

        $headers[] = 'Content-Type: application/x-www-form-urlencoded';

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;

        //https://developers.facebook.com/docs/instagram/ads-api/guides/ig-accounts-with-business-manager#account_api

    }

    public function InvitePeopleAPI(Request $request)
    {

        $ch = curl_init();

        $url = $this->fbUrl . $request['business_id'] . "/business_users";


        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'email' => $request['email'],//'shakil.neub@gmail.com',
            'role' => $request['role'],//'ADMIN',
            'access_token' => trim($request['access_token'])
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    //dd($result,true);
        return $result;


    }

    public function grantAccessToAssetsForAnotherBusinessManagerAPI(Request $request)
    {
        $ch = curl_init();
        $url = $this->fbUrl.$request['pageId']."/agencies?access_token=".$request['access_token'];

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POST, 1);

        $post = array(
            'business' => $request['businessId'],
            'permitted_tasks' => $request['permitted_task']  //[ADMIN, MODERATOR]
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);


        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;

    }

    public function getSystemUserAPI(Request $request)
    {
        $ch = curl_init();

        $url = $this->fbUrl.$request['businessId']."/system_users?access_token=".$request['access_token'];

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);


        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }

    public function createBusinessManagerAPI(Request $request)
    {
        $access_token = "";
        $ch = curl_init();

        $url = $this->fbUrl.$request['partnerBusinessId']."/businesses";
      //  curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v2.11/619658698964160/businesses');

        curl_setopt($ch, CURLOPT_URL,$url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POST, 1);

        $post = array(
            'name' => $request['pageName'],
            'vertical' => $request['pageRole'],
            'primary_page' => $request['pageId'],
            'timezone_id' => '1',
            'access_token' => $request[$access_token]
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);



        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;

    }

    public function clientAdAccountAPI(Request $request)
    {
        //https://developers.facebook.com/docs/marketing-api/business-asset-management/guides/business-to-business
            //client ad account

        $ch = curl_init();

        $url = $this->fbUrl.$request['business_id']."/client_ad_accounts?access_token=".$request['access_token'];
        curl_setopt($ch, CURLOPT_URL, $url);

        //curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v11.0/<BUSINESS_ID>/client_ad_accounts?access_token=<ACCESS_TOKEN>');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'adaccount_id' => $request['act_adAccount'],
            'permitted_tasks' => $request['pageRole']
        );

        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);


        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;

    }

    public function claimClientPageAPI(Request $request)
    {

        $ch = curl_init();
        /**
         *
         *
         * Business ID hobe client er and access token hobe user er
         * example business id shakil vai er
         * page id and access token abir er
         *
         *
         *
         */
        $url = $this->fbUrl.$request['clientBusinessId']."/client_pages";

            //curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v11.0/client business ID/client_pages');

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POST, 1);

        $post = array(
            'page_id' => $request['pageId'],
            'permitted_tasks' => $request['pageRole'],
            'access_token' => $request['access_token']
        );

        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);


        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        //dd($result,true);
        return $result;

    }

    public function claimAdAccountAPI(Request $request)
    {

        $ch = curl_init();

        $url = $this->fbUrl.$request['businessId']."/owned_ad_accounts";

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POST, 1);

        $post = array(
            'adaccount_id' => $request['act_adAccountId'],
            'access_token' => $request['access_token']
        );

        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;

        //https://developers.facebook.com/docs/marketing-api/business-asset-management/guides/ad-accounts

    }

}
