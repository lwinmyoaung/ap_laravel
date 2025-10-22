<?php

namespace App\Providers;

use App\Test;
use Illuminate\Support\ServiceProvider;

class SampleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // // Creating Manually Facade using Manual Service Provider
        // $this->app->bind('test',function(){
        //     return new Test();
        // });

        // Implict Binding
        $this->app->bind('test',function(){
            return new Test('LwinMyoAung');
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
