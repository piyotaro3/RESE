@extends('layouts.layout')

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/css/mypage.css') }}">
@endsection

@section('title')
    マイページ
@endsection

@section('content')
    <main>
        <div class="LeftContent">
            <h2 class="left_name">{{ $user->name }}さん</h2>
            <div class="root">
                <a href="/history" class="worp">来店履歴へ</a>
            </div>
            <h3 class="h3_left">予約状況</h3>
            @foreach ($reserves as $count => $reserve)
                <div class="reserve_box">
                    <h4 class="reserve_title">予約{{ $count + 1 }}</h4>
                    <form action="/cancel" method="post" class="form_cancel">
                        @csrf
                        <input type="hidden" value="{{ $reserve->pivot->id }}" name='id'>
                        <input type="image" class="cansel_icon" src="{{ asset('img\太いバツのアイコン2.png') }}"
                            onclick='return confirm("予約を取り消しますか？")'>
                    </form>
                    <table>
                        <tr>
                            <th>Shop</th>
                            <td>{{ $reserve->name }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ $reserve->pivot->day }}</td>
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
                    <form action="/update" method="get" class="form_update">
                        @csrf
                        <input type="hidden" value="{{ $reserve->pivot->id }}" name='id'>
                        <input type="submit" class="update_btn" value="予約変更">
                    </form>
                </div>
            @endforeach
        </div>

        <div class="RightContent">
            <h2 class="right_name">{{ $user->name }}さん</h2>
            <h3 class="h3_right">お気に入り店舗</h3>
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
