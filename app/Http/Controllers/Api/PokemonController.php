<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

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
        $pokemons = PokemonsProfile::all();

        return ["success" => true, "pokemons" => $pokemons];
    }
}
