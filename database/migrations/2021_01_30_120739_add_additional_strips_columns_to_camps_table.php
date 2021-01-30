<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalStripsColumnsToCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('camps', function (Blueprint $table) {
            $table->integer('no_of_received_strips')->default(0)->after("no_of_strips");
            $table->integer('no_of_used_strips')->default(0)->after("no_of_strips");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('camps', function (Blueprint $table) {
            $table->dropColumn(["no_of_received_strips", "no_of_used_strips"]);
        });
    }
}
