<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function history()
    {
        $today = Carbon::today();
        $user = Auth::user();
        $id = auth()->id();
        $reserves = User::find($id)->reserve_shop()->whereDate('day', '<', $today)->orderBy('day', 'asc')->get();
        $favorites = User::find($id)->favorite_shop()->get();

        $param = [
            'user' => $user,
            'reserves' => $reserves,
            'favorites' => $favorites,
        ];

        return view('visit_history', $param);
    }

    public function review_show(Request $request)
    { {
            $user = Auth::user();
            $reserve = Reserve::with('shop')->find($request->id);

            $param = [
                'reserve' => $reserve,
                'user' => $user,
            ];
            return view('review', $param);
        }
    }
}