<?php

namespace App\Http\Controllers;

use App\Camp;
use App\District;
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
        $flight = Camp::find($camp_id);
        $flight->is_approved = 1;
        $flight->approved_by = $user_id;
        $flight->save();

        return response()->json(['success' => 'Camp approved successfully']);
    }

    public function getPatients($camp_id)
    {
        $patients = Patient::where('camp_id', $camp_id)->get();

        return response()->json($patients);
    }

    public function createPatient(Request $request)
    {
        $patient = new Patient();
        $patient->patient_name = $request->patientName;
        $patient->gender = $request->patientGender;
        $patient->phone_no = $request->patientPhoneNo;
        $patient->camp_id = $request->camp_id;
        $patient->save();

        return response()->json(['success' => 'Patient Added Successfully']);
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
        if ($camp->user_id != $request->userId){
            return response()->json(['error' => 'Cannot Start Camp at this time. Please contact an admin']);
        }
        $earth_radius = 6371;

        $dLat = deg2rad($request->lat - $camp->lat);
        $dLon = deg2rad($request->lng - $camp->lng);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($camp->lat)) * cos(deg2rad($request->lat)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;

        if ($d < 1) {
            return response()->json(['success' => 'Camp started successfully']);
        } else {
            return response()->json(['error' => 'Cannot start camp at this time'], 401);
        }
    }
}
