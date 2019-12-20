<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyConstraintsOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->unsignedBigInteger('territory')->change();
            $table->unsignedBigInteger('district')->change();
            $table->unsignedBigInteger('region')->change();
            $table->unsignedBigInteger('team')->change();

            $table->foreign('territory')->references('id')->on('territories');
            $table->foreign('district')->references('id')->on('districts');
            $table->foreign('region')->references('id')->on('regions');
            $table->foreign('team')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
