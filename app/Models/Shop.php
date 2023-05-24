<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'genre_id',
        'area_id',
        'detail',
        'image',
    ];
    protected $guarded = [
        'id'
    ];
}
