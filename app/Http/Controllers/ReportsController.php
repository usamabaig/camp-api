<?php
namespace App\Http\Controllers;

use App\Camp;
use App\Patient;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\Builder;

class ReportsController extends Controller
{
    public function getPresentCamps(Request $request, $user_id)
    {
//        $to_date = isset($request->endDate) ? date('Y-m-d H:i:s', strtotime($request->endDate)) : date('Y-m-d H:i:s',strtotime("-1 days"));
//        $from_date = isset($request->startDate) ? date('Y-m-d H:i:s', strtotime($request->startDate)) : date('Y-m-d H:i:s',strtotime("-1 year"));
//        $date = [$from_date, $to_date];
        $camp = Camp::with('user', 'user.user_territory', 'user.user_district', 'user.user_region', 'user.user_team')->camps($user_id)->where(function ($query) use ($request) {
            if (isset($request->doctorName)){
                $query->where('dr_name', 'like', '%'.$request->doctorName.'%');
            }
        })->where(function ($query) use ($request) {
            if (isset($request->campType)){
                $query->where('camp_type', '=', $request->campType);
            }
        })->where(function ($query) use ($request) {
            if (isset($request->userID)){
                $query->where('user_id', '=', $request->userID);
            }
        })->where(function ($query) use ($request) {
            if (isset($request->campStatus)){
                $query->where('camp_status', '=', $request->campStatus);
            }
        })->get();

        return response()->json($camp);
    }

    public function getUsers(Request $request)
    {
        $users = User::with('user_territory', 'user_district', 'user_region', 'user_team')->where(function ($query) use ($request) {
            if (isset($request->territory)){
                $query->where('territory', '=', $request->territory);
            }
        })->where(function ($query) use ($request) {
            if (isset($request->district)){
                $query->where('district', '=', $request->district);
            }
        })->where(function ($query) use ($request) {
            if (isset($request->region)){
                $query->where('region', '=', $request->region);
            }
        })->where(function ($query) use ($request) {
            if (isset($request->team)){
                $query->where('team', '=', $request->team);
            }
        })->where(function ($query) use ($request) {
            if (isset($request->userName)){
                $query->where('name', 'like', '%'.$request->userName.'%')
                    ->orWhere('cnic', 'like', '%'.$request->userName.'%')
                    ->orWhere('email', 'like', '%'.$request->userName.'%')
                    ->orWhere('employee_code', 'like', '%'.$request->userName.'%');
            }
        })->get();

        return response()->json($users);
    }

    public function getDoctors(Request $request)
    {
        $doctors = DB::table('camps')
            ->select(DB::raw('count(*) as camp_count'), 'dr_id', 'dr_name', 'dr_phone_no')
            ->where(function ($query) use ($request) {
                if (isset($request->doctorSearch)){
                    $query->where('dr_name', 'like', '%'.$request->doctorSearch.'%')
                        ->orWhere('dr_id', 'like', '%'.$request->doctorSearch.'%');
                }
            })
            ->groupBy('dr_id', 'dr_name', 'dr_phone_no')
            ->get();

        return response()->json($doctors);
    }

    public function getPatients(Request $request)
    {
        $patients = Patient::whereHas('camps', function (Builder $query) use ($request) {
            if (isset($request->campType)){
                $query->where('camp_type', '=', $request->campType);
            }
        })->get();

        return response()->json($patients);
    }
}
