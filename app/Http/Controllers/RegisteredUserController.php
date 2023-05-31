<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function index()
    {
       return view('register');
    }

    public function thanks()
    {
        return view('thanks');
    }
}
