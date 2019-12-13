<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\District;
use App\Region;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('district_name');
            $table->unsignedBigInteger('region_id');
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions');
        });
        $north1 = Region::where('region_name', 'North-1')->first();
        $north2 = Region::where('region_name', 'North-2')->first();
        $north3 = Region::where('region_name', 'North-3')->first();

        $center1 = Region::where('region_name', 'Center-1')->first();
        $center2 = Region::where('region_name', 'Center-2')->first();

        $south1 = Region::where('region_name', 'South-1')->first();
        $south2 = Region::where('region_name', 'South-2')->first();
        $south3 = Region::where('region_name', 'South-3')->first();

        $data = [
            ['district_name' => 'Peshawar', 'region_id' => $north1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Rawalpindi', 'region_id' => $north1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Islamabad', 'region_id' => $north1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Abbottabad', 'region_id' => $north1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Mardan', 'region_id' => $north1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['district_name' => 'DIK', 'region_id' => $north2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['district_name' => 'Swat', 'region_id' => $north3->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['district_name' => 'Lahore-I', 'region_id' => $center1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Lahore-II', 'region_id' => $center1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Faisalabad', 'region_id' => $center1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Gujranwala', 'region_id' => $center1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Sargodha', 'region_id' => $center1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['district_name' => 'Sahiwal', 'region_id' => $center2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Multan', 'region_id' => $center2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'DG Khan', 'region_id' => $center2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Bahawalpur', 'region_id' => $center2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['district_name' => 'Karachi-I', 'region_id' => $south1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Karachi-II', 'region_id' => $south1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Hyderabd', 'region_id' => $south1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Nawab Shah', 'region_id' => $south1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['district_name' => 'Sukkur', 'region_id' => $south2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['district_name' => 'Larkana', 'region_id' => $south2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['district_name' => 'Quetta', 'region_id' => $south3->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        District::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
