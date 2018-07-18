<?php

namespace Supplier;

use Illuminate\Support\ServiceProvider;

class SupplierServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'supplier');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/supplier'),
        ]);
    }

    public function register(){

    }
}