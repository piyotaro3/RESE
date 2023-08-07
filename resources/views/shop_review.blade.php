@extends('layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop_review.css') }}">
@endsection

@section('content')
    <main>
        <div class="LeftContent">
            <div class="shop_detail">
                @foreach ($shops as $shop)
                    <div class="title_area">
                        <a href="/">
                            <div class="back_btn">
                                <img src="{{ asset('img/前に戻るアイコン4.png') }}" class="back_img">
                            </div>
                        </a>
                        <h2 class="shop_title">{{ $shop->name }}</h2>
                        <div class="review_area">
                            <p>
                                <span class="star5_rating" data-rate="{{ $shop->reserve_review_avg_star }}"></span>
                                <span class="shop_review">{{ $shop->reserve_review_avg_star }}点</span>
                                <span class="shop_com">({{ $shop->reserve_review_count }})</span>
                            </p>
                        </div>
                        <form action="/detail/{{ $shop->name }}" method="get">
                            @csrf
                            <input type="hidden" value="{{ $shop->id }}" name="shop_id">
                            <input type="submit" class="reveiw_button" value="予約をする">
                        </form>
                    </div>
                    <div class="shop_img">
                        <img src="{{ asset($shop->image) }}">
                    </div>
                    <div class="tags">
                        <p><span>{{ $shop->getarea() }}</span><span>{{ $shop->getGenre() }}</span></p>
                    </div>
                    <div class="detail">
                        <p>{{ $shop->detail }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <div class="reserve_area">
                <h2 class="title_reserve">評価</h2>
            </div>
            <div class="favorit_area">
                @foreach ($reviews as $review)
                    <div class="review_card">
                        <div class="review_shop">
                            <div class="review_name">
                                <h4 class="review_title">店舗名&nbsp;{{ $review->reserve->shop->name }}</h4>
                                <div class="history">
                                    来店日&nbsp;{{ $review->reserve->day }}
                                </div>
                                <div class="review">
                                    <p><span>評価&nbsp;</span></p>
                                    <div class="star">{{ str_repeat('★', $review->star) }}</div>
                                </div>
                            </div>
                            <div>
                                <div class="text">
                                    <p class="text_com">{{ $review->comment }}</p>
                                </div>
                                <div class="user_name">
                                    <p><span>{{ $review->reserve->user->name }}さん</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
