<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;


class ProfileController extends Controller
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
     * Show the user dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $user = auth()->user();
        if ($user) {
            return view("dashboard.profile", compact("user"));
        } else {
            abort(404);
        }
    }
}
