<?php

namespace App\Providers;

use App\Services\Opentdb\OpentdbService;
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
        $this->app->singleton(
            abstract: OpentdbService::class,
            concrete: fn () => new OpentdbService(
                baseUrl: config('services.opentdb.url'),
                apiToken: config('services.opentdb.token'),
            ),
        );
    }
}
