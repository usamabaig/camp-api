<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUserTeamTableName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('user_team', 'team_user');
        Schema::table('team_user', function (Blueprint $table) {
            $table->renameColumn('user', 'user_id');
            $table->renameColumn('team', 'team_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('team_user', 'user_team');
        Schema::table('user_team', function (Blueprint $table) {
            $table->renameColumn('user_id', 'user');
            $table->renameColumn('team_id', 'team');
        });
    }
}
