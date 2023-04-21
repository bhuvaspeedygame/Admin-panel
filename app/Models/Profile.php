<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'image',
        'company_logo',
        'name',
        'about',
        'company',
        'job',
        'country',
        'address',
        'phone',
        'email',
        'twitter',
        'facebook ',
        'instagram ',
        'linkedin',
    ];
}
