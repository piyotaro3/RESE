@extends('layouts.layout')

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/css/mypage.css') }}">
@endsection

@section('title')
    マイページ
@endsection

{{-- マイページの表示 --}}
@section('content')

    <h2>{{ $user->name }}さん</h2>

    <main>

        <div class="LeftContent">
            <h3>予約状況</h3>
            @foreach ($reserves as $count => $reserve)
                <div class="reserve_box">
                    <div class="resevre_title">
                        <h4>予約{{ $count + 1 }}</h4>
                        <form action="/cansel" method="post">
                            @csrf
                            <input type="hidden" value="{{ $reserve->id }}" name='id'>
                            <input type="submit" class="detail_button" value="詳しくみる">
                        </form>
                        <table>
                            <tr>
                                <th>Shop</th>
                                <td>{{ $reserve->name }}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>{{ \Carbon\Carbon::parse($reserve->pivot->day)->format('y/m/d') }}</td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td>{{ \Carbon\Carbon::parse($reserve->pivot->time)->format('H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td> {{ $reserve->pivot->number }} 人</td>
                            </tr>
                        </table>
                    </div>
                    {{-- <div class="time">
                    <img class="time_icon" src="{{ asset('img/時計の無料アイコン.png') }}">
                </div> --}}
                </div>
            @endforeach
        </div>
        <div class="RightContent">
            <h3>お気に入り店舗</h3>
            <div class="favorit_area">
                @foreach ($favorites as $favorite)
                    <div class="favorite_box">

                        <div class="shop_img">
                            <img src="{{ asset($favorite->image) }}">
                        </div>

                        <div class="shop_text">
                            <div class="shop_name">
                                <h4 class="shop_title">{{ $favorite->name }}</h4>
                            </div>
                            <div class="shop_tag">
                                <p><span>{{ $favorite->getarea() }}</span><span>{{ $favorite->getGenre() }}</span></p>
                            </div>
                            <div class="shop_detail">
                                <form action="/detail/{{ $favorite->name }}"method="GET">
                                    @csrf
                                    <input type="hidden" value="{{ $favorite->id }}" name="shop_id">
                                    <input type="submit" class="detail_button" value="詳しくみる">
                                </form>
                            </div>
                        </div>
                        {{-- お気に入り機能 --}}
                        <div class="shop_favorite">
                            @auth
                                @if (!Auth::user()->is_favorite($favorite->id))
                                    <form action="{{ route('favorite.create', $favorite->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="favorite_button">
                                            <img src="{{ asset('img/heart.png') }}" class="img_favorite">
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('favorite.delete', $favorite->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="favorite_button">
                                            <img src="{{ asset('img/heart.png') }}" class="img_favorite_on">
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
