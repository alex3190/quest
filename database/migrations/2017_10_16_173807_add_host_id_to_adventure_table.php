<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHostIdToAdventureTable extends Migration
{
    public function up()
    {

        Schema::table('adventures', function(Blueprint $table) {
            $table->integer('host_id')->nullable()->unsigned();
            $table->foreign('host_id')->references('id')->on('users');
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
            $table->dropColumn('host_id');
        });
    }
}
