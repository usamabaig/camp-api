<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApprovedByColumnsToCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('camps', function (Blueprint $table) {
            $table->boolean('is_approved')->default(0);
            $table->unsignedBigInteger('approved_by')->nullable()->default(null);
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
            $table->dropColumn(['is_approved', 'approved_by']);
        });
    }
}
