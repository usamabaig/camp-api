<?php

namespace App\Http\Controllers;

use App\Region;
use App\Role;
use App\Team;
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
}
