<?php

namespace App\Providers;

use App\Observers\DemandObserver;
use App\Models\Demand;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Demand::observe(DemandObserver::class);
    }
}
