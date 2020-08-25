<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Territory;
use App\District;
use App\Region;

class AddTerritoriesForEachTeam extends Migration
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
            ['territory_name' => 'Peshawar-LRH', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Peshawar-HMC', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Peshawar-KTH', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Nowshera', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Peshawar-GPs', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Charsaddah', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Mardan MMC', 'district_id' => $mardan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mardan-DHQ', 'district_id' => $mardan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Rawalpindi-MH', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rawalpindi-HFH', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rawalpindi-CMH', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'RWP-I (DHQ)', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Jhelum', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Attock', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Chakwal', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Islamabad-PIMS', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Islamabad-BBH', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Islamabad-FGSH', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'ISB-(M-PUR + Kotli)', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Wah Cantt', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Abbottabad-1', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Abbottabad-2', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Muzaffarabad', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Harripur', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Kohat', 'district_id' => $dik->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'D.I.Khan', 'district_id' => $dik->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bannu', 'district_id' => $dik->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Timmergrah', 'district_id' => $swat->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mingora-1', 'district_id' => $swat->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mingora-2', 'district_id' => $swat->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Lahore-Gulab Devi', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-PIC', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Jinnah', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Sheikh Zayed', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-LGH', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Towns', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Services Hosp.', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Kasur', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Lahore-Mayo', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Multan Road', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Shalamar', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Shadbagh', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Shahdra', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'SKP', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Gangaram', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Faisalabad-National', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Faisalabad-DHQ', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Faisalabad-Allied', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Jhang', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Chiniot', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Toba Tek Singh', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Gujranwala-GP Area', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Gujranwala-Consultant Area', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sialkot-DHQ', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sialkot-GP area', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Gujrat', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mandi Bahauddin', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Sargodha-1', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sargodha-2', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mianwali', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Khushab', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bhakkar', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Sahiwal', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Okara', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bahawal Nagar', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Burewala', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Multan-Ali Pur', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Multan-Cantt', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Multan-Nishter', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Gates + GP Area', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Khanewal', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Multan khanewal Rd', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'D.G.Khan 1', 'district_id' => $dgkhan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'D.G.Khan 2', 'district_id' => $dgkhan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Layyah', 'district_id' => $dgkhan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Bahawalpur-GP Area', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bahawalpur-BVH', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rahim Yar Khan 1', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rahim Yar Khan 2', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Civil-I', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Civil-II', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'PIB Jamshed Road', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Johar-Shah Faisal', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Malir', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'NICVD Saddar', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Landhi', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Korangi', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'JPMC Clifton', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'JPMC + Defence', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Abbasi + N-BAD', 'district_id' => $karachi3->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'FB-Area-I', 'district_id' => $karachi3->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'FB-Area-II', 'district_id' => $karachi3->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'New Karachi + North Karachi', 'district_id' => $karachi3->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Orangi', 'district_id' => $karachi3->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Baldia', 'district_id' => $karachi3->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Hyderabad-Saddar 1', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Hyderabad-Saddar 2', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Hyderabad-Saddar 3', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Hyderabad-Latifabad', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mir Pur Khas', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Nawab Shah', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Sukkur-1', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sukkur-2', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Jacobabad', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Ghotki', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Nawab Shah', 'district_id' => $nawabshah->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Dadoo', 'district_id' => $larkana->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Larkana', 'district_id' => $larkana->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Quetta-1', 'district_id' => $quetta->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Quetta-2', 'district_id' => $quetta->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        Territory::insert($data);


        $north1 = Region::where('region_name', 'North-1')->where('team_id', 3)->first();
        $north2 = Region::where('region_name', 'North-2')->where('team_id', 3)->first();
        $north3 = Region::where('region_name', 'North-3')->where('team_id', 3)->first();

        $center1 = Region::where('region_name', 'Center-1')->where('team_id', 3)->first();
        $center2 = Region::where('region_name', 'Center-2')->where('team_id', 3)->first();

        $south1 = Region::where('region_name', 'South-1')->where('team_id', 3)->first();
        $south2 = Region::where('region_name', 'South-2')->where('team_id', 3)->first();
        $south3 = Region::where('region_name', 'South-3')->where('team_id', 3)->first();

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
        $hyderabad = District::where('district_name', 'Hyderabd')->where('region_id', $south1->id)->first(); // South-1
        $nawabshah = District::where('district_name', 'Nawab Shah')->where('region_id', $south1->id)->first(); // South-1

        $sukkur = District::where('district_name', 'Sukkur')->where('region_id', $south2->id)->first(); // South-2
        $larkana = District::where('district_name', 'Larkana')->where('region_id', $south2->id)->first(); // South-2

        $quetta = District::where('district_name', 'Quetta')->where('region_id', $south3->id)->first(); // South-3

        $data1 = [
            ['territory_name' => 'Peshawar-LRH', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Peshawar-HMC', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Peshawar-KTH', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Nowshera', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Peshawar-GPs', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Mardan MMC', 'district_id' => $mardan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mardan-DHQ', 'district_id' => $mardan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Rawalpindi-MH', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rawalpindi-HFH', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rawalpindi-CMH', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Jhelum', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Chakwal', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Islamabad-PIMS', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Islamabad-BBH', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Islamabad-FGSH', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Wah Cantt', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Abbottabad-1', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Abbottabad-2', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Muzaffarabad', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Kohat', 'district_id' => $dik->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'D.I.Khan', 'district_id' => $dik->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bannu', 'district_id' => $dik->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Timmergrah', 'district_id' => $swat->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mingora-1', 'district_id' => $swat->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mingora-2', 'district_id' => $swat->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Lahore-Gulab Devi', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-PIC', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Jinnah', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Sheikh Zayed', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-LGH', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Towns', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Kasur', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Lahore-Mayo', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Multan Road', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Shalamar', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Shadbagh', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Shahdra', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'SKP', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Gangaram', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Faisalabad-National', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Faisalabad-DHQ', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Faisalabad-Allied', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Jhang', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Toba Tek Singh', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Gujranwala-GP Area', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Gujranwala-Consultant Area', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sialkot-DHQ', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sialkot-GP area', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Gujrat', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mandi Bahauddin', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Sargodha-1', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sargodha-2', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mianwali', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Sahiwal', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Okara', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bahawal Nagar', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Burewala', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Multan-Ali Pur', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Multan-Cantt', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Multan-Nishter', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Khanewal', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Multan khanewal Rd', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'D.G.Khan 1', 'district_id' => $dgkhan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'D.G.Khan 2', 'district_id' => $dgkhan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Layyah', 'district_id' => $dgkhan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Bahawalpur-GP Area', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bahawalpur-BVH', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rahim Yar Khan 1', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rahim Yar Khan 2', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Karachi-JPMC', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Korangi', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Malir', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-NICVD/DHA', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Society', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Gulshan', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Karachi-Orangi', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Old Karachi', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-FB Area', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-New Karachi', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Nazimabad', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Civil Hospital', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Hyderabad-Saddar 1', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Hyderabad-Saddar 2', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Hyderabad-Saddar 3', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Hyderabad-Latifabad', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mir Pur Khas', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Nawab Shah', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Sukkur-1', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sukkur-2', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Jacobabad', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Ghotki', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Nawab Shah', 'district_id' => $nawabshah->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Dadoo', 'district_id' => $larkana->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Larkana', 'district_id' => $larkana->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Quetta-1', 'district_id' => $quetta->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Quetta-2', 'district_id' => $quetta->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        Territory::insert($data1);


        $north1 = Region::where('region_name', 'North-1')->where('team_id', 4)->first();
        $north2 = Region::where('region_name', 'North-2')->where('team_id', 4)->first();
        $north3 = Region::where('region_name', 'North-3')->where('team_id', 4)->first();

        $center1 = Region::where('region_name', 'Center-1')->where('team_id', 4)->first();
        $center2 = Region::where('region_name', 'Center-2')->where('team_id', 4)->first();

        $south1 = Region::where('region_name', 'South-1')->where('team_id', 4)->first();
        $south2 = Region::where('region_name', 'South-2')->where('team_id', 4)->first();
        $south3 = Region::where('region_name', 'South-3')->where('team_id', 4)->first();

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
        $hyderabad = District::where('district_name', 'Hyderabd')->where('region_id', $south1->id)->first(); // South-1
        $nawabshah = District::where('district_name', 'Nawab Shah')->where('region_id', $south1->id)->first(); // South-1

        $sukkur = District::where('district_name', 'Sukkur')->where('region_id', $south2->id)->first(); // South-2
        $larkana = District::where('district_name', 'Larkana')->where('region_id', $south2->id)->first(); // South-2

        $quetta = District::where('district_name', 'Quetta')->where('region_id', $south3->id)->first(); // South-3

        $data2 = [
            ['territory_name' => 'Peshawar-LRH', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Peshawar-HMC', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Peshawar-KTH', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Nowshera', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Peshawar-GPs', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Mardan MMC', 'district_id' => $mardan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mardan-DHQ', 'district_id' => $mardan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Rawalpindi-MH', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rawalpindi-HFH', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rawalpindi-CMH', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Jhelum', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Chakwal', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Islamabad-PIMS', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Islamabad-BBH', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Islamabad-FGSH', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Wah Cantt', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Abbottabad-1', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Abbottabad-2', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Muzaffarabad', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Kohat', 'district_id' => $dik->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'D.I.Khan', 'district_id' => $dik->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bannu', 'district_id' => $dik->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Timmergrah', 'district_id' => $swat->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mingora-1', 'district_id' => $swat->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mingora-2', 'district_id' => $swat->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Lahore-Gulab Devi', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-PIC', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Jinnah', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Sheikh Zayed', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-LGH', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Towns', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Kasur', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Lahore-Mayo', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Multan Road', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Shalamar', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Shadbagh', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Shahdra', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'SKP', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Gangaram', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Faisalabad-National', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Faisalabad-DHQ', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Faisalabad-Allied', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Jhang', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Toba Tek Singh', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Gujranwala-GP Area', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Gujranwala-Consultant Area', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sialkot-DHQ', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sialkot-GP area', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Gujrat', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mandi Bahauddin', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Sargodha-1', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sargodha-2', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mianwali', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Sahiwal', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Okara', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bahawal Nagar', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Burewala', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Multan-Ali Pur', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Multan-Cantt', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Multan-Nishter', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Khanewal', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Multan khanewal Rd', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'D.G.Khan 1', 'district_id' => $dgkhan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'D.G.Khan 2', 'district_id' => $dgkhan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Layyah', 'district_id' => $dgkhan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Bahawalpur-GP Area', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bahawalpur-BVH', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rahim Yar Khan 1', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rahim Yar Khan 2', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Karachi-JPMC', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Korangi', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Malir', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-NICVD/DHA', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Society', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Gulshan', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Karachi-Orangi', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Old Karachi', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-FB Area', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-New Karachi', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Nazimabad', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Civil Hospital', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Hyderabad-Saddar 1', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Hyderabad-Saddar 2', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Hyderabad-Saddar 3', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Hyderabad-Latifabad', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mir Pur Khas', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Nawab Shah', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Sukkur-1', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sukkur-2', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Jacobabad', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Ghotki', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Nawab Shah', 'district_id' => $nawabshah->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Dadoo', 'district_id' => $larkana->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Larkana', 'district_id' => $larkana->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Quetta-1', 'district_id' => $quetta->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Quetta-2', 'district_id' => $quetta->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        Territory::insert($data2);


        $north1 = Region::where('region_name', 'North-1')->where('team_id', 5)->first();
        $north2 = Region::where('region_name', 'North-2')->where('team_id', 5)->first();
        $north3 = Region::where('region_name', 'North-3')->where('team_id', 5)->first();

        $center1 = Region::where('region_name', 'Center-1')->where('team_id', 5)->first();
        $center2 = Region::where('region_name', 'Center-2')->where('team_id', 5)->first();

        $south1 = Region::where('region_name', 'South-1')->where('team_id', 5)->first();
        $south2 = Region::where('region_name', 'South-2')->where('team_id', 5)->first();
        $south3 = Region::where('region_name', 'South-3')->where('team_id', 5)->first();

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
        $hyderabad = District::where('district_name', 'Hyderabd')->where('region_id', $south1->id)->first(); // South-1
        $nawabshah = District::where('district_name', 'Nawab Shah')->where('region_id', $south1->id)->first(); // South-1

        $sukkur = District::where('district_name', 'Sukkur')->where('region_id', $south2->id)->first(); // South-2
        $larkana = District::where('district_name', 'Larkana')->where('region_id', $south2->id)->first(); // South-2

        $quetta = District::where('district_name', 'Quetta')->where('region_id', $south3->id)->first(); // South-3

        $data1 = [
            ['territory_name' => 'Peshawar-LRH', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Peshawar-HMC', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Peshawar-KTH', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Nowshera', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Peshawar-GPs', 'district_id' => $peshawar->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Mardan MMC', 'district_id' => $mardan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mardan-DHQ', 'district_id' => $mardan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Rawalpindi-MH', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rawalpindi-HFH', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rawalpindi-CMH', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Jhelum', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Chakwal', 'district_id' => $rawalpindi->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Islamabad-PIMS', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Islamabad-BBH', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Islamabad-FGSH', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Wah Cantt', 'district_id' => $islamabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Abbottabad-1', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Abbottabad-2', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Muzaffarabad', 'district_id' => $abbottabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Kohat', 'district_id' => $dik->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'D.I.Khan', 'district_id' => $dik->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bannu', 'district_id' => $dik->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Timmergrah', 'district_id' => $swat->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mingora-1', 'district_id' => $swat->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mingora-2', 'district_id' => $swat->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Lahore-Gulab Devi', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-PIC', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Jinnah', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Sheikh Zayed', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-LGH', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Towns', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Kasur', 'district_id' => $lahore1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Lahore-Mayo', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Multan Road', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Shalamar', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Shadbagh', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Shahdra', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'SKP', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Lahore-Gangaram', 'district_id' => $lahore2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Faisalabad-National', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Faisalabad-DHQ', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Faisalabad-Allied', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Jhang', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Toba Tek Singh', 'district_id' => $faislabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Gujranwala-GP Area', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Gujranwala-Consultant Area', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sialkot-DHQ', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sialkot-GP area', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Gujrat', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mandi Bahauddin', 'district_id' => $gujranwala->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Sargodha-1', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sargodha-2', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mianwali', 'district_id' => $sargodha->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Sahiwal', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Okara', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bahawal Nagar', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Burewala', 'district_id' => $sahiwal->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Multan-Ali Pur', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Multan-Cantt', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Multan-Nishter', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Khanewal', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Multan khanewal Rd', 'district_id' => $multan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'D.G.Khan 1', 'district_id' => $dgkhan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'D.G.Khan 2', 'district_id' => $dgkhan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Layyah', 'district_id' => $dgkhan->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Bahawalpur-GP Area', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Bahawalpur-BVH', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rahim Yar Khan 1', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Rahim Yar Khan 2', 'district_id' => $bwp->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Karachi-JPMC', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Korangi', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Malir', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-NICVD/DHA', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Society', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Gulshan', 'district_id' => $karachi1->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Karachi-Orangi', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Old Karachi', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-FB Area', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-New Karachi', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Nazimabad', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Karachi-Civil Hospital', 'district_id' => $karachi2->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Hyderabad-Saddar 1', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Hyderabad-Saddar 2', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Hyderabad-Saddar 3', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Hyderabad-Latifabad', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Mir Pur Khas', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Nawab Shah', 'district_id' => $hyderabad->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Sukkur-1', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Sukkur-2', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Jacobabad', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Ghotki', 'district_id' => $sukkur->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Nawab Shah', 'district_id' => $nawabshah->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Dadoo', 'district_id' => $larkana->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Larkana', 'district_id' => $larkana->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['territory_name' => 'Quetta-1', 'district_id' => $quetta->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['territory_name' => 'Quetta-2', 'district_id' => $quetta->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        Territory::insert($data1);
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
