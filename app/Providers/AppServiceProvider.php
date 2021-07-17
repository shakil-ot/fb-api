<?php

namespace App\Providers;

use App\Contracts\Services\FacebookMarketingContract;
use App\Services\FacebookMarketingService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FacebookMarketingContract::class,FacebookMarketingService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
