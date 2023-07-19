@extends('layouts\layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/box.css') }}">
@endsection

@section('title')
    ご予約ありがとうございます
@endsection

@section('content')
    <div class="message_area">
        <div class="message_box">
            <p class="message">ご予約ありがとうございます</p>
            <a href="/mypage" class="root">マイページへ</a>
        </div>
    </div>
@endsection
