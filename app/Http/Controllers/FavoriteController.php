<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function create($shop_id)
    {
        $user = \Auth::user();
        if (!$user->is_favorite($shop_id)) {
            $user->favorite_shop()->attach($shop_id);
        }
        return back();
    }
    public function delete($shop_id)
    {
        $user = \Auth::user();
        if ($user->is_favorite($shop_id)) {
            $user->favorite_shop()->detach($shop_id);
        }
        return back();
    }
}
