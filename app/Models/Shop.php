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

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function getarea()
    {
        return '#' . optional($this->area)->name;
    }
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function getgenre()
    {
        return '#' . optional($this->genre)->name;
    }
    public function getshopname()
    {
        return optional($this->shop)->name;
    }
    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reserve()
    {
        return $this->hasMany(Reserve::class);
    }

    public function reserve_user()
    {
        return $this->belongsToMany(User::class,)->withPivot('number', 'day', 'time');
    }

}
