<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('camp_name');
            $table->string('camp_type');
            $table->string('dr_name');
            $table->dateTime('camp_datetime');
            $table->string('address');
            $table->string('lat');
            $table->string('lng');
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_bp_apparatus')->default(0);
            $table->boolean('is_bs_meter')->default(0);
            $table->integer('no_of_strips')->default(0);
            $table->integer('no_of_flyers')->default(0);
            $table->integer('no_of_screening_slips')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camps');
    }
}
