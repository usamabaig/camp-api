<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Territory;
use App\District;
use App\Region;

class AddMissingTerritories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $north1 = Region::where('region_name', 'North-1')->where('team_id', 2)->first();
        $north2 = Region::where('region_name', 'North-2')->where('team_id', 2)->first();
        $north3 = Region::where('region_name', 'North-3')->where('team_id', 2)->first();

        $center1 = Region::where('region_name', 'Center-1')->where('team_id', 2)->first();
        $center2 = Region::where('region_name', 'Center-2')->where('team_id', 2)->first();

        $south1 = Region::where('region_name', 'South-1')->where('team_id', 2)->first();
        $south2 = Region::where('region_name', 'South-2')->where('team_id', 2)->first();
        $south3 = Region::where('region_name', 'South-3')->where('team_id', 2)->first();

        $peshawar = District::where('district_name', 'Peshawar')->where('region_id', $north1->id)->first(); // North-1
        $rawalpindi = District::where('district_name', 'Rawalpindi')->where('region_id', $north1->id)->first(); // North-1
        $islamabad = District::where('district_name', 'Islamabad')->where('region_id', $north1->id)->first(); // North-1
        $abbottabad = District::where('district_name', 'Abbottabad')->where('region_id', $north1->id)->first(); // North-1
        $mardan = District::where('district_name', 'Mardan')->where('region_id', $north1->id)->first(); // North-1

        $dik = District::where('district_name', 'DIK')->where('region_id', $north2->id)->first(); // North-2

        $swat = District::where('district_name', 'Swat')->where('region_id', $north3->id)->first(); // North-3

        $lahore1 = District::where('district_name', 'Lahore-I')->where('region_id', $center1->id)->first(); // Center-1
        $lahore2 = District::where('district_name', 'Lahore-II')->where('region_id', $center1->id)->first(); // Center-1
        $faislabad = District::where('district_name', 'Faisalabad')->where('region_id', $center1->id)->first(); // Center-1
        $gujranwala = District::where('district_name', 'Gujranwala')->where('region_id', $center1->id)->first(); // Center-1
        $sargodha = District::where('district_name', 'Sargodha')->where('region_id', $center1->id)->first(); // Center-1

        $sahiwal = District::where('district_name', 'Sahiwal')->where('region_id', $center2->id)->first(); // Center-2
        $multan = District::where('district_name', 'Multan')->where('region_id', $center2->id)->first(); // Center-2
        $dgkhan = District::where('district_name', 'DG Khan')->where('region_id', $center2->id)->first(); // Center-2
        $bwp = District::where('district_name', 'Bahawalpur')->where('region_id', $center2->id)->first(); // Center-2

        $karachi1 = District::where('district_name', 'Karachi-I')->where('region_id', $south1->id)->first(); // South-1
        $karachi2 = District::where('district_name', 'Karachi-II')->where('region_id', $south1->id)->first(); // South-1
        $karachi3 = District::where('district_name', 'Karachi-III')->where('region_id', $south1->id)->first(); // South-1
        $hyderabad = District::where('district_name', 'Hyderabd')->where('region_id', $south1->id)->first(); // South-1
        $nawabshah = District::where('district_name', 'Nawab Shah')->where('region_id', $south1->id)->first(); // South-1

        $sukkur = District::where('district_name', 'Sukkur')->where('region_id', $south2->id)->first(); // South-2
        $larkana = District::where('district_name', 'Larkana')->where('region_id', $south2->id)->first(); // South-2

        $quetta = District::where('district_name', 'Quetta')->where('region_id', $south3->id)->first(); // South-3

        $data = [
            ['territory_name' => 'Society Mehmoodabad', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Gulshan', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        Territory::insert($data);
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
