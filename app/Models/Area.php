<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    protected $guarded = [
        'id'
    ];
    public function shops()
    {
        return $this->hasmany('App\Models\Shop');
    }
}
