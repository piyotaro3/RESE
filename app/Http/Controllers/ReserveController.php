<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use App\Models\Reserve;

class ReserveController extends Controller
{
    public function reserve(ReserveRequest $request)
    {
        $form = $request->all();
        Reserve::create($form);
        return redirect('/reserve/OK');
    }

    public function cansel(Request $request)
    {
        Reserve::find($request->id)->delete();
        return redirect('mypage');
    }
}
