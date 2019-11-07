<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pokemon_id')->unique()->index();
            $table->json('abilities');
            $table->integer('base_experience');
            $table->json('forms');
            $table->json('game_indices');
            $table->integer('height');
            $table->json('held_items');
            $table->boolean('is_default');
            $table->string('location_area_encounters');
            $table->json('moves');
            $table->string('name');
            $table->integer('order');
            $table->json('species');
            $table->json('sprites');
            $table->json('stats');
            $table->json('types');
            $table->integer('weight')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon_profiles');
    }
}
