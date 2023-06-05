@section('form')
    <form action="/register" method="post">
        @csrf
        <div class="content_area">
            <div class="content">
                <div class="content_blue">
                    <p class="content_title">@yield('form_title')</p>
                </div>
                <div class="form_area">
                    @yield('user')
                    <div class="icon_email">
                        <img src="{{ asset('img/ifn0636.png') }}">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <p>{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="icon_password">
                        <img src="{{ asset('img/カギアイコン.png') }}">
                        <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <p>{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                </div>
                <div class="button_area">
                    <input type="submit" value="登録" class="button">
                </div>
            </div>
        </div>
    </form>
@endsection
