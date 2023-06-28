@extends('layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
@endsection

@section('content')
    <div class="content">
        @foreach ($shops as $shop)
            <div class="shop_detail">
                <div class="title_area">
                    <a href="/">
                        <div class="back_btn">
                            <img src="{{ asset('img/前に戻るアイコン4.png') }}" class="back_img">
                        </div>
                    </a>
                    <h2 class="shop_title">{{ $shop->name }}</h2>
                </div>
                <div class="shop_img">
                    <img src="{{ asset($shop->image) }}">
                </div>
                <div class="tags">
                    <p>{{ $shop->getarea() }}{{ $shop->getGenre() }}</p>
                </div>
                <div class="detail">
                    <p>{{ $shop->detail }}</p>
                </div>
            </div>
        @endforeach
        <div class="test">
            <div>
                <h2 class="title_reserve">予約</h2>
            </div>
            <form action="/reserve" method="POST">
                @csrf
                <div class="reserve_day">
                    <input type="date" id="today">
                </div>
                <div class="reserve_time">
                    <input type="time" step="1800">
                </div>
            </form>
        </div>
    </div>
@endsection

{{-- 今日の日付 --}}
<script type="text/javascript">
    window.onload = function() {
        var date = new Date()
        var year = date.getFullYear()
        var month = date.getMonth() + 1
        var day = date.getDate()

        var toTwoDigits = function(num, digit) {
            num += ''
            if (num.length < digit) {
                num = '0' + num
            }
            return num
        }

        var yyyy = toTwoDigits(year, 4)
        var mm = toTwoDigits(month, 2)
        var dd = toTwoDigits(day, 2)
        var ymd = yyyy + "-" + mm + "-" + dd;

        document.getElementById("today").value = ymd;
    }
</script>
