<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cnic')->unique();
            $table->string('designation');
            $table->string('employee_code')->unique();
            $table->string('mobile_no')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('territory');
            $table->unsignedBigInteger('district');
            $table->unsignedBigInteger('region');
            $table->unsignedBigInteger('team');
            $table->rememberToken();
            $table->timestamps();

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
        Schema::dropIfExists('users');
    }
}
