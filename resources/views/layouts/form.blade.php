@section('form')
    <form action="@yield('route')" method="POST">
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
                        @error('email')
                            <p>{{ $message}}</p>
                        @enderror
                    </div>
                    <div class="icon_password">
                        <img src="{{ asset('img/カギアイコン.png') }}">
                        <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                        @error('password')
                            <p>{{ $message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="button_area">
                    <input type="submit" value="@yield('button')" class="button">
                </div>
            </div>
        </div>
    </form>
@endsection

