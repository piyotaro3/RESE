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

            <div>
                <form action="/reserve" method="POST">
                    @csrf
                    <div class="reserve_day">
                        <input type="date" id="tomorrow" name="day">
                    </div>

                    <div class="reserve_time">
                        <select name="time">
                            <option value="17:00">17:00</option>{{-- "選択してください"のほうが適切かも --}}
                            @for ($i = 0; $i <= 24; $i++)
                                @for ($j = 0; $j <= 5; $j++)
                                    <option label="{{ $i }}:{{ $j }}0"
                                        value="{{ $i }}:{{ $j }}0">
                                        {{ $i }}:{{ $j }}0</option>
                                @endfor
                            @endfor
                        </select>
                    </div>

                    <div class="reserve_number">
                        <select name="number">
                            <option value="1">1人</option>{{-- "選択してください"のほうが適切かも --}}
                            @for ($i = 2; $i <= 99; $i++)
                                <option label="{{ $i }}" value="{{ $i }}">
                                    {{ $i }}人
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="check">


                        <div class="detail__reserve-box">
                            <table>
                                <tr>
                                    <th>Shop</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Number</th>
                                    <td>人</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    @auth
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button class="reserve__btn" type="submit" name="shop_id" value="{{ $shop->id }}">予約する</button>
                    @endauth
                    @guest
                        <button class="reserve__btn" type="submit" name="shop_id" value="{{ $shop->id }}">予約する</button>
                    @endguest
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- 次の日 --}}
<script type="text/javascript">
    window.onload = function() {
        var date = new Date()
        date.setDate(date.getDate() + 1);
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

        document.getElementById("tomorrow").value = ymd;
    }
</script>
