<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PokemonProfile extends Model
{
      /**
     * Set the table name
     *
     * @var string
     */
    protected $table = "pokemon_profiles";

    /**
     * Set the types of the attributes
     *
     * @var array
     */
    protected $casts = [
       "pokemon_id" => "integer",
       "abilities" => "json",
       "base_experience" => "integer",
       "forms" => "json",
       "game_indices" => "json",
       "height" => "integer",
       "held_items" => "json",
       "is_default" => "boolean",
       "location_area_encounters" => "string",
       "moves" => "json",
       "name" => "string",
       "order" => "integer",
       "species" => "json",
       "sprites" => "json",
       "stats" => "json",
       "types" => "json",
       "weight" => "integer"
    ];

    /**
     * Set the additional timestamp dates
     *
     * @var array
     */
    protected $dates = [
      
    ];

    /**
     * Set hidden attributes
     *
     * @var array
     */
    protected $hidden = [
      
    ];

    /**
     * The attributes that are mass guarded.
     *
     * @var array
     */
    protected $guarded = [

    ];
}
