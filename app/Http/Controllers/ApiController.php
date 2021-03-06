<?php

namespace App\Http\Controllers;

use App\Camp;
use App\District;
use App\Notification;
use App\Patient;
use App\PatientDrug;
use App\Region;
use App\Role;
use App\Team;
use App\Territory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CclMedicine;
use App\OtherMedicine;

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
        $roles = Role::orderBy('id', 'ASC')->get();

        return response()->json($roles);
    }

    public function getTeams()
    {
        $teams = Team::get();

        return response()->json($teams);
    }

    public function getRegions($team_id)
    {
        $regions = Region::orderBy('id', 'ASC')->where('team_id', $team_id)->get();

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
        if (isset($_GET['datetime']) && $_GET['datetime'] != "undefined") {
            $datetime = explode("GMT", $_GET['datetime']);
            $camp->camp_datetime = date("Y-m-d H:i:s", strtotime($datetime[0]));
        }
        $camp->approved_by = $user_id;
        $camp->camp_status = 1;
        $camp->save();

        $notification = new Notification();
        $notification->notification = 'Camp approved successfully';
        $notification->user_id = $camp->user_id;
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

        $this->addDrugsForPatients($request, $patient->id);

        return response()->json(['success' => 'Patient Saved Successfully']);
    }

    public function addDrugsForPatients(Request $request, $patient_id)
    {
        if (isset($request->drugName1) && $request->drugName1 !== '') {
            $patient_drug = new PatientDrug();
            $patient_drug->patient_id = $patient_id;
            $patient_drug->drug_name = $request->drugName1;
            $patient_drug->is_company_drug = isset($request->isCompanyDrug1) ? $request->isCompanyDrug1 : 0;
            $patient_drug->save();
        }
        if (isset($request->drugName2) && $request->drugName2 !== '') {
            $patient_drug = new PatientDrug();
            $patient_drug->patient_id = $patient_id;
            $patient_drug->drug_name = $request->drugName2;
            $patient_drug->is_company_drug = isset($request->isCompanyDrug2) ? $request->isCompanyDrug2 : 0;
            $patient_drug->save();
        }
        if (isset($request->drugName3) && $request->drugName3 !== '') {
            $patient_drug = new PatientDrug();
            $patient_drug->patient_id = $patient_id;
            $patient_drug->drug_name = $request->drugName3;
            $patient_drug->is_company_drug = isset($request->isCompanyDrug3) ? $request->isCompanyDrug3 : 0;
            $patient_drug->save();
        }
        if (isset($request->drugName4) && $request->drugName4 !== '') {
            $patient_drug = new PatientDrug();
            $patient_drug->patient_id = $patient_id;
            $patient_drug->drug_name = $request->drugName4;
            $patient_drug->is_company_drug = isset($request->isCompanyDrug4) ? $request->isCompanyDrug4 : 0;
            $patient_drug->save();
        }
        if (isset($request->drugName5) && $request->drugName5 !== '') {
            $patient_drug = new PatientDrug();
            $patient_drug->patient_id = $patient_id;
            $patient_drug->drug_name = $request->drugName5;
            $patient_drug->is_company_drug = isset($request->isCompanyDrug5) ? $request->isCompanyDrug5 : 0;
            $patient_drug->save();
        }
    }

    public function getApprovedCamps($user_id)
    {
        $today_date = date('Y-m-d');
        $camps = Camp::where([
            ['user_id', '=', $user_id],
            ['is_approved', '=', 1]
        ])->whereDate('camp_datetime', $today_date)->get();

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
            $update_camp->no_of_received_strips = isset($request->received_strips) ? $request->received_strips : 0;
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

    public function closeCamp($camp_id, $used_strips=0)
    {
        $camp = Camp::find($camp_id);
        $camp->camp_status = 2;
        $camp->no_of_used_strips = $used_strips;
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

    public function getTerritoriesFilter()
    {
        return response()->json(Territory::get());
    }

    public function getDistrictsFilter()
    {
        return response()->json(District::get());
    }

    public function getUnreadNotifications($user_id)
    {
        $notifications = Notification::where([
          ['user_id', '=', $user_id],
          ['is_read', '=', 0]
        ])->count();

        return response()->json($notifications);
    }

    public function markNotificationAsRead($user_id)
    {
        Notification::where('user_id', $user_id)->update(['is_read' => 1]);

        return response()->json(['success' => 'Notifications marked as read.']);
    }

    public function resetPassword(Request $request)
    {
        $user = User::find($request->userID);
        $credentials = [
            'email' => $user->email,
            'password' => $request->oldPassword
        ];
        if(Auth::once($credentials)) {
            $user->password = Hash::make($request->password);
            $user->save();

            $response = ['success' => 'Password reset successfully'];
        } else {
            $response = ['error' => 'Some error occurred, Please try again.'];
        }

        return response()->json($response);
    }

    public function getPatient($patient_id)
    {
        $patient = Patient::where('id', $patient_id)->get();

        return response()->json($patient);
    }

    public function getCclMedicine() {
        $ccl_medicine = CclMedicine::all();

        return response()->json(['data' => $ccl_medicine]);
    }

    public function getOtherMedicine() {
        $other_medicine = OtherMedicine::all();

        return response()->json(['data' => $other_medicine]);
    }
}
