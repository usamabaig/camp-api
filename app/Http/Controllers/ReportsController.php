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
        if ($request->campReportType == 'previous' || $request->campDuration == 'previous') {
            $from_date = isset($request->startDate) ? date('Y-m-d H:i:s', strtotime($request->startDate)) : date('Y-m-d 00:00:00',strtotime("-1 days"));
            $to_date = isset($request->endDate) ? date('Y-m-d H:i:s', strtotime($request->endDate)) : date('Y-m-d 23:59:59',strtotime("-1 year"));
            $date = [$to_date, $from_date];
        } else if ($request->campReportType == 'future' || $request->campDuration == 'future') {
            $from_date = isset($request->startDate) ? date('Y-m-d H:i:s', strtotime($request->startDate)) : date('Y-m-d 00:00:00',strtotime("-1 days"));
            $to_date = isset($request->endDate) ? date('Y-m-d H:i:s', strtotime($request->endDate)) : date('Y-m-d 23:59:59',strtotime("+1 year"));
            $date = [$from_date, $to_date];
        } else if ($request->campReportType == 'present'  || $request->campDuration == 'present') {
            $from_date = date('Y-m-d 00:00:00');
            $to_date = date('Y-m-d 23:59:59');
            $date = [$from_date, $to_date];
        } else {
            $start_date = Camp::select('created_at')->orderBy('created_at', 'asc')->first();
            $end_date = Camp::select('created_at')->orderBy('created_at', 'desc')->first();
            $date = [$start_date->created_at->format('Y-m-d 00:00:00'), $end_date->created_at->format('Y-m-d 23:59:59')];
        }
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
        })->whereBetween('camp_datetime', $date)->get();

        $data_keys = ['SPO Name', 'Team', 'Region', 'District', 'Territory', 'Camp Type', 'Dr Name', 'Camp Date/Time', 'Camp Status'];

        if (isset($request->action) && $request->action == 'excel') {
            return $this->export('camps', $data_keys, $camp);
        } else {
            return response()->json($camp);
        }
    }

    public function getUsers(Request $request, $user_id)
    {
        $users = User::with('user_territory', 'user_district', 'user_region', 'user_team', 'multiple_teams')->users($user_id)->where(function ($query) use ($request) {
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
            if (isset($request->userName)){
                $query->where('name', 'like', '%'.$request->userName.'%')
                    ->orWhere('cnic', 'like', '%'.$request->userName.'%')
                    ->orWhere('email', 'like', '%'.$request->userName.'%')
                    ->orWhere('employee_code', 'like', '%'.$request->userName.'%');
            }
        })->orderBy('name', 'asc')->orderBy('employee_code', 'asc')->get();

        $data_keys = ['Name', 'Email', 'Employee Code', 'Region'];

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
                fputcsv($handle, [@$row->name, @$row->email, @$row->employee_code, @$row->user_region->region_name]);
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
