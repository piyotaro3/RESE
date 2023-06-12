@extends('layouts.layout')
<link rel="stylesheet" href="{{ asset('assets/css/shop_all.css') }}">

@section('title')
    店舗一覧
@endsection

@section('content')
    <div class="shop_all">
        @foreach ($shops as $shop)
            <div class="shop_card">
                <div class="shop_img">
                    <img src="{{ asset($shop->image) }}">
                </div>
                <div class="shop_text">
                    <div class="shop_name">
                        <h2 class="shop_title">{{ $shop->name }}</h2>
                    </div>
                    <div class="shop_tag">
                        <p class="shop_tag">{{ $shop->getarea() }}{{ $shop->getGenre() }}</p>
                    </div>
                    <div class="shop_detalil"></div>
                    <div class="shop_favorite"></div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
