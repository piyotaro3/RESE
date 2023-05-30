<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/layout.css') }}">

    <title>@yield('title')</title>
</head>

<body>

    <div class="box">
        {{-- メニューバー 色の修正は後で --}}
        <nav class="nav" id="nav">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/register">Registration</a></li>
                <li><a href="login">Login</a></li>
            </ul>
        </nav>
        <div class="menu" id="menu">
            <span class="menu__line--top"></span>
            <span class="menu__line--middle"></span>
            <span class="menu__line--bottom"></span>
        </div>

        <div class="title">
            <h1>RESE</h1>
        </div>
    </div>
    <div class="content_area">
        <div class="content">
            <div class="content_blue">
                <p class="content_title">test</p>
            </div>

            <div class="form_area">
                <table>
                    <div class="user">
                    </div>
                    <div class="email">
                    </div>
                    <div class="password">
                    </div>
                </table>
                <div class="button_area">
                </div>
            </div>
        </div>
    </div>

    <script>
        const target = document.getElementById("menu");
        target.addEventListener('click', () => {
            target.classList.toggle('open');
            const nav = document.getElementById("nav");
            nav.classList.toggle('in');
        });
    </script>

</body>

</html>
