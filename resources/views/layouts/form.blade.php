@section('form')
    <form action="/tanks" method="post">
        @csrf
        <div class="content_area">
            <div class="content">
                <div class="content_blue">
                    <p class="content_title">@yield('form_title')</p>
                </div>
                <div class="form_area">
                    <div class="icon_user">
                        <img src="{{ asset('img/人物アイコン.png') }}">
                        <input type="text" name="name" placeholder="Username" value="{{ old('name') }}">
                    </div>
                    <div class="icon_email">
                        <img src="{{ asset('img/ifn0636.png') }}">
                        <input type="email" name="email" placeholder="Email" value="{{ old('name') }}">
                    </div>
                    <div class="icon_password">
                        <img src="{{ asset('img/カギアイコン.png') }}">
                        <input type="password" name="email" placeholder="Password" value="{{ old('password') }}">
                    </div>
                </div>
                <div class="button_area">
                <input type="submit" value="登録" class="button">
                </div>
            </div>
        </div>
    </form>
@endsection
