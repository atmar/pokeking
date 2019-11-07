<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\PokemonProfile;
use App\Observers\PokemonProfileObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        PokemonProfile::observe(PokemonProfileObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
