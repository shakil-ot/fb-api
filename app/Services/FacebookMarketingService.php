<?php

namespace App\Services;

use App\Contracts\Services\FacebookMarketingContract;

class FacebookMarketingService implements FacebookMarketingContract
{

    /**
     * @return mixed
     */
    public function testApi()
    {
        return "Test success";
    }

    public function AdAccountAPI($accessToken, $actAdAccount)
    {
        // return env("FBVERSION");
        $ch = curl_init();
        $url = "https://graph.facebook.com/" . env("FBVERSION") . "/$actAdAccount/users";

        //curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v2.11/act_<AD_ACCOUNT_ID>/users');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "access_token=$accessToken");

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $jsonResult = json_decode($result, true);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $jsonResult;
    }

    public function getPageListAPI($accessToken)
    {
        $ch = curl_init();
        $url = "https://graph.facebook.com/" . env("FBVERSION") . "/me/accounts?access_token=$accessToken";

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        //  dd(json_decode($result, true));
        $jsonResult = json_decode($result, true);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $jsonResult;
    }

    public function getPixelListAPI($accessToken, $businessId)
    {
        /**
         *
         *
         * This is The list of pixel ID
         *
         * future work : get the name of the pixel like ?fields=name
         */

        $ch = curl_init();
        $url = "https://graph.facebook.com/" . env("FBVERSION") . "/$businessId/adspixels?access_token=$accessToken";

        //curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v11.0/<business_id>/adspixels?fields=name&&access_token=');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        // curl_setopt($ch, CURLOPT_POSTFIELDS, "fields=name\"code\"&access_token=");

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        //  dd(json_decode($result, true));
        $jsonResult = json_decode($result, true);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $jsonResult;

    }

    public function getInstagramListAPI(): string
    {
        //To check all the Instagram accounts that are owned by a business or that can be accessed by a business,
// make a GET request:


        $ch = curl_init();


// curl_setopt($ch, CURLOPT_URL, 'business=100405035640930
// \"https://graph.facebook.com/v11.0/4100799329931256/authorized_adaccounts');
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v11.0/<business_id>/instagram_accounts");
        curl_setopt($ch, CURLOPT_URL, 'fields=username');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "access_token=\n-d");

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


// curl_setopt($ch, CURLOPT_URL, 'fields=username,profile_pic');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, "access_token=\n-d");

// $headers = array();
// $headers[] = 'Content-Type: application/x-www-form-urlencoded';
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        echo '<pre>';
        var_dump(json_decode($result, true));
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);


//https://developers.facebook.com/docs/instagram/ads-api/guides/ig-accounts-with-business-manager#account_api

    }

    public function getAdAccountListAPI(): string
    {
        return "This is get Ad Account List";
    }

    public function InvitePeopleAPI($accessToken, $businessId, $email, $role)
    {
        $ch = curl_init();
        $url = "https://graph.facebook.com/" . env("FBVERSION") . "$businessId/business_users";


        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'email' => $email,//'shakil.neub@gmail.com',
            'role' => $role,//'ADMIN',
            'access_token' => $accessToken
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);

        //dd(json_decode($result, true));
        $jsonResult = json_decode($result, true);

        // var_dump(json_decode($result,true));

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $jsonResult;

    }

    public function GrantAccesstoAssetsforAnotherBusinessManagerAPI()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v11.0/100340215658876/agencies?access_token=EAAqXFOLkdBcBACZCyKBDnQgNpHg7eWjDAVhAUugLHk21hGdx3edYjf6oZApg6DrLHUzurGQLwJsgPu7wFwpfGXGt29kuYRcZCzKuIdGeV1vD7Lsj4ZAdiB9tZCu4qGd6nyEw4SZBPixjZBoCaLHyoTdEn9jUuL2KmFPwfg2StEVKHZCgHdSx6IGdgWkeTwOyBuxfPDpymxdMSdSEwLS7wIod');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'business' => '100405035640930',
            'permitted_tasks' => '["MODERATE", "ADVERTISE", "ANALYZE"]'
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);
        echo '<pre>';
        var_dump(json_decode($result, true));
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

    }

    public function getSystemUserAPI()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v11.0/100405035640930/system_users?access_token=EAAqXFOLkdBcBAHFku0xtr7NB0HJLMETPQE71UhJtuT0duQ9ssi3gbsrE5HGV8xbYdRdFIZAKsBoOb7LqrIRjJO1eLpIJUUm0cZAdw3umRJhZBzMw1QYHnfS7MQ6vtj46LZBhZAluZAokikZAVPNJfuORputLGVWMxcJewL34QSI7ziYyxGaLYgzN0FG1egEX4uXUzoZCnZB96gfDYZCK6mFgfttMW6qFECxELH10O8Y6me0ITvArpHTdve');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        echo '<pre>';
        var_dump(json_decode($result, true));
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    public function createBusinessManagerAPI()
    {
        $access_token = "";
        $ch = curl_init();


        curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v2.11/619658698964160/businesses');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'name' => 'Apparel abir',
            'vertical' => 'ADVERTISING',
            'primary_page' => '1158471220834651',
            'timezone_id' => '1',
            'access_token' => $access_token
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);
        echo '<pre>';
        var_dump(json_decode($result, true));

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    public function clientAdAccountAPI()
    {
        //https://developers.facebook.com/docs/marketing-api/business-asset-management/guides/business-to-business
//client ad account
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v11.0/<BUSINESS_ID>/client_ad_accounts?access_token=');
//curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v11.0/<BUSINESS_ID>/client_ad_accounts?access_token=<ACCESS_TOKEN>');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'adaccount_id' => 'act_343129890791839',
            'permitted_tasks' => '["ADVERTISE","ANALYZE"]'
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);
        echo '<pre>';
        var_dump(json_decode($result, true));
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    public function claimClientPageAPI()
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

//curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v11.0/client business ID/client_pages');
        curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v11.0/619658698964160/client_pages');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'page_id' => '',
            'permitted_tasks' => '["ADVERTISE", "ANALYZE"]',
            'access_token' => ''
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);
        echo '<pre>';
        var_dump(json_decode($result, true));
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    public function claimAdAccountAPI()
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v11.0/<BUSINESS_ID>/owned_ad_accounts');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'adaccount_id' => 'act_<AD_ACCOUNT_ID>',
            'access_token' => ''
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);
        echo '<pre>';
        var_dump(json_decode($result, true));
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

//https://developers.facebook.com/docs/marketing-api/business-asset-management/guides/ad-accounts
    }

}
