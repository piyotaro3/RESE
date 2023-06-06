@extends('layouts\layout')
<link rel="stylesheet" href="{{ asset('assets/css/box.css') }}">

@section('title')
    会員登録ありがとうございます
@endsection

@section('content')
    <div class="message_area">
        <div class="message_box">
            <p class="thanks">会員登録ありがとうございます</p>
            <a href="/login" class="login">ログインする</a>
        </div>
    </div>
@endsection
