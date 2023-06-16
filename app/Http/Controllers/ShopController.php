<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\User;
use App\Models\Favorite;

class ShopController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

        $param = [
            'shops' => $shops,
            'areas' => $areas,
            'genre' => $genres,
            'user' => $user,

        ];

        return view('shop', $param);
    }
}
