<?php
namespace App\Http\Controllers;

use App\Camp;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function getPresentCamps(Request $request)
    {

        $camp = Camp::with('user', 'user.user_territory', 'user.user_district', 'user.user_region', 'user.user_team')->where(function ($query) use ($request) {
            if (isset($request->doctorName)){
                $query->where('dr_name', 'like', '%'.$request->doctorName.'%');
            }
        })->where(function ($query) use ($request) {
            if (isset($request->campType)){
                $query->where('camp_type', '=', $request->campType);
            }
        })->where(function ($query) use ($request) {
            if (isset($request->campStatus)){
                $query->where('camp_status', '=', $request->campStatus);
            }
        })->get();

        return response()->json($camp);
    }
}
