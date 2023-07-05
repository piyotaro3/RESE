<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $id = auth()->id();
        $reserves = User::find($id)->reserve_shop()->orderBy('day', 'desc')->get();
        /**$reserves = User::find($id)->reserve_shop()->orderBy('day', 'asc')->get();*//**降順*/
        $favorites = User::find($id)->favorite_shop()->get();

        $param = [
            'user' => $user,
            'reserves' => $reserves,
            'favorites' => $favorites,
        ];
      
        return view('mypage', $param);

    }
}
