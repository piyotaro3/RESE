<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shop_id',
        'number',
        'day',
        'time',
    ];

    protected $guarded = [
        'id'
    ];
}
