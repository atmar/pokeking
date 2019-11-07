<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pokemon;
use App\Models\PokemonProfile;

class RetrievePokemonProfiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pokemon:retrieve-profiles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve Pokemon profiles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Retrieve all pokemons, can use ::all() since the table is not that big
        $pokemons = Pokemon::all();

        foreach ($pokemons as $pokemon) {
            $this->retrieveProfile($pokemon->url);
        }
    }

    private function retrieveProfile(string $url) : void {

        $response = file_get_contents($url);
        $response = json_decode($response);
  
        // Pokemon must have a height of 50 and have a front sprite
        if ($response->height >= 50 && $response->sprites->front_default) {

            // Check if the pokemon already exists in DB, else update it
            $pokemonProfile = PokemonProfile::where('pokemon_id','=', $response->id)->first();

            if (!$pokemonProfile) {
                $pokemonProfile = new PokemonProfile;
            }

            $pokemonProfile->pokemon_id = $response->id;
            $pokemonProfile->abilities = $response->abilities;
            $pokemonProfile->base_experience = $response->base_experience;
            $pokemonProfile->forms = $response->forms;
            $pokemonProfile->game_indices = $response->game_indices;
            $pokemonProfile->height = $response->height;
            $pokemonProfile->held_items = $response->held_items;
            $pokemonProfile->is_default = $response->is_default;
            $pokemonProfile->location_area_encounters = $response->location_area_encounters;
            $pokemonProfile->moves = $response->moves;
            $pokemonProfile->name = $response->name;
            $pokemonProfile->order = $response->order;
            $pokemonProfile->species = $response->species;
            $pokemonProfile->sprites = $response->sprites;
            $pokemonProfile->stats = $response->stats;
            $pokemonProfile->types = $response->types;
            $pokemonProfile->weight = $response->weight;

            $pokemonProfile->save();
        }
    }
}
