<?php
namespace App\Http\Controllers;

use App\Camp;
use App\Patient;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Response;

class ReportsController extends Controller
{
    public function getPresentCamps(Request $request, $user_id)
    {
        if ($request->startDate != '' || $request->endDate != '') {
            $from_date = isset($request->startDate) ? date('Y-m-d H:i:s', strtotime($request->startDate)) : date('Y-m-d 00:00:00',strtotime("-1 days"));
            $to_date = isset($request->endDate) ? date('Y-m-d H:i:s', strtotime($request->endDate)) : date('Y-m-d 23:59:59',strtotime("-1 year"));
            $date = [$from_date, $to_date];
        } else {
            $date = [];
        }
        $camp = Camp::with('user', 'user.user_territory', 'user.user_district', 'user.user_region', 'user.user_team')->camps($user_id)
            ->where(function ($query) use ($request) {
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
        })->where(function ($query) use ($date) {
            if ($date != []){
                $query->whereBetween('camp_datetime', $date);
            }
        })->whereHas('user', function (Builder $query) use ($request) {
            $query->when($request->region != "", function ($q) use ($request) {
                return $q->where('region', '=', $request->region);
            });
            $query->when($request->district != "", function ($q) use ($request) {
                return $q->where('district', '=', $request->district);
            });
            $query->when($request->doctorName != "", function ($q) use ($request) {
                return $q->where('dr_name', 'LIKE', '%'.$request->doctorName.'%')->orWhere('name', 'LIKE', '%'.$request->doctorName.'%');
            });
        })->orderBy('camp_datetime', 'desc')->get();
        $data_keys = ['SPO Name', 'Team', 'Region', 'District', 'Territory', 'Camp Type', 'Dr Name', 'Camp Date/Time', 'Camp Status'];

        if (isset($request->action) && $request->action == 'excel') {
            return $this->export('camps', $data_keys, $camp);
        } else {
            return response()->json($camp);
        }
    }

    public function getCampsSlips(Request $request, $user_id)
    {
        /*if ($request->startDate != '' || $request->endDate != '') {
            $from_date = isset($request->startDate) ? date('Y-m-d H:i:s', strtotime($request->startDate)) : date('Y-m-d 00:00:00',strtotime("-1 days"));
            $to_date = isset($request->endDate) ? date('Y-m-d H:i:s', strtotime($request->endDate)) : date('Y-m-d 23:59:59',strtotime("-1 year"));
            $date = [$from_date, $to_date];
        } else {
            $date = [];
        }*/

        $users = User::with('user_territory', 'user_district', 'user_region', 'user_team', 'multiple_teams', 'user_role')->users($user_id)->get();
        $user_ids = $users->pluck("id");
        $user_names = $users->pluck("name");

        // total slips used in completed camps
        $camp_slips = DB::table('camps')
            ->join('users', 'camps.user_id', '=', 'users.id')
            ->selectRaw("SUM(no_of_strips) as total_slips, users.name")
            ->where("camp_status", 2)
            ->whereIn("user_id", $user_ids)
            ->groupBy("user_id")
            ->get();

        // total ready camps
        $camps_ready = DB::table('camps')
            ->join('users', 'camps.user_id', '=', 'users.id')
            ->selectRaw("COUNT(*) as total_ready_camps, users.name")
            ->where("camp_status", 0)
            ->where("is_approved", 1)
            ->whereIn("user_id", $user_ids)
            ->groupBy("user_id")
            ->get();

        // total completed camps
        $camps_completed = DB::table('camps')
            ->join('users', 'camps.user_id', '=', 'users.id')
            ->selectRaw("COUNT(*) as total_completed_camps, users.name")
            ->where("camp_status", 2)
            ->whereIn("user_id", $user_ids)
            ->groupBy("user_id")
            ->get();

        // total canceled camps
        $camps_canceled = DB::table('camps')
            ->join('users', 'camps.user_id', '=', 'users.id')
            ->selectRaw("COUNT(*) as total_canceled_camps, users.name")
            ->whereNotNull("camps.deleted_at")
            ->whereIn("user_id", $user_ids)
            ->groupBy("user_id")
            ->get();
        $array = [];
        foreach ($user_names as $key=>$name) {
            foreach ($camps_ready as $ready) {
                if ($ready->name == $name) {
                    $array[$key]["name"] = $name;
                    isset($array[$key]["total_ready_camps"]) ? $array[$key]["total_ready_camps"] += $ready->total_ready_camps : $array[$key]["total_ready_camps"] = $ready->total_ready_camps;
                }
            }
            foreach ($camps_completed as $complete) {
                if ($complete->name == $name) {
                    $array[$key]["name"] = $name;
                    isset($array[$key]["total_completed_camps"]) ? $array[$key]["total_completed_camps"] += $complete->total_completed_camps : $array[$key]["total_completed_camps"] = $complete->total_completed_camps;
                }
            }
            foreach ($camps_canceled as $canceled) {
                if ($canceled->name == $name) {
                    $array[$key]["name"] = $name;
                    isset($array[$key]["total_canceled_camps"]) ? $array[$key]["total_canceled_camps"] += $canceled->total_canceled_camps : $array[$key]["total_canceled_camps"] = $canceled->total_canceled_camps;
                }
            }
            foreach ($camp_slips as $slips) {
                if ($slips->name == $name) {
                    $array[$key]["name"] = $name;
                    isset($array[$key]["total_slips"]) ? $array[$key]["total_slips"] += $slips->total_slips : $array[$key]["total_slips"] = $slips->total_slips;
                }
            }
        }

        return response()->json($array);
    }

