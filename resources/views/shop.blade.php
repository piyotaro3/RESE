@extends('layouts.layout')
<link rel="stylesheet" href="{{ asset('assets/css/shop_all.css') }}">

@section('title')
    店舗一覧
@endsection



@section('search')
    <div class="search">
        <form action="/search">
            @csrf
            <div class="search_box">
                <div class="search_area">
                    <select name="area_id" >
                        <option value="">All area</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search_genre">
                    <select name="genre_id">
                        <option value="">All&nbsp;genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" >{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search_word-area">
                    <div class="search_icon">
                        {{--  <img src="{{ asset('img/検索アイコン.png') }}"> --}}
                    </div>
                    <input class="search_word" type="text" name="word" placeholder="search...">
                </div>
            </div>
            <input type="submit" class="search_btn">
        </form>
    </div>
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
                        <p>{{ $shop->getarea() }}{{ $shop->getGenre() }}</p>
                    </div>
                    <div class="shop_detail">
                        <form action="/detail/{{ $shop->id }}"method="GET">
                            @csrf
                            <input type="hidden" value="{{ $shop->id }}" name="shop_id">
                            <input type="submit" class="detail_button" value="詳細ページ">
                        </form>
                    </div>

                    <div class="shop_favorite">
<<<<<<< HEAD
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
=======
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
>>>>>>> 09291019431c5adfbc46a15576a06ae2f585951d
                        @guest
                            <span class="likes">
                            @endguest
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
