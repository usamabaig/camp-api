<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewRoleToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('roles');

        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_abv');
            $table->string('role_name');
            $table->bigInteger('level');
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['role_abv' => 'CD', 'role_name' => 'Commercial Director', 'level' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'HOMS', 'role_name' => 'Head of Marketing and Sales', 'level' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'BUM', 'role_name' => 'Business Unit Manager', 'level' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'SPM', 'role_name' => 'Senior Product Manager', 'level' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'PM', 'role_name' => 'Product Manager', 'level' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'APM', 'role_name' => 'Assistant Product Manager', 'level' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'PE', 'role_name' => 'Product Executive', 'level' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['role_abv' => 'SSM', 'role_name' => 'Senior Sales Manager', 'level' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'SM', 'role_name' => 'Sales Manager', 'level' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['role_abv' => 'SDSM', 'role_name' => 'Senior District Sales Manager', 'level' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'DSM', 'role_name' => 'District Sales Manager', 'level' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['role_abv' => 'MIRE', 'role_name' => 'Medical Information and Relation Executive', 'level' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'SMIRO', 'role_name' => 'Senior Medical Information and Relation Officer', 'level' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['role_abv' => 'MIRO', 'role_name' => 'Medical Information and Relation Officer', 'level' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
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
