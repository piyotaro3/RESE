@extends('layouts.layout')

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/css/shop_all.css') }}">
@endsection

@section('title')
    店舗一覧
@endsection


{{-- 検索機能 --}}
@section('search')
    <div class="search">
        <form action="/search">
            @csrf
            <div class="search_box">
                <div class="search_area">
                    <select name="area_id" onchange="submit(this.form)">
                        <option value="">All&thinsp; area</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}"
                                @if (isset($area_id)) @if ($area->id == $area_id) selected @endif
                                @endif>{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search_genre">
                    <select name="genre_id" onchange="submit(this.form)">
                        <option value="">All&thinsp;genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}"
                                @if (isset($genre_id)) @if ($genre->id == $genre_id) selected @endif
                                @endif>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search_word-area">
                    <div class="search_icon">
                    </div>
                    <input class="search_word" type="text" name="word" placeholder="search...">
                </div>
            </div>
            <input type="submit" class="search_btn">
        </form>
    </div>
@endsection

{{-- 店舗一覧 --}}
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
                        <p><span>{{ $shop->getarea() }}</span><span>{{ $shop->getGenre() }}<span></p>
                    </div>
                    <div class="shop_detail">
                        <form action="/detail/{{ $shop->name }}"method="GET">
                            @csrf
                            <input type="hidden" value="{{ $shop->id }}" name="shop_id">
                            <input type="submit" class="detail_button" value="詳しくみる">
                        </form>
                    </div>
                    {{-- お気に入り機能 --}}
                    <div class="shop_favorite">
                        @auth
                            @if (!Auth::user()->is_favorite($shop->id))
                                <form action="{{ route('favorite.create', $shop) }}" method="post">
                                    @csrf
                                    <button type="submit" class="favorite_button">
                                        <img src="{{ asset('img/heart.png') }}" class="img_favorite">
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('favorite.delete', $shop) }}" method="post">
                                    @csrf
                                    <button type="submit" class="favorite_button">
                                        <img src="{{ asset('img/heart.png') }}" class="img_favorite_on">
                                    </button>
                                </form>
                            @endif
                        @endauth

                        @guest
                            <span class="likes">
                            @endguest
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
