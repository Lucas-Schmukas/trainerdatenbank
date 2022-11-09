<?php

namespace App\Providers;


use App\Services\WebScrapper;
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
        $this->app->singleton(WebScrapper::class, function () {
            return new WebScrapper();
        });
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
    public function provides()
    {
        return [WebScrapper::class];
    }
}
