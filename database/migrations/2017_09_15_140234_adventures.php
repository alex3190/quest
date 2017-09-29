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
            $table->integer('max_nr_of_players');
            $table->boolean('is_full');
            $table->boolean('occurred');
            $table->integer('dungeon_master')->nullable();
            $table->enum('status', ['new', 'planned', 'occurred']);
            $table->string('city');
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
