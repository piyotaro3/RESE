@extends('layouts\layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/box.css') }}">
@endsection

@section('title')
    予約変更完了しました。
@endsection

@section('content')
    <div class="message_area">
        <div class="message_box">
            <p class="message">予約変更完了しました。</p>
            <a href="/mypage" class="root">マイページへ</a>
        </div>
    </div>
@endsection
