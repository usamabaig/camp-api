<?php

namespace App\Http\Controllers;

use App\Camp;
use App\District;
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
}
