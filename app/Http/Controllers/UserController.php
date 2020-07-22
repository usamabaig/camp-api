<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::with('user_territory', 'user_district', 'user_region', 'user_team', 'user_role')->users($_GET['userID'])->get();

        return response()->json($users);
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
        $request->validate([
            'email' => 'required|unique:users',
            'cnic' => 'required|unique:users,cnic',
            'employeeCode' => 'required|unique:users,employee_code',
            'mobileNumber' => 'required|unique:users,mobile_no',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->cnic = $request->cnic;
        $user->designation = $request->designation;
        $user->password = Hash::make('12345');
        $user->employee_code = $request->employeeCode;
        $user->mobile_no = $request->mobileNumber;
        $user->email = $request->email;
        $user->territory = $request->territory;
        $user->district = $request->district;
        $user->region = $request->region;
        $user->team = $request->team;
        $user->save();

        return response()->json(['success' => 'User Saved Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::with('user_territory', 'user_district', 'user_region', 'user_team', 'user_role')->where('id', $id)->first();

        return response()->json($user);
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
        $user = User::find($id);
        if (!isset($request->cnic) || $user->cnic !== $request->cnic){
            $request->validate([
                'cnic' => 'required|unique:users,cnic',
            ]);
        }
        if ($user->employee_code !== $request->employeeCode){
            $request->validate([
                'employeeCode' => 'required|unique:users,employee_code',
            ]);
        }
        if ($user->mobile_no !== $request->mobileNumber){
            $request->validate([
                'mobileNumber' => 'required|unique:users,mobile_no',
            ]);
        }
        if ($user->email !== $request->email){
            $request->validate([
                'email' => 'required|unique:users',
            ]);
        }
        $user->name = $request->name;
        $user->cnic = $request->cnic;
        $user->designation = $request->designation;
        $user->employee_code = $request->employeeCode;
        $user->mobile_no = $request->mobileNumber;
        $user->email = $request->email;
        $user->territory = $request->territory;
        $user->district = $request->district;
        $user->region = $request->region;
        $user->team = $request->team;
        $user->save();

        return response()->json(['success' => 'User Saved Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return response()->json(['success' => 'User Deleted Successfully'], 200);
    }
}
