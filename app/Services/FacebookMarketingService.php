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
}
