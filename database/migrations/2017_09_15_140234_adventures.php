<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Adventures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adventures', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('game_type', ['dnd5e', 'pathfinder', 'numenera', 'boardgames']);
            $table->integer('max_nr_of_players')->nullable();
            $table->enum('status', ['new', 'planned', 'occurred']);
            $table->string('city')->nullable();
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
        Schema::dropIfExists('adventures');
    }
}
