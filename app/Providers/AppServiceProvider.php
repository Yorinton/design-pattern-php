<?php

namespace App\Providers;

use DesignPattern\Repository\Pattern3\TodoItemRepository;
use DesignPattern\Repository\TodoItemRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TodoItemRepositoryInterface::class,
            TodoItemRepository::class
        );
    }
}
