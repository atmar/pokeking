<?php

namespace App\Observers;

use App\Models\PokemonProfile;
use Illuminate\Support\Facades\Cache;

class PokemonProfileObserver
{
    /**
     * Handle the PokemonProfile "saved" event.
     *
     * @param  \App\Models\PokemonProfile  $model
     * @return void
     */
    public function saved(PokemonProfile $model)
    {
        // Clean up the cached data with the tag "pokemons"
        Cache::tags(["pokemons"])->flush();
    }
}
