<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\District;
use App\Territory;

class CreateTerritoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('territories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('territory_name');
            $table->unsignedBigInteger('district_id');
            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('districts');
        });

        $peshawar = District::where('district_name', 'Peshawar')->first();
        $mardan = District::where('district_name', 'Mardan')->first();
        $rawalpindi = District::where('district_name', 'Rawalpindi')->first();
        $islamabad = District::where('district_name', 'Islamabad')->first();
        $abbottabad = District::where('district_name', 'Abbottabad')->first();

        $dik = District::where('district_name', 'DIK')->first();
        $swat = District::where('district_name', 'Swat')->first();

        $lahore1 = District::where('district_name', 'Lahore-I')->first();
        $lahore2 = District::where('district_name', 'Lahore-II')->first();
        $faislabad = District::where('district_name', 'Faisalabad')->first();
        $gujranwala = District::where('district_name', 'Gujranwala')->first();
        $sargodha = District::where('district_name', 'Sargodha')->first();
        $sahiwal = District::where('district_name', 'Sahiwal')->first();
        $multan = District::where('district_name', 'Multan')->first();
        $dgkhan = District::where('district_name', 'DG Khan')->first();
        $bwp = District::where('district_name', 'Bahawalpur')->first();
        $karachi1 = District::where('district_name', 'Karachi-I')->first();
        $karachi2 = District::where('district_name', 'Karachi-II')->first();
        $hyderabad = District::where('district_name', 'Hyderabd')->first();

        $sukkur = District::where('district_name', 'Sukkur')->first();
        $nawabshah = District::where('district_name', 'Nawab Shah')->first();

        $larkana = District::where('district_name', 'Larkana')->first();
        $quetta = District::where('district_name', 'Quetta')->first();

        $data = [
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

        Territory::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('territories');
    }
}
