<?php

namespace App\Http\Controllers;

use App\Models\AppAd;
use App\Models\Blog;
use App\Models\Profile;
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
            $banner_ids[] = $data->banner_id;
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
        $app_data = AppAd::where('package_name',$request->package_name)->get();

        $banner_ids = [];
        $native_ids = [];
        $interstitial_ids = [];
        $app_openids = [];
        $rewarded_ids = [];
        $interstitial_clicks = [];

        foreach($app_data as $data)
        {
            $banner_ids[] = $data->banner_id;
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
        $interstitial_click= implode(',',$interstitial_clicks);

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
}