    public function getUsers(Request $request, $user_id)
    {
        $users = User::with('user_territory', 'user_district', 'user_region', 'user_role', 'user_team', 'multiple_teams')->users($user_id)->where(function ($query) use ($request) {
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
            if (isset($request->teams)){
                $query->where('team', '=', $request->teams);
            }
        })->where(function ($query) use ($request) {
            if (isset($request->is_multiple_teams)){
                $query->where('is_multiple_teams', '=', $request->is_multiple_teams);
            }
        })->where(function ($query) use ($request) {
            if (isset($request->userName)){
                $query->where('name', 'like', '%'.$request->userName.'%')
                    ->orWhere('cnic', 'like', '%'.$request->userName.'%')
                    ->orWhere('email', 'like', '%'.$request->userName.'%')
                    ->orWhere('employee_code', 'like', '%'.$request->userName.'%');
            }
        })->orderBy('name', 'asc')->orderBy('employee_code', 'asc')->get();

        $data_keys = ['Name', 'Email', 'Designation', 'Employee Code', 'Region'];

        if (isset($request->action) && $request->action == 'excel') {
            return $this->export('users', $data_keys, $users);
        } else {
            return response()->json($users);
        }
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

        $data_keys = ['Doctor Name', 'Doctor Code', 'Doctor Contact'];

        if (isset($request->action) && $request->action == 'excel') {
            return $this->export('doctors', $data_keys, $doctors);
        } else {
            return response()->json($doctors);
        }
    }

    public function getPatients(Request $request)
    {
        $patients = Patient::whereHas('camps', function (Builder $query) use ($request) {
            if (isset($request->campType)){
                $query->where('camp_type', '=', $request->campType);
            }
            if (isset($request->patient_search)){
                $query->where('patient_name', 'like', '%'.$request->patient_search.'%')
                    ->orWhere('phone_no', 'like', '%'.$request->patient_search.'%');
            }
        })->get();

        $data_keys = ['Patient Name', 'Patient Contact', 'Gender'];

        if (isset($request->action) && $request->action == 'excel') {
            return $this->export('patients', $data_keys, $patients);
        } else {
            return response()->json($patients);
        }
    }

    public function export($name, $data_keys, $data_values)
    {
        $filename = $name. "-report-".time().".csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, $data_keys);
        if ($name == 'camps') {
            foreach($data_values as $row) {
                if ($row->camp_type == 1) {
                    $camp_type = 'Cardio';
                } else if ($row->camp_type == 2) {
                    $camp_type = 'Diabetic';
                } else if ($row->camp_type == 3) {
                    $camp_type = 'Cardio/Diabetic';
                }
                $camp_status = $row->camp_status == 0 ? 'Pending' : 'Approved';
                fputcsv($handle, [@$row->user->name, @$row->user->user_team->team_name, @$row->user->user_region->region_name, @$row->user->user_district->district_name, @$row->user->user_territory->territory_name, $camp_type, $row->dr_name, $row->camp_datetime, $camp_status ]);
            }
        } else if ($name == 'users') {
            foreach($data_values as $row) {
                fputcsv($handle, [@$row->name, @$row->email, @$row->user_role == null ? "" : @$row->user_role->role_name, @$row->employee_code, @$row->user_region->region_name]);
            }
        } else if ($name == 'patients') {
            foreach($data_values as $row) {
                fputcsv($handle, [@$row->patient_name, @$row->phone_no, @$row->gender]);
            }
        } else if ($name == 'doctors') {
            foreach($data_values as $row) {
                fputcsv($handle, [@$row->dr_name, @$row->dr_id, @$row->dr_phone_no]);
            }
        }
        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        Response::download($filename, $filename, $headers);

        return response()->json(\URL::to('/').'/'.$filename);
    }
}
