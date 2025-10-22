<?php

namespace App\Providers;

use App\Test;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // // Testing Laravel Real Container and AppServiceProvider Using double resolve() and bind() in AppServiceProvider
        // $this->app->bind('test',function(){
        //     return new Test('LwinMyoAung');
        // });

        // // Testing Laravel Real Container and AppServiceProvider Using double resolve() and singleton() in AppServiceProvider
        // $this->app->singleton('test',function(){
        //     return new Test('LwinMyoAung');
        // });

        // // Creating Manually Facade using Laravel Default Service Provider
        // $this->app->bind('test',function(){
        //     return new Test();
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
