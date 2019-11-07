<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    /**
     * Set the table name
     *
     * @var string
     */
    protected $table = "pokemons";

    /**
     * Set the types of the attributes
     *
     * @var array
     */
    protected $casts = [
       "name" => "string",
       "url" => "string"
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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'url'];
}
