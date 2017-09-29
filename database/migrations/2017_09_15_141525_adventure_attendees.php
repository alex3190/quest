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
            $table->integer('adventure_id');
            $table->boolean('is_dm');
            $table->boolean('is_host');
            $table->string('place');
            $table->string('inventory');
            $table->enum('availability', ['anytime', 'weeknights', 'weekdays', 'weekend', 'none']);
            $table->string('experience_with_games');
            $table->integer('user_id');
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
        Schema::dropIfExists('adventure_attendees');
    }
}
