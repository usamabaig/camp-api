<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
        return view('home');
    }

    public function viewDeletedUsers()
    {
        if (auth()->user()->id == 1) {
            $users = User::onlyTrashed()->get();
        } else {
            return redirect()->back();
        }

        return view('deleted_users')->with('users', $users);
    }

    public function restoreUser($user_id)
    {
        if (auth()->user()->id == 1) {
            User::withTrashed()->find($user_id)->restore();
        } else {
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function hardDeleteUser($user_id)
    {
        if (auth()->user()->id == 1) {
            User::withTrashed()->find($user_id)->forceDelete();
        } else {
            return redirect()->back();
        }

        return redirect()->back();
    }
}
