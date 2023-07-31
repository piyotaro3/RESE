@extends('layouts.layout')

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/css/mypage.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/visit_history.css') }}">
@endsection

@section('title')
    来店履歴
@endsection

@section('content')
    <main>
        <div class="LeftContent">
            <h2 class="left_name">{{ $user->name }}さん</h2>
            <div class="root">
                <a href="/mypage" class="worp">マイページへ</a>
            </div>
            <h3 class="h3_left">来店履歴</h3>
            @foreach ($reserves as $count => $reserve)
                <div class="reserve_box">
                    <h4 class="reserve_title">履歴{{ $count + 1 }}</h4>
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
                    <form action="/review" method="get" class="form_update">
                        @csrf
                        <input type="hidden" value="{{ $reserve->pivot->id }}" name='id'>
                        <input type="submit" class="update_btn" value="評価する">
                    </form>
                </div>
            @endforeach
        </div>

        <div class="RightContent">
            <h2 class="right_name">{{ $user->name }}さん</h2>
            <h3 class="h3_right">コメント履歴</h3>
            <div class="favorit_area">
                @foreach ($reviews as $review)
                    <div class="review_card">
                        <div class="review_shop">
                            <h4 class="review_title">
                                店舗名&nbsp;{{ $review->reserve->shop->name }}&emsp;&emsp;来店日&nbsp;{{ $review->reserve->day }}&emsp;&emsp;評価&nbsp;
                                <div class="star">{{ str_repeat('★', $review->star) }}</div>
                            </h4>
                        </div>
                        <div class="text">
                            <p>{{ $review->comment }}</p>
                        </div>
                        <div class="form_edit">
                            <form action="/review_edit" method="get">
                                @csrf
                                <input type="hidden" value="{{ $review->id }}" name='id'>
                                <input type="submit" class="edit_btn" value="編集する">
                            </form>
                            <form action="/review_delete" method="post">
                                @csrf
                                <input type="hidden" value="{{ $review->id }}" name='id'>
                                <input type="submit" class="delete_btn" onclick='return confirm("レビューを取り消しますか？")'
                                    value="削除する">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
