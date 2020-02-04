<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function getPresentCamps(Request $request)
    {

        $camp = DB::table('camps')->where(function ($query) use ($request) {
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
