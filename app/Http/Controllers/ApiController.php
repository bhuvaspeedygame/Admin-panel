<?php

namespace App\Http\Controllers;

use App\Models\AppAd;
use App\Models\Blog;
use App\Models\Profile;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use function Illuminate\Support\Str;

class ApiController extends Controller
{
    public function home(Request $request)
    {
        $app_data = AppAd::get();

        $banner_ids = [];
        $native_ids = [];
        $interstitial_ids = [];
        $app_openids = [];
        $rewarded_ids = [];
        $interstitial_clicks = [];

        foreach($app_data as $data)
        {
            $data_banner_id = str_replace(['[','"',']'] ,"",$data->banner_id);

            $banner_ids[] = $data_banner_id;
            $native_ids[] = $data->native_id;
            $interstitial_ids[] = $data->interstitial_id;
            $app_openids[] = $data->app_openid;
            $rewarded_ids[] = $data->rewarded_id;
            $interstitial_clicks[] = $data->interstitial_click;
        }


        $native_id = collect($native_ids);
        $banner_id = collect($banner_ids);
        $interstitial_id = collect($interstitial_ids);
        $app_openid = collect($app_openids);
        $rewarded_id = collect($rewarded_ids);
        $interstitial_click= implode($interstitial_clicks);


        $data = [
            'Banners' => $banner_id,
            'Natives' => $native_id,
            'Interstitials' => $interstitial_id,
            'Opens' => $app_openid,
            'Rewards' => $rewarded_id,
            'click' => $interstitial_click,
            'back' => "0",
            "vpage" => "1",
            "vlink" => "https =>//d1ex46a0eaqlz9.cloudfront.net/",
            "vid" => "touchvpn",
            "app_status" => "0",
            "app_link" => "https =>//play.google.com/store/apps/details?id=com.apps",
            "vc" => "DE",
        ];

        return $data;
    }

    public function app_package(Request $request)
    {
        if(!empty($request->is_new == "true"))
        {
            $appad_data = AppAd::where('package_name',$request->package_name)->first();

            $appad_data = AppAd::find($appad_data->id);
            $appad_data->total_user = $appad_data->total_user + 1;
            $appad_data->save();
        }

        if(!empty($request->is_new == "true") && !empty($request->country_name) && !empty($request->ipv4))
        {
            $appad_data = AppAd::where('package_name',$request->package_name)->first();

            $userlog_data = new UserLog();
            $userlog_data->app_id = $appad_data->id;
            $userlog_data->country_name = $request->country_name;
            $userlog_data->ip_address = $request->ipv4;
            $userlog_data->save();
        }

        if(!empty($request->package_name))
        {
            $app_data = AppAd::where('package_name',$request->package_name)->get();
            $array_data = [];
            foreach($app_data as $data)
            {
                if(!empty($data->banner_id))
                {
                    $data_banner = str_replace(['[','"',']'] ,"",$data->banner_id);
                    $data_banner_id = explode(',',$data_banner);
                    $banner = str_replace(["[","]"],"",$data_banner_id);
                    $array_data['Banners'] = $banner;
                }
                else
                {
                    $array_data['Banners'] = [];
                }

                if(!empty($data->native_id))
                {
                    $data_native = str_replace(['[','"',']'] ,"",$data->native_id);
                    $data_native_id = explode(',',$data_native);
                    $native = str_replace(["[","]"],"",$data_native_id);
                    $array_data['Natives'] = $native;
                }
                else
                {
                    $array_data['Natives'] = [];
                }

                if(!empty($data->interstitial_id))
                {
                    $data_interstitial = str_replace(['[','"',']'] ,"",$data->interstitial_id);
                    $data_interstitial_id = explode(',',$data_interstitial);
                    $interstitial = str_replace(["[","]"],"",$data_interstitial_id);
                    $array_data['Interstitials'] = $interstitial;
                }
                else
                {
                    $array_data['Interstitials'] = [];
                }

                if(!empty($data->app_openid))
                {
                    $data_open = str_replace(['[','"',']'] ,"",$data->app_openid);
                    $data_open_id = explode(',',$data_open);
                    $opens = str_replace(["[","]"],"",$data_open_id);
                    $array_data['Opens'] = $opens;
                }
                else
                {
                    $array_data['Opens'] = [];
                }

                if(!empty($data->rewarded_id))
                {
                    $data_rewarded = str_replace(['[','"',']'] ,"",$data->rewarded_id);
                    $data_rewarded_id = explode(',',$data_rewarded);
                    $rewarded = str_replace(["[","]"],"",$data_rewarded_id);
                    $array_data['Rewards'] = $rewarded;
                }
                else
                {
                    $array_data['Rewards'] = [];
                }

                if($data->interstitial_click == "1" || $data->interstitial_click == "0")
                {
                    $array_data['click'] = $data->interstitial_click;
                }
                else
                {
                    $array_data['click'] = "";
                }

                if($data->back == "1" || $data->back == "0")
                {
                    $array_data['back'] = $data->back;
                }
                else
                {
                    $array_data['back'] = "";
                }

                if($data->v_page == "1" || $data->v_page == "0")
                {
                    $array_data['vpage'] = $data->v_page;
                }
                else
                {
                    $array_data['vpage'] = "";
                }

                if(!empty($data->vlink))
                {
                    $array_data['vlink'] = $data->vlink;
                }
                else
                {
                    $array_data['vlink'] = "";
                }

                if(!empty($data->vid))
                {
                    $array_data['vid'] = $data->vid;
                }
                else
                {
                    $array_data['vid'] = "";
                }

                if($data->app_status == "1" || $data->app_status == "0")
                {
                    $array_data['app_status'] = $data->app_status;
                }
                else
                {
                    $array_data['app_status'] = "";
                }

                if(!empty($data->app_link))
                {
                    $array_data['app_link'] = $data->app_link;
                }
                else
                {
                    $array_data['app_link'] = "";
                }

                if(!empty($data->vc))
                {
                    $array_data['vc'] = $data->vc;
                }
                else
                {
                    $array_data['vc'] = "";
                }

            }

            return $array_data;
        }
        else
        {
            return \Response::json(['msg' => 'Package Name Not Found']);
        }


    }

}
