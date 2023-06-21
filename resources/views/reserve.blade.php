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
            <p class="thanks">ご予約ありがとうございます</p>
            <a href="/login" class="login">戻る</a>{{-- 後で変更する --}}
        </div>
    </div>
@endsection
