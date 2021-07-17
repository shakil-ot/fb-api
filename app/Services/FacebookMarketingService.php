<?php

namespace App\Services;

use App\Contracts\Services\FacebookMarketingContract;

class FacebookMarketingService implements FacebookMarketingContract
{

    /**
     * @return mixed
     */
    public function testApi($request)
    {
        $url = "facebook/". env('FB_VERSION') . "/hello/". $request['business_id'];

       return $url;
    }


}
