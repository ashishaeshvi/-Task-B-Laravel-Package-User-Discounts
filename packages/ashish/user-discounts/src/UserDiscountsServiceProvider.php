<?php

namespace Ashish\UserDiscounts;

use Illuminate\Support\ServiceProvider;

class UserDiscountsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/user-discounts.php', 'user-discounts');
    }

    public function boot()
    {
         $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

        // Publish config
        $this->publishes([
            __DIR__.'/../config/user-discounts.php' => config_path('user-discounts.php'),
        ], 'config');
    }
}
