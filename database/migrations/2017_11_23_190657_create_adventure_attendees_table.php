<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdventureAttendeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adventure_attendees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('adventure_id')->unsigned();
            $table->boolean('is_dm')->default(0);
            $table->boolean('is_host')->default(0);
            $table->string('place')->nullable();
            $table->string('inventory')->nullable();
            $table->enum('availability', ['anytime', 'weeknights', 'weekdays', 'weekend', 'none']);
            $table->enum('application_status', ['not_reviewed', 'accepted', 'rejected'])->default('not_reviewed');
            $table->string('experience_with_games')->nullable();
            $table->string('message_to_creator')->nullable();
            $table->softDeletes();
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
