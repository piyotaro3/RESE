<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $user_id = auth()->id();
        $reserves = Reserve::where('user_id', '=', $user_id)->get();
        $favorites = Favorite::where('user_id', '=', $user_id)->get();


        $param = [
            'user' => $user,
            'reserves' => $reserves,
            'favorete' => $favorites,

        ];
       
        return view('mypage', $param);

    }
}
