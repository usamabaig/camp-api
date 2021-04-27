<?php

namespace App\Http\Controllers;

use App\District;
use App\Region;
use App\Team;
use App\Territory;
use App\User;
use App\Doctor;
use Faker\Provider\File;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teams = Team::all();

        return view('home')->with('teams', $teams);
    }

    /**
     * List all deleted users
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function viewDeletedUsers()
    {
        if (auth()->user()->id == 1) {
            $users = User::onlyTrashed()->get();
        } else {
            return redirect()->back();
        }

        return view('deleted_users')->with('users', $users);
    }

    /**
     * Restore a deleted User
     *
     * @param int $user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreUser($user_id)
    {
        if (auth()->user()->id == 1) {
            User::withTrashed()->find($user_id)->restore();
        } else {
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * Permanently delete a soft deleted user
     *
     * @param int $user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function hardDeleteUser($user_id)
    {
        if (auth()->user()->id == 1) {
            User::withTrashed()->find($user_id)->forceDelete();
        } else {
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * Get regions, districts and territories belonging to specific team
     *
     * @param int $team_id
     */
    public function teamDetails($team_id, $string)
    {
        $team = Team::where('id', $team_id)->first();
        $regions = Region::with('team')->where('team_id', $team_id)->get();
        $districts = District::with('region')->whereIn('region_id', $regions->pluck('id')->toArray())->get();
        $territories = Territory::with('district')->whereIn('district_id', $districts->pluck('id')->toArray())->get();

        return view('team_details', ['data' => $string, 'team' => $team, 'regions' => $regions, 'districts' => $districts, 'territories' => $territories]);
    }

    public function addData(Request $request)
    {
        if ($request->data_name == 'region') {
            $region = new Region();
            $region->region_name = $request->region_name;
            $region->team_id = $request->team_id;
            $region->save();
        }

        return redirect()->back();
    }

    public function viewDoctors()
    {
        if (auth()->user()->id == 1) {
            $doctors = Doctor::all();
        } else {
            return redirect()->back();
        }

        return view('doctors')->with('doctors', $doctors);
    }

    public function importDoctors(Request $request)
    {
        $request->validate([
            'doctor_excel_file'  => 'required|mimes:xls,xlsx,csv|max:2048'
        ]);
        $file = $request->file('doctor_excel_file')->getRealPath();
        $reader = new Xls();
        $spreadsheet = $reader->load($file);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        $num = count($sheetData);
        $doctor_data = Doctor::pluck('dr_id');
        $message = 'Data inserted successfully';
        if($num > 0) {
            for($i = 2; $i <= $num; $i++) {
                if(!in_array($sheetData[$i]['B'], $doctor_data->toArray())) {
                    $doctor = new Doctor();
                    $doctor->name = $sheetData[$i]['A'];
                    $doctor->dr_id = $sheetData[$i]['B'];
                    $doctor->dr_phone_no = $sheetData[$i]['C'];
                    $array[] = $doctor->toArray();
                }
            }
            if(isset($array)) {
                Doctor::insert($array);
            } else {
                $message = 'Duplicate data encountered';
            }
        }

        return redirect()->back()->with('message', $message);
    }
}
