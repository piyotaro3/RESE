<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = [
        'id'
    ];

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function favorite_shop()
    {
        return $this->belongsToMany(Shop::class, 'favorites', 'user_id', 'shop_id');
    }

    public function is_favorite($shop_id)
    {
        $favorite = Favorite::where('user_id', $this->id)->where('shop_id', $shop_id)->get();
        return count($favorite) > 0;
    }

    public function reserve()
    {
        return $this->hasMany(Reserve::class);
    }

    public function reserve_shop()
    {
        return $this->belongsToMany(Shop::class, 'reserves', 'user_id', 'shop_id')->withPivot('number', 'day', 'time');
    }

}