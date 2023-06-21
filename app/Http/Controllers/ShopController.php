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
    /**店舗一覧表示 */
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

    /**店舗検索 */
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

    /**店舗詳細表示 */
    public function detail(Request $request)
    {
        $user = Auth::user();
        $shops = Shop::all();
        $shop_id = $request->query('shop_id');

        $query = Shop::query();
        if ($shop_id != null)
            $query->where('id', $shop_id);

        $shops = $query->get();
        $param = [
            'shops' => $shops,
            'user' => $user,
        ];
        return view('detail', $param);
    }
}
