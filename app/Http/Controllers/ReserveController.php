<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    /**予約機能登録 */
    public function reserve(ReserveRequest $request)
    {
        $form = $request->all();
        Reserve::create($form);
        return redirect('/reserve/OK');
    }
}
