@extends('layouts\layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/box.css') }}">
@endsection

@section('title')
    会員登録ありがとうございます
@endsection

@section('content')
    <div class="message_area">
        <div class="message_box">
            <p class="message">会員登録ありがとうございます</p>
            <a href="/login" class="root">ログインする</a>
        </div>
    </div>
@endsection
