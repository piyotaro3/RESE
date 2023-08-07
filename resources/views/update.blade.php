@extends('layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
@endsection

@section('content')
    <main>
        <div class="LeftContent">
            <div class="shop_detail">
                <div class="title_area">
                    <a href="/">
                        <div class="back_btn">
                            <img src="{{ asset('img/前に戻るアイコン4.png') }}" class="back_img">
                        </div>
                    </a>
                    <h2 class="shop_title">{{ $reserve->shop->name }}</h2>
                </div>
                <div class="shop_img">
                    <img src="{{ asset($reserve->shop->image) }}">
                </div>
                <div class="tags">
                    <p><span>{{ $reserve->shop->getarea() }}</span><span>{{ $reserve->shop->getGenre() }}</span></p>
                </div>
                <div class="detail">
                    <p>{{ $reserve->shop->detail }}</p>
                </div>
            </div>
        </div>

        <div class="RightContent">
            <div class="reserve_area">
                <div>
                    <h2 class="title_reserve">予約変更</h2>
                </div>
                <div>
                    <form action="/update/OK" method="post" id="reserveForm">
                        @csrf
                        <div class="reserve_day">
                            <input type="date" id="tomorrow" name="day" value="{{ $reserve->day }}">
                            @error('day')
                                <p class="error_p">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="reserve_time">
                            <select name="time">
                                <option disabled selected value="{{ Carbon\Carbon::parse($reserve->time)->format('H:i') }}">
                                    選択してください</option>
                                @for ($i = 0; $i <= 23; $i++)
                                    @for ($j = 0; $j <= 3; $j += 3)
                                        @if ($i < 10)
                                            <option label="0{{ $i }}:{{ $j }}0"
                                                value="0{{ $i }}:{{ $j }}0">
                                                0{{ $i }}:{{ $j }}0</option>
                                        @else
                                            <option label="{{ $i }}:{{ $j }}0"
                                                value="{{ $i }}:{{ $j }}0">
                                                {{ $i }}:{{ $j }}0</option>
                                        @endif
                                    @endfor
                                @endfor
                            </select>
                            @error('time')
                                <p class="error_p">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="reserve_number">
                            <select name="number">
                                <option disabled selected value="{{ $reserve->number }}人">選択してください</option>
                                @for ($i = 1; $i <= 99; $i++)
                                    <option label="{{ $i }}人" value="{{ $i }}人">
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
                                <div id="reserveOutput">
                                    <table>
                                        <tr>
                                            <th>Shop</th>
                                            <td>{{ $reserve->shop->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td id="reserveOutputday">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Time</th>
                                            <td id="reserveOutputtime">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Number</th>
                                            <td id="reserveOutputnumber"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="id" value="{{ $reserve->id }}">
                        <button class="reserve__btn" type="submit" name="shop_id" onclick='return confirm("予約を変更しますか？")'
                            value="{{ $reserve->shop->id }}">予約を変更する</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
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

    <script type="text/javascript">
        window.onload = function() {
            getValue();
            var $formObject = document.getElementById("reserveForm");
            for (var $i = 0; $i < $formObject.length; $i++) {
                $formObject.elements[$i].onkeyup = function() {
                    getValue();
                };
                $formObject.elements[$i].onchange = function() {
                    getValue();
                };
            }
            document.getElementById("reserveOutputLength");
        }

        function getValue() {
            var $formObject = document.getElementById("reserveForm");
            document.getElementById("reserveOutputday").innerHTML = $formObject.day.value;
            document.getElementById("reserveOutputtime").innerHTML = $formObject.time.value;
            document.getElementById("reserveOutputnumber").innerHTML = $formObject.number.value;
        }
    </script>
@endsection
