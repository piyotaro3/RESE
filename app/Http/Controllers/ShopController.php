<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reserve;
use App\Models\Review;
use Carbon\Carbon;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $areas = Area::all();
        $genres = Genre::all();
        
        $shops = Shop::withAvg('reserve_review', 'star')
            ->withCount([
                'reserve_review' => function ($comment) {
                    $comment->where('comment', '!=', '');
                }
            ])->get();

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
        $shop_id = $request->query('shop_id');

        $query = Shop::query();
        if ($shop_id != null)
            $query->where('id', $shop_id);

        $shops = $query->withAvg('reserve_review', 'star')
            ->withCount([
                'reserve_review' => function ($comment) {
                    $comment->where('comment', '!=', '');
                }
            ])->get();

        $param = [
            'shops' => $shops,
            'user' => $user,
        ];
        return view('detail', $param);
    }

    public function review(Request $request)
    {
        $today = Carbon::today();
        $id = Reserve::where('shop_id', $request->shop_id)->whereDate('day', '<', $today)->get('id');
        $reviews = Review::whereIn('reserve_id', $id)->with('reserve.shop', 'reserve.user')->get();
        $shop_id = $request->query('shop_id');

        $query = Shop::query();
        if ($shop_id != null)
            $query->where('id', $shop_id);

        $shops = $query->withAvg('reserve_review', 'star')
            ->withCount([
                'reserve_review' => function ($comment) {
                    $comment->where('comment', '!=', '');
                }
            ])->get();

        $param = [
            'reviews' => $reviews,
            'shops' => $shops,
        ];
        return view('shop_review', $param);
    }
}
