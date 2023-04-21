<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppAd extends Model
{
    protected $fillable =
        [
            'name',
            'package_name',
            'app_icon',
            'select_console',
            'banner_id',
            'interstitial_id',
            'app_openid',
            'native_id',
            'rewarded_id',
            'interstitial_loading',
            'open_ad_loading',
            'interstitial_click',
            'open_ad_click',
            'is_open_ad',
            'is_banner',
            'is_native',
            'is_on_back',
            'is_intrestial',
            'is_screen_change',
        ];
    use HasFactory;

    public function consolve()
    {
        return $this->hasOne(Consolve::class, 'id', 'select_console');
    }
}
