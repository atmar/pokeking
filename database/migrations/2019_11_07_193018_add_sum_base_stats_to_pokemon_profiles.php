<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSumBaseStatsToPokemonProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pokemon_profiles', function (Blueprint $table) {
            $table->integer('sum_base_stats')->after('stats')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pokemon_profiles', function (Blueprint $table) {
            $table->dropColumn('sum_base_stats');
        });
    }
}
