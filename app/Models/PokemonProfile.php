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

    
    /**
     * Store the data of Pokemon API 
     *
     * @param [type] $data
     * @return void
     */
    public function store($data)
    {
        $this->pokemon_id = $data->id;
        $this->abilities = $data->abilities;
        $this->base_experience = $data->base_experience;
        $this->forms = $data->forms;
        $this->game_indices = $data->game_indices;
        $this->height = $data->height;
        $this->held_items = $data->held_items;
        $this->is_default = $data->is_default;
        $this->location_area_encounters = $data->location_area_encounters;
        $this->moves = $data->moves;
        $this->name = $data->name;
        $this->order = $data->order;
        $this->species = $data->species;
        $this->sprites = $data->sprites;
        $this->stats = $data->stats;
        $this->types = $data->types;
        $this->weight = $data->weight;

        // Pre-define the sum of base stats in a column to query for this value a lot faster
        $this->sum_base_stats = collect($data->stats)->sum(function ($stat) {
            return $stat->base_stat;
        });

        $this->save();
    }
}
