<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MypageController extends Controller
{
    public function show()
    {
        $today = Carbon::today();
        $user = Auth::user();
        $id = auth()->id();
        $reserves = User::find($id)->reserve_shop()->whereDate('day', '>=', $today)->orderBy('day', 'asc')->get();
        $favorites = User::find($id)->favorite_shop()->get();

        $param = [
            'user' => $user,
            'reserves' => $reserves,
            'favorites' => $favorites,
        ];
        return view('mypage', $param);
    }
}