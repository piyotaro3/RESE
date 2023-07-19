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
                        @error('day')
                            <p class="error_p">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="reserve_time">
                        <select name="time">
                            <option value="">選択してください</option>
                            @for ($i = 0; $i <= 23; $i++)
                                @for ($j = 0; $j <= 3; $j += 3)
                                    {{-- 10分毎にする場合 　3を5に変更　$j+=3を$j++に変更 --}}
                                    <option label="{{ $i }}:{{ $j }}0"
                                        value="{{ $i }}:{{ $j }}0">
                                        {{ $i }}:{{ $j }}0</option>
                                @endfor
                            @endfor
                        </select>
                        @error('time')
                            <p class="error_p">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="reserve_number">
                        <select name="number">
                            <option value="">選択してください</option>
                            @for ($i = 1; $i <= 99; $i++)
                                <option label="{{ $i }}" value="{{ $i }}">
                                    {{ $i }}人
                                </option>
                            @endfor
                        </select>
                        @error('number')
                            <p class="error_p">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="check">
                        <div class="detail__reserve-box">
                            {{-- ログイン中のユーザー用 --}}
                            @auth
                                @if ($check != null)
                                    @foreach ($reserves as $reserve)
                                        <table>
                                            <tr>
                                                <th>Shop</th>
                                                <td>{{ $shop->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date</th>
                                                <td>{{ \Carbon\Carbon::parse($reserve->day)->format('Y/m/d') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Time</th>
                                                <td>{{ \Carbon\Carbon::parse($reserve->time)->format('H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Number</th>
                                                <td> {{ $reserve->number }} 人</td>
                                            </tr>
                                    @endforeach
                                    </table>
                                @else
                                    <table>
                                        <tr>
                                            <th>Shop</th>
                                            <td>{{ $shop->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td>予約した日付</td>
                                        </tr>
                                        <tr>
                                            <th>Time</th>
                                            <td>予約した時間</td>
                                        </tr>
                                        <tr>
                                            <th>Number</th>
                                            <td>予約した人数</td>
                                        </tr>
                                    </table>
                                @endif
                            @endauth

                            @guest{{-- 非ログインユーザー用 --}}
                            <table>
                                <tr>
                                    <th>Shop</th>
                                    <td>{{ $shop->name }}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>予約した日付</td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td>予約した時間</td>
                                </tr>
                                <tr>
                                    <th>Number</th>
                                    <td>予約した人数</td>
                                </tr>
                            </table>
                        @endguest
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

{{-- 次の日を表示するため --}}
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
