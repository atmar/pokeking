<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pokemon;

class RetrieveAllPokemon extends Command
{
    protected $bar;

    const POKEMON_URL = "https://pokeapi.co/api/v2/pokemon";

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
        $this->info("---- Starting Pokemon Retrieval ----");
        $this->initializeBar();
        $this->retrievePokemons(self::POKEMON_URL);
    }

    /**
     * Initalize the visualization bar
     *
     * @return void
     */
    private function initializeBar() : void
    {
        // Get the amount of pokemon through count
        $response = file_get_contents(self::POKEMON_URL);
        $response = json_decode($response);

        // Add a visual representation
        $this->bar = $this->output->createProgressBar($response->count);
        $this->bar->start();
    }

    /**
     * Retrieve the pokemons through the API URL
     *
     * @param string $url
     * @return void
     */
    private function retrievePokemons(string $url) : void
    {
        $response = file_get_contents($url);
        $response = json_decode($response);

        // Save pokemon results in DB
        foreach ($response->results as $result) {
            Pokemon::updateOrCreate([
                "name" => $result->name,
                "url" => $result->url
            ]);
        }

        $this->bar->advance(20);

        if ($response->next) {
            $this->retrievePokemons($response->next);
        } else {
            $this->bar->finish();
        }
    }
}
