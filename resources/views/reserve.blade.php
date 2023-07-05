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
            <a href="#" class="login">マイページへ</a>
            {{--<a href="#" class="login"  onClick="history.back();">戻る</a> --}}
        </div>
    </div>
@endsection
