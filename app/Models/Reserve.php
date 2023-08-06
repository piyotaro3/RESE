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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function avg_shop($shop_id)
    {
        $shop_reserve = Reserve::where('shop_id', $shop_id)->get();
        $shop_review = Review::where('reserve_id,$shop_reserve')->get('star', 'comment');

    }
}
