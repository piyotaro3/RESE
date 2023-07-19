<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reserve;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

        $param = [
            'shops' => $shops,
            'areas' => $areas,
            'genres' => $genres,
            'user' => $user,
        ];
        return view('shop', $param);
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $areas = Area::all();
        $genres = Genre::all();
        $word = $request->query('word');
        $genre_id = $request->query('genre_id');
        $area_id = $request->query('area_id');

        $query = Shop::query();
        if ($genre_id != null)
            $query->where('genre_id', $genre_id);
        if ($area_id != null)
            $query->where('area_id', $area_id);
        if ($word != null)
            $query->where('name', 'LIKE BINARY', "%$word%");

        $shops = $query->get();

        $param = [
            'shops' => $shops,
            'user' => $user,
            'areas' => $areas,
            'genres' => $genres,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
        ];
        return view('shop', $param);
    }

    public function detail(Request $request)
    {
        $user = Auth::user();
        $user_id = auth()->id();
        $shops = Shop::all();
        $shop_id = $request->query('shop_id');

        $query = Shop::query();
        if ($shop_id != null)
            $query->where('id', $shop_id);
        $shops = $query->get();

        $check = Reserve::where('user_id', $user_id)->where('shop_id', $shop_id)->exists();
        $reserves = Reserve::where('user_id', '=', $user_id)->where('shop_id', '=', $shop_id)->orderBy('id', 'desc')->take(1)->get();

        $param = [
            'shops' => $shops,
            'user' => $user,
            'reserves' => $reserves,
            'check' => $check,
        ];
        return view('detail', $param);
    }
}
