<?php

namespace App\Http\Controllers;

use App\Camp;
use Illuminate\Http\Request;

class CampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camps = Camp::get();

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function createCamp($request, $id = 0)
    {
        $camp = new Camp();
        $camp->camp_name = $request->camp_name;
        $camp->camp_type = $request->camp_type;
        $camp->dr_name = $request->dr_name;
        $camp->camp_datetime = date("Y-m-d H:i:s", strtotime($request->camp_datetime));
        $camp->lat = $request->lat;
        $camp->lng = $request->lng;
        $camp->user_id = $request->user_id;
        $camp->is_bp_apparatus = $request->is_bp_apparatus;
        $camp->is_bs_meter = $request->is_bs_meter;
        $camp->no_of_strips = $request->no_of_strips;
        $camp->no_of_flyers = $request->no_of_flyers;
        $camp->no_of_screening_slips = $request->no_of_screening_slips;
    }
}
