@extends('layouts.layout')

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/css/shop_all.css') }}">
@endsection

@section('title')
    店舗一覧
@endsection

@section('search')
    <div class="search">
        <form action="/search">
            @csrf
            <div class="search_box">
                <div class="search_area">
                    <select name="area_id" onchange="submit(this.form)">
                        <option value="">All&thinsp;area</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}"
                                @if (isset($area_id)) @if ($area->id == $area_id) selected @endif
                                @endif>
                                {{ $area->name }}</option>
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
                        @if ($shop->reserve_review_avg_star != null)
                            <div class="review_area">
                                <p>
                                    <span class="star5" data-rate="{{ $shop->reserve_review_avg_star }}"></span>
                                    <span class="shop_review">{{ $shop->reserve_review_avg_star }}点</span>
                                    <span class="shop_com">({{ $shop->reserve_review_count }})</span>
                                </p>
                            </div>
                        @endif
                    </div>
                    <div class="shop_tag">
                        <p><span>{{ $shop->getarea() }}</span><span>{{ $shop->getGenre() }}<span></p>
                    </div>
                    <div class="shop_detail">
                        <form action="/detail/{{ $shop->name }}"method="get" class="detail">
                            @csrf
                            <input type="hidden" value="{{ $shop->id }}" name="shop_id">
                            <input type="submit" class="detail_button" value="詳しくみる">
                        </form>
                    </div>

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
                            <p><span class="likes"></span></P>
                        @endguest
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
