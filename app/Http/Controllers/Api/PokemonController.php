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
        $pokemons = PokemonProfile::select('sprites','name','base_experience','height','weight')
        ->orderBy('weight','desc')
        ->paginate(5);

        return ["success" => true, "pokemons" => $pokemons];
    }

    /**
     * Get the pokeking according to highest base stats
     *
     * @param Request $request
     * @return void
     */
    public function getPokeKing(Request $request) {
       
        $pokeKing = PokemonProfile::orderBy('sum_base_stats','desc')->first();

        return ["success" => true, "pokeking" => $pokeKing];
    }
}
