@section('box')
    <div class="message_area">
        <div class="message_box">
            <p class="thanks">@yield('message')</p>
                <a href="@yield('url')" class="login">@yield('action')</a>
        </div>
    </div>
@endsection
