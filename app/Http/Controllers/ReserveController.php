<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;

class ReserveController extends Controller
{
    public function reserve(ReserveRequest $request)
    {
        $form = $request->all();
        Reserve::create($form);

        $text = array(
            'message' => 'ご予約ありがとうございます',
            'route' => '/mypage',
            'route_mes' => 'マイページへ',
        );
        return view('/done', compact('text'));
    }
    public function cancel(Request $request)
    {
        Reserve::find($request->id)->delete();
        return redirect('mypage');
    }

    public function update_view(Request $request)
    {
        $user = Auth::user();
        $reserve = Reserve::with('shop')->find($request->id);

        $param = [
            'reserve' => $reserve,
            'user' => $user,
        ];
        return view('update', $param);
    }

    public function update(ReserveRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Reserve::where('id', $request->id)->update($form);

        $text = array(
            'message' => '予約変更完了しました',
            'route' => '/mypage',
            'route_mes' => 'マイページへ',
        );
        return view('/done', compact('text'));
    }
}
