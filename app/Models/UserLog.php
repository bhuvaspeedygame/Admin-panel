<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $fillable = [
        'app_id',
        'country_name',
        'ip_address',
    ];

    use HasFactory;

    public function app()
    {
        return $this->hasOne(AppAd::class, 'id', 'app_id');
    }
}
