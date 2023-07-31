@extends('layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/review.css') }}">
@endsection

@section('content')
    <main>
        @foreach ($reviews as $review)
            <div class="LeftContent">
                <div class="shop_detail">

                    <div class="title_area">
                        <a href="/history">
                            <div class="back_btn">
                                <img src="{{ asset('img/前に戻るアイコン4.png') }}" class="back_img">
                            </div>
                        </a>
                        <h2 class="shop_title">{{ $review->reserve->shop->name }}</h2>
                    </div>
                    <div class="shop_img">
                        <img src="{{ asset($review->reserve->shop->image) }}">
                    </div>
                    <div class="tags">
                        <p><span>{{ $review->reserve->shop->getarea() }}</span><span>{{ $review->reserve->shop->getGenre() }}</span>
                        </p>
                    </div>
                    <div class="detail">
                        <p>{{ $review->reserve->shop->detail }}</p>
                    </div>

                </div>
            </div>

            <div class="RightContent">
                <div class="reserve_area">
                    <h2 class="title_reserve">履歴</h2>
                    <div class="check">

                        <div class="detail__reserve-box">
                            <div>
                                <table>
                                    <tr>
                                        <th>Shop</th>
                                        <td>{{ $review->reserve->shop->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td>{{ $review->reserve->day }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Time</th>
                                        <td> {{ Carbon\Carbon::parse($review->reserve->time)->format('H:i') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Number</th>
                                        <td>{{ $review->reserve->number }}人</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="review">
                    <div>
                        <h2 class="title_reserve">評価</h2>
                    </div>
                    <form action="review" method="post">
                        @csrf
                        <div class="rate-form">
                            <input id="star5" type="radio" name="star" value="5">
                            <label for="star5">★</label>
                            <input id="star4" type="radio" name="star" value="4">
                            <label for="star4">★</label>
                            <input id="star3" type="radio" name="star" value="3">
                            <label for="star3">★</label>
                            <input id="star2" type="radio" name="star" value="2">
                            <label for="star2">★</label>
                            <input id="star1" type="radio" name="star" value="1">
                            <label for="star1">★</label>
                        </div>
                        <div class="comment_area">
                            <textarea rows="10" cols="50" name="comment">{{ $review->comment }}</textarea>
                        </div>
                        <input type="hidden" name="review_id" value="{{ $review->id }}">
                        <input class="reserve__btn" type="submit" value="投稿する">
                    </form>
                </div>
            </div>
        @endforeach
    </main>
@endsection
