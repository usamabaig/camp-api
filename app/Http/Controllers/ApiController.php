<?php

namespace App\Http\Controllers;

use App\Camp;
use App\District;
use App\Notification;
use App\Patient;
use App\Region;
use App\Role;
use App\Team;
use App\Territory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    /**
     * Login User
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            $success['user'] = Auth::user();

            return response()->json(['success' => $success]);
        } else {

            return response()->json(['error'=>'Username/Password is incorrect'], 401);
        }
    }

    public function getRoles()
    {
        $roles = Role::get();

        return response()->json($roles);
    }

    public function getTeams()
    {
        $teams = Team::get();

        return response()->json($teams);
    }

    public function getRegions()
    {
        $regions = Region::get();

        return response()->json($regions);
    }

    public function getDistricts($region_id)
    {
        $district = District::where('region_id', $region_id)->get();

        return response()->json($district);
    }

    public function getTerritories($district_id)
    {
        $territories = Territory::where('district_id', $district_id)->get();

        return response()->json($territories);
    }

    public function approveCamp($camp_id, $user_id)
    {
        $camp = Camp::find($camp_id);
        $camp->is_approved = 1;
        $camp->approved_by = $user_id;
        $camp->camp_status = 1;
        $camp->save();

        $notification = new Notification();
        $notification->notification = 'Camp approved successfully';
        $notification->user_id = $user_id;
        $notification->camp_id = $camp_id;
        $notification->save();

        return response()->json(['success' => 'Camp approved successfully']);
    }

    public function getPatients($camp_id)
    {
        $patients = Patient::where('camp_id', $camp_id)->get();

        return response()->json($patients);
    }

    public function createPatient(Request $request)
    {
        $camp = Camp::where('id', $request->camp_id)->first();
        $camp_datetime = explode(' ', $camp->camp_datetime);
        if ($camp->camp_status != 1 || $this->checkCampTime($camp_datetime[1])) {
            return response()->json(['error' => 'Cannot add patient to closed camp.'], 401);
        }
        $patient = new Patient();
        $patient->patient_name = $request->patientName;
        $patient->patient_age = $request->patientAge;
        $patient->gender = $request->patientGender;
        $patient->phone_no = $request->patientPhoneNo;
        $patient->camp_id = $request->camp_id;
        if (isset($request->patientSystolic)){
            $patient->blood_pressure_systolic = $request->patientSystolic;
        }
        if (isset($request->patientDiastolic)){
            $patient->blood_pressure_diastolic = $request->patientDiastolic;
        }
        if (isset($request->patientBloodSugar)){
            $patient->blood_sugar = $request->patientBloodSugar;
        }
        $patient->save();

        return response()->json(['success' => 'Patient Saved Successfully']);
    }

    public function getApprovedCamps($user_id)
    {
        $camps = Camp::where([
            ['user_id', '=', $user_id],
            ['is_approved', '=', 1]
        ])->get();

        return response()->json($camps);
    }

    public function startCamp(Request $request)
    {
        $camp = Camp::where('id', $request->campId)->first();
        $camp_datetime = explode(' ', $camp->camp_datetime);

        if ($camp->user_id != $request->userId){
            return response()->json(['error' => 'Cannot Start Camp at this time. Please contact an admin'], 401);
        } else if($camp_datetime[0] != date('Y-m-d')){
            return response()->json(['error' => 'Cannot Start Camp at this time. Please check date and time of camp']);
        } else if($this->checkCampTime($camp_datetime[1])) {
            return response()->json(['error' => 'Cannot Start Camp at this time. Please check date and time of camp']);
        }
        $earth_radius = 6371;

        $dLat = deg2rad($request->lat - $camp->lat);
        $dLon = deg2rad($request->lng - $camp->lng);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($camp->lat)) * cos(deg2rad($request->lat)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;

        if ($d < 1) {
            $update_camp = Camp::find($camp->id);
            $update_camp->camp_status = 1;
            $update_camp->save();

            return response()->json(['success' => 'Camp started successfully']);
        } else {
            return response()->json(['error' => 'Cannot start camp. Please get to camp location to start camp'], 422);
        }
    }

    private function checkCampTime($camp_time)
    {
        $start_time = new \DateTime(date('H:i:s', strtotime($camp_time)-3600));
        $end_time = new \DateTime(date('H:i:s', strtotime($camp_time)+14400));
        $current_time = new \DateTime(date('H:i:s', time()));

        return $current_time < $start_time || $current_time > $end_time;
    }

    public function closeCamp($camp_id)
    {
        $camp = Camp::find($camp_id);
        $camp->camp_status = 2;
        $camp->save();

        return response()->json(['success' => 'Camp closed successfully']);
    }

    public function getTerritory($territory_id)
    {
        return response()->json(Territory::where('id', $territory_id)->first());
    }

    public function getDistrict($district_id)
    {
        return response()->json(District::where('id', $district_id)->first());
    }
}
