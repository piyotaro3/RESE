@extends('layouts\layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/box.css') }}">
@endsection

@section('title')
    {{ $text['message'] }}
@endsection

@section('content')
    <div class="message_area">
        <div class="message_box">
            <p class="message">{{ $text['message'] }}</p>
            <a href="{{ $text['route'] }}" class="root">{{ $text['route_mes'] }}</a>
        </div>
    </div>
@endsection
