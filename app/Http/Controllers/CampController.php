<?php

namespace App\Http\Controllers;

use App\Camp;
use App\Notification;
use App\User;
use Illuminate\Http\Request;

class CampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $camps = Camp::with('user', 'user.user_territory', 'user.user_district', 'user.user_region', 'user.user_team')->get();

        return response()->json($camps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $camp_id = $this->createOrUpdateCamp($request, null);

        $spo_region = User::where('id', $request->campUserID)->value('region');
        $spo_admin = User::where('region', $spo_region)->whereIn('designation', [1,2,3,4])->get();

        $notifications = [];
        foreach ($spo_admin as $admin) {
            $notification = new Notification();
            $notification->notification = 'Camp created successfully';
            $notification->user_id = $admin->id;
            $notification->camp_id = $camp_id->id;
            $notifications[] = $notification;
        }
        Notification::insert($notifications);

        return response()->json(['success' => 'Camp Saved Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $camp = Camp::where('id', $id)->first();

        return response()->json($camp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->createOrUpdateCamp($request, $id);

        return response()->json(['success' => 'Camp Saved Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Camp::where('id', $id)->delete();

        return response()->json(['success' => 'Camp Deleted Successfully'], 200);
    }

    private function createOrUpdateCamp($request, $id = null)
    {
        $camp = isset($id) ? Camp::find($id) : new Camp();
        $camp->camp_type = $request->campType;
        $camp->dr_name = $request->doctorName;
        $camp->dr_phone_no = $request->doctorPhoneNumber;
        $camp->dr_id = $request->doctorID;
        $camp->camp_datetime = date("Y-m-d H:i:s", strtotime($request->campDateAndTime));
        $camp->address = $request->campAddress;
        $camp->lat = $request->campLat;
        $camp->lng = $request->campLang;
        $camp->user_id = $request->campUserID;
        $camp->is_bp_apparatus = $request->bpApparatus;
        $camp->is_bs_meter = $request->bloodSugarMeter;
        $camp->no_of_strips = $request->strips;
        $camp->no_of_flyers = $request->flyers;
        $camp->no_of_screening_slips = $request->screeingSlips;
        $camp->save();

        return $camp;
    }
}
