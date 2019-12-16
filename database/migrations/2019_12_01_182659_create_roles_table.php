<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_abv');
            $table->string('role_name');
            $table->bigInteger('level');
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['role_abv' => 'GM', 'role_name' => 'General Manager', 'level' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'BM', 'role_name' => 'Branch Manager', 'level' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'PM', 'role_name' => 'Product Manager', 'level' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'APM', 'role_name' => 'Assistant Product Manager', 'level' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['role_abv' => 'SM', 'role_name' => 'Sales Manager', 'level' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'SSM', 'role_name' => 'Senior Sales Manager', 'level' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'DSM', 'role_name' => 'District Sales Manager', 'level' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'SDSM', 'role_name' => 'Senior District Sales Manager', 'level' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['role_abv' => 'SPO', 'role_name' => 'Sales Promotion Officer', 'level' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'SSPO', 'role_name' => 'Senior Sales Promotion Officer', 'level' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'FE', 'role_name' => 'Field Executive', 'level' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
