<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Models\Review;
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
        $reserve_id = Reserve::where('user_id', $id)->whereDate('day', '<', $today)->select('id')->get();
        $reviews = Review::whereIn('reserve_id', $reserve_id)->with('reserve.shop', 'reserve.user')->get();
        $param = [
            'user' => $user,
            'reserves' => $reserves,
            'reviews' => $reviews,
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

    public function review(ReviewRequest $request)
    {

        $form = $request->all();
        Review::create($form);
        $text = array(
            'message' => 'レビューありがとうございます',
            'route' => '/mypage',
            'route_mes' => 'マイページへ',
        );
        return view('/done', compact('text'));

    }

    public function delete(Request $request)
    {
        Review::find($request->id)->delete();
        return redirect('history');
    }

    public function edit_show(Request $request)
    { {
            $user = Auth::user();
            $reviews = Review::with('reserve.shop')->find($request->id);
            $param = [
                'reviews' => $reviews,
                'user' => $user,
            ];

            return view('review_edit', $param);
        }
    }

    public function edit(ReviewRequest $request)
    {
        $form = $request->get('star','comment');
        unset($form['_token']);
        Review::where('id', $request->id)->update('star','comment');
        dd($form);
        $text = array(
            'message' => 'レビュー内容を変更しました',
            'route' => '/mypage',
            'route_mes' => 'マイページへ',
        );
        return view('/done', compact('text'));
    }
}
