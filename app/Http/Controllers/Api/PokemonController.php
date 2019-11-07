<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PokemonProfile;

class PokemonController extends Controller
{
    /**
     * Get all the pokemons to display in table
     *
     * @param Request $request
     * @return void
     */
    public function get(Request $request)
    {
        $pokemons = PokemonProfile::all();

        return ["success" => true, "pokemons" => $pokemons];
    }
}
