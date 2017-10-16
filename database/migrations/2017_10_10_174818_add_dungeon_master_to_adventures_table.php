<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDungeonMasterToAdventuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('adventures', function(Blueprint $table) {
            $table->integer('dungeon_master')->nullable()->unsigned();
            $table->foreign('dungeon_master')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adventures', function(Blueprint $table) {
            $table->dropColumn('dungeon_master');
        });
    }
}
