<?php

namespace App\Providers;

use App\Repositories\Contracts\ {
    PautaRepositoryInterface
};
use App\Repositories\PautaRepository;


use Illuminate\Support\ServiceProvider;

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
            PautaRepositoryInterface::class,
            PautaRepository::class
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
