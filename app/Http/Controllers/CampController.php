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
        $camps = Camp::with('user', 'user.user_territory', 'user.user_district', 'user.user_region', 'user.user_team')->camps($_GET['userID'])
            ->orderBy('camp_datetime', 'desc')
            ->get();

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
        /*if ($camp_id == false) {
            return response()->json(['success' => "Doctor ID already Exists."], 400);
        }*/

        $spo_region = User::where('id', $request->campUserID)->value('region');
        $spo_admin = User::where('region', $spo_region)->whereIn('designation', [1,2,3,4,5,6,7,8,9,10])->get();

        $notifications = [];
        foreach ($spo_admin as $admin) {
            $notification = new Notification();
            $notification->notification = 'Camp created successfully';
            $notification->user_id = $admin->id;
            $notification->camp_id = $camp_id->id;
            $notifications[] = $notification->toArray();
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
        $status = $this->createOrUpdateCamp($request, $id);
        $msg = $status == false ? "Doctor ID already exists." : "Camp Saved Successfully";

        return response()->json(['success' => $msg], $status == false ? 400 : 200);
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
        /*if (isset($id)) {
            $c = Camp::find($id);
            if ($c->dr_id != $request->doctorID) {
                return false;
            }
        } else {
            $c = Camp::where('dr_id', $request->doctorID)->count();
            if ($c > 0) {
                return false;
            }
        }*/
        $camp = isset($id) ? Camp::find($id) : new Camp();
        $camp->camp_type = $request->campType;
        $camp->dr_name = $request->doctorName;
        $camp->dr_phone_no = $request->doctorPhoneNumber;
        $camp->dr_id = $request->doctorID;
        $camp->camp_datetime = date("Y-m-d H:i:s", strtotime($request->campDateAndTime));
        $camp->address = $request->campAddress;
        $camp->lat = $request->campLat;
        $camp->lng = $request->campLang;
        if (!isset($id)) {
            $camp->user_id = $request->campUserID;
        }
        $camp->is_bp_apparatus = isset($request->bpApparatus) ? $request->bpApparatus : 0;
        $camp->is_bs_meter = isset($request->bloodSugarMeter) ? $request->bloodSugarMeter : 0;
        $camp->no_of_strips = isset($request->strips) ? $request->strips : 0;
        $camp->no_of_flyers = isset($request->flyers) ? $request->flyers : 0;
        $camp->no_of_screening_slips = isset($request->screeingSlips) ? $request->screeingSlips : 0;
        $camp->save();

        if ($id !== null) {
            $user = User::find($request->campUserID);

            if (in_array($user->designation, [4, 5])) {
                $bum_user = User::where([['team', '=', $user->team], ['designation', '=', '3']])->pluck('email')->toArray();
                if (!empty($bum_user)) {
                    $camp_url = config('mail.ANGULAR_APP_URL') . 'camps/viewEditCamp/' . $camp->id;
                    $html = 'Dear Manager' . '<br><br>' . 'Following camp information has been changed by one of the Product Managers. You can verify it by clicking on the following link. ' . '<br><br>' . '<a href="'.$camp_url.'">' . 'Updated Camp' . '</a>' . '<br><br>' . 'Thanks';

                    \Mail::send(array(), array(), function ($message) use ($html, $bum_user) {
                        $message->to($bum_user)
                            ->subject('Camp Edit Notification')
                            ->setBody($html, 'text/html');
                    });
                }
            }
        }

        return $camp;
    }
}
