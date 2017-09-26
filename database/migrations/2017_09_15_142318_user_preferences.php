<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserPreferences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->enum('type', ['dungeonMaster', 'player', 'visitor'])->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->enum('availability', ['anytime', 'weeknights', 'weekdays', 'weekend', 'none'])->nullable();
            $table->string('game')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('users', function(Blueprint $table) {
           $table->dropColumn('country');
           $table->dropColumn('city');
           $table->dropColumn('availability');
       });
    }
}
