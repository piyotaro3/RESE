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
        $word = $request->input('word');
        $genre_id = $request->input('genre_id');
        $area_id = $request->input('area_id');

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
        ];
        return view('shop', $param);
    }
}
