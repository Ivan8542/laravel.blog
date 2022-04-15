<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PushAllServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(\App\Service\Pushall::class, function () {
            return new \App\Service\Pushall(config('ivan.pushall.api.key')) ;
        });
    }
}
