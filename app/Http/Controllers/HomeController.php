<?php

namespace App\Http\Controllers;

use App\Models\AppAd;
use App\Models\Consolve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $app_data = AppAd::get();
        $consolve_data = Consolve::get();
        return view('admin.dashboard',compact('app_data','consolve_data'));

    }
    public function sign_out()
    {
        Auth::logout();

        return redirect('login');
    }
}
