<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    protected $guarded = [
        'id'
    ];
    public function shops(){
        return $this->hasMany('App\Models\Shop');
    }

}
