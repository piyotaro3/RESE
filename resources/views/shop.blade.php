@extends('layouts.layout')
<link rel="stylesheet" href="{{ asset('assets/css/shop_all.css') }}">

@section('title')
    店舗一覧
@endsection

@section('content')
    <div class="shop_all">
        <div class="shop_card">
            <div class="shop_img">
                <img src="{{ asset('img/italian.jpg') }}">
            </div>
            <div class="shop_text">
                <div class="shop_name">
                    <h2 class="shop_title">テスト</h2>
                </div>
                <div class="shop_tag">
                    <p class="shop_tag">#テスト#テスト</p>
                </div>
                <div class="shop_detalil"></div>
                <div class="shop_favorite"></div>
            </div>
        </div>
    </div>
@endsection
