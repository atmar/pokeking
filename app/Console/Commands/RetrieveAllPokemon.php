<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pokemon;

class RetrieveAllPokemon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pokemon:retrieve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve all pokemons';

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
        $this->retrievePokemons("https://pokeapi.co/api/v2/pokemon");
    }

    /**
     * Retrieve the pokemons through the API URL
     *
     * @param string $url
     * @return void
     */
    private function retrievePokemons(string $url) : void {

        $response = file_get_contents($url);
        $response = json_decode($response);

        // Save pokemon results in DB
        foreach ($response->results as $result) {
            Pokemon::updateOrCreate([
                "name" => $result->name,
                "url" => $result->url
            ]);
        }

        if ($response->next) {
            $this->retrievePokemons($response->next);
        }
    }
}
