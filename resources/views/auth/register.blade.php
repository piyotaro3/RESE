@extends('layouts\layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endsection

@section('title')
    会員登録
@endsection

@section('content')
    <form action="/thanks" method="post">
        @csrf
        <div class="content_area">
            <div class="content">
                <div class="content_blue">
                    <h2 class="content_title">Registration</h2>
                </div>
                <div class="form_area">
                    <div class="icon_user">
                        <img src="{{ asset('img/人物アイコン.png') }}">
                        <input type="text" name="name" placeholder="Username" value="{{ old('name') }}">
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="icon_email">
                        <img src="{{ asset('img\シンプルなメールのアイコン素材.png') }}">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="icon_password">
                        <img src="{{ asset('img/カギアイコン.png') }}">
                        <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="button_area">
                    <input type="submit" value="登録" class="button">
                </div>
            </div>
        </div>
    </form>
@endsection
