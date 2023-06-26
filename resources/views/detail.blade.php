@extends('layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
@endsection

@section('content')
    <div class="content">
        @foreach ($shops as $shop)
            <div class="shop_detail">
                <div class="title_area">
                    <a href="/">
                        <div class="back_btn">
                            <img
                                src="{{ asset('img/前に戻るアイコン4.png') }}" class="test" >
                        </div>
                    </a>
                    <h2 class="shop_title">{{ $shop->name }}</h2>
                </div>
                <div class="shop_img">
                    <img src="{{ asset($shop->image) }}">
                </div>
                <div class="tags">
                    <p>{{ $shop->getarea() }}{{ $shop->getGenre() }}</p>
                </div>
                <div class="detail">
                    <p>{{ $shop->detail }}</p>
                </div>
        @endforeach
    </div>
@endsection
