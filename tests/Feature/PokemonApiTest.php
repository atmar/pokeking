<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PokemonApiTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
    }
    

    /**
     * Test can retrieve pokemons
     *
     * @return void
     */
    public function test_get_pokemons()
    {
        $response = $this->json('GET', '/api/v1/pokemons');

        // Assert status is correct
        $response->assertStatus(200)
       ->assertJson([
            "success" => true
       ]);
    }

    /**
     * Test can retrieve the pokeking
     *
     * @return void
     */
    public function test_get_pokeking()
    {
        $response = $this->json('GET', '/api/v1/pokeking');

        // Assert status is correct
        $response->assertStatus(200)
       ->assertJson([
            "success" => true
       ]);
    }
}
