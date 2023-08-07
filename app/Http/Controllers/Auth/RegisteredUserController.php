<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisteredUserController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $text = array(
            'message' => '会員登録あリがとうございます',
            'route' => '/login',
            'route_mes' => 'ログインする',
        );
        return view('done', compact('text'));
    }
}
