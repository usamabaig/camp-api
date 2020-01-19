<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBloodPressureAndSugarColumnsToPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->string('blood_pressure_systolic')->default('N/A');
            $table->string('blood_pressure_diastolic')->default('N/A');
            $table->string('blood_sugar')->default('N/A');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn(['blood_pressure_systolic', 'blood_pressure_diastolic', 'blood_sugar']);
        });
    }
}
