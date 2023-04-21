<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consolve extends Model
{
    protected $fillable= [
            'name',
            'person_name',
            'gmail',
            'mobile',
            'account_link',
            'account_country',
            'order_id',
            'account_id',
            'status',

    ];
    use HasFactory;
}
