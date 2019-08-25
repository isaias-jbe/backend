<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\repositories\Contracts\UserRepositoryInterface;
use App\repositories\Contracts\EventRepositoryInterface;
use App\repositories\Core\Eloquent\EloquentUserRepository;
use App\repositories\Core\Eloquent\EloquentEventRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            EventRepositoryInterface::class,
            EloquentEventRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            EloquentUserRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
