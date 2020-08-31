<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_team', function (Blueprint $table) {
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('team');

            $table->foreign('user')->references('id')->on('users');
            $table->foreign('team')->references('id')->on('teams');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_multiple_teams')->nullable()->after('password')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_team');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_multiple_teams']);
        });
    }
}
