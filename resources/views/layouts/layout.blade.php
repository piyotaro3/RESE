<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/header.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    @yield('header')
    <div class="box">
        <nav class="nav" id="nav">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/register">Registration</a></li>
                @if (Auth::check())
                    <form action="/logout" method="POST">
                        @csrf
                        <li><button class='logout'>Logout</button></li>
                    </form>
                @else
                    <li><a href="login">Login</a></li>
                @endif
            </ul>
        </nav>
        <div class="menu" id="menu">
            <span class="menu__line--top"></span>
            <span class="menu__line--middle"></span>
            <span class="menu__line--bottom"></span>
        </div>
        <div class="title">
            <h1>Rese</h1>
        </div>
        @yield('search')
    </div>

    <script>
        const target = document.getElementById("menu");
        target.addEventListener('click', () => {
            target.classList.toggle('open');
            const nav = document.getElementById("nav");
            nav.classList.toggle('in');
        });
    </script>

    @yield('content')
</body>

</html>
