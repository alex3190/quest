<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdventureAttendees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('adventure_attendees', function(Blueprint $table) {
            $table->integer('adventure_id')->unsigned();
            $table->increments('id');
            $table->boolean('is_dm')->nullable();
            $table->boolean('is_host')->nullable();
            $table->string('place')->nullable();
            $table->string('inventory')->nullable();
            $table->enum('availability', ['anytime', 'weeknights', 'weekdays', 'weekend', 'none']);
            $table->string('experience_with_games')->nullable();
            $table->integer('user_id')->unsigned();

            $table->timestamps();

        });

        Schema::table('adventure_attendees', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('adventure_id')->references('id')->on('adventures');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adventure_attendees');
    }
}
