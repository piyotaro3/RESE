<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
    public function view()
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

        $param = [
            'shops' => $shops,
            'areas' => $areas,
            'genre' => $genres,

        ];

        return view('shop', $param);
    }
}
