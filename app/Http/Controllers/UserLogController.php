<?php

namespace App\Http\Controllers;

use App\Models\AppAd;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class   UserLogController extends Controller
{
    function index(Request $request)
    {
        if(!empty($request->id))
        {
            $data_userlog = UserLog::where('app_id',$request->id)->get();
        }
        else
        {
            $data_userlog = UserLog::get();
        }

        return view('admin.userlog.index',compact('data_userlog'));
    }
}
