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
                                <td>{{ \Carbon\Carbon::parse($reserve->day)->format('y/m/d') }}</td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td>{{ \Carbon\Carbon::parse($reserve->time)->format('H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td> {{ $reserve->number }} 人</td>
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
            <div class="favorite_box">


            </div>
        </div>
    </main>
@endsection
