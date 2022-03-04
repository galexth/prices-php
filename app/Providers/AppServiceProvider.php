<?php

namespace App\Providers;

use App\Repositories\EloquentPriceRepository;
use App\Repositories\EloquentProductRepository;
use App\Repositories\PriceRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
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
        $this->app->bind(
            ProductRepositoryInterface::class,
            EloquentProductRepository::class
        );

        $this->app->bind(
            PriceRepositoryInterface::class,
            EloquentPriceRepository::class
        );
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
