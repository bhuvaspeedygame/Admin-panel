<?php

namespace App\Http\Controllers;

use App\Models\AppAd;
use App\Models\Consolve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppAdController extends Controller
{
    function index(Request $request)
    {
        $app_data = AppAd::with('consolve')->get();
        $consolve_data = Consolve::get();
        return view('admin.appad.index',compact('app_data','consolve_data'));
    }

    function create(Request $request)
    {
        dd($request);
        $validator = Validator::make($request->all(), [
            'name' => "required|min:3",
            'package_name' => 'required|',
            'app_icon' => 'image|mimes:png',
            'select_console' => 'required|',
            'banner_id' => 'required|',
            'interstitial_id' => 'required|',
            'app_openid' => 'required|',
            'native_id' => 'required|',
            'rewarded_id' => 'required|',
            'interstitial_loading' => 'required|',
            'open_ad_loading' => 'required|',
            'interstitial_click' => 'required|',
            'open_ad_click' => 'required|',
            'is_open_ad' => 'required|',
            'is_banner' => 'required|',
            'is_native' => 'required|',
            'is_on_back' => 'required|',
            'is_intrestial' => 'required|',
            'is_screen_change' => 'required|',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return redirect()->back()->with('error',$error);
        } else {
            $appad_data = new AppAd();
            $appad_data->name = $request->name;
            $appad_data->package_name = $request->package_name;
            if ($file = $request->hasFile('app_icon')) {

                $file = $request->file('app_icon');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path() . '/app_icon';
                $file->move($destinationPath, $fileName);
                $appad_data->app_icon = $fileName;
            }
            $appad_data->select_console = $request->select_console;
            $appad_data->banner_id = $request->banner_id;
            $appad_data->interstitial_id = $request->interstitial_id;
            $appad_data->app_openid = $request->app_openid;
            $appad_data->native_id = $request->native_id;
            $appad_data->rewarded_id = $request->rewarded_id;
            $appad_data->interstitial_loading = $request->interstitial_loading;
            $appad_data->open_ad_loading = $request->open_ad_loading;
            $appad_data->interstitial_click = $request->interstitial_click;
            $appad_data->open_ad_click = $request->open_ad_click;
            $appad_data->is_open_ad = $request->is_open_ad;
            $appad_data->is_banner = $request->is_banner;
            $appad_data->is_native = $request->is_native;
            $appad_data->is_on_back = $request->is_on_back;
            $appad_data->is_intrestial = $request->is_intrestial;
            $appad_data->is_screen_change = $request->is_screen_change;
            $appad_data->save();
            return redirect()->back()->with('status', "AppAd Successfully Created!");
        }
    }

    function edit(Request $request ,$id)
    {
        $appad_data = AppAd::where('id',$id)->first();
        $consolve_data = Consolve::get();
        return view('admin.appad.update',compact('appad_data','consolve_data'));
    }

    function update(Request $request ,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required|min:3",
            'package_name' => 'required|',
            'app_icon' => 'image|mimes:png',
            'select_console' => 'required|',
            'banner_id' => 'required|',
            'interstitial_id' => 'required|',
            'app_openid' => 'required|',
            'native_id' => 'required|',
            'rewarded_id' => 'required|',
            'interstitial_loading' => 'required|',
            'open_ad_loading' => 'required|',
            'interstitial_click' => 'required|',
            'open_ad_click' => 'required|',
            'is_open_ad' => 'required|',
            'is_banner' => 'required|',
            'is_native' => 'required|',
            'is_on_back' => 'required|',
            'is_intrestial' => 'required|',
            'is_screen_change' => 'required|',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return redirect()->back()->with('error',$error);
        } else {
            $appad_data = AppAd::find($id);
            $appad_data->name = $request->name;
            $appad_data->package_name = $request->package_name;
            if ($file = $request->hasFile('app_icon')) {

                $file = $request->file('app_icon');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path() . '/app_icon';
                $file->move($destinationPath, $fileName);
                $appad_data->app_icon = $fileName;
            }
            $appad_data->select_console = $request->select_console;
            $appad_data->banner_id = $request->banner_id;
            $appad_data->interstitial_id = $request->interstitial_id;
            $appad_data->app_openid = $request->app_openid;
            $appad_data->native_id = $request->native_id;
            $appad_data->rewarded_id = $request->rewarded_id;
            $appad_data->interstitial_loading = $request->interstitial_loading;
            $appad_data->open_ad_loading = $request->open_ad_loading;
            $appad_data->interstitial_click = $request->interstitial_click;
            $appad_data->open_ad_click = $request->open_ad_click;
            $appad_data->is_open_ad = $request->is_open_ad;
            $appad_data->is_banner = $request->is_banner;
            $appad_data->is_native = $request->is_native;
            $appad_data->is_on_back = $request->is_on_back;
            $appad_data->is_intrestial = $request->is_intrestial;
            $appad_data->is_screen_change = $request->is_screen_change;
            $appad_data->update();

            return back()->with("status", "AppAd Successfully Updated!");
        }
    }

    function delete($id)
    {
        $appad_delete = AppAd::find($id);
        $appad_delete->delete();
        return back()->with("status", "AppAd Delete successfully");
    }
}
