<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/assets/css/reset.css') }}">
    <style>
        body {
            height: 100vh;
        }

        .content_area {
            height: 80%;
            position: relative;
        }

        .box {
            display: flex;
            height: 10%;
        }

        h1 {
            font-size: 30px;
            margin-top: 15px;
        }

        a {
            text-decoration: none;
            color: blue
        }

        .nav {
            position: absolute;
            height: 100vh;
            width: 100%;
            left: -100%;
            background: #eee;
            transition: .7s;
            text-align: center;
        }

        .nav ul {
            padding-top: 80px;
        }

        .nav ul li {
            list-style-type: none;
            margin-top: 50px;
        }

        .menu {
            display: inline-block;
            width: 36px;
            height: 32px;
            cursor: pointer;
            position: relative;
            left: 20px;
            margin-left: 5%;
            margin-top: 15px;
            border-radius: 5px;
            background-color: blue;
            box-shadow: 2px 2px 1px #C0C0C0;
        }

        .menu__line--top,
        .menu__line--middle,
        .menu__line--bottom {
            display: inline-block;
            width: 100%;
            height: 0.5px;
            background-color: white;
            position: absolute;
            transition: 0.5s;
            margin-left: 8px;
        }

        .menu__line--top {
            width: 30%;
            margin-top: 5px;
        }

        .menu__line--middle {
            top: 14px;
            width: 50%;
        }

        .menu__line--bottom {
            width: 17%;
            top: 22px;

        }

        .menu.open span:nth-of-type(1) {
            top: 14px;
            transform: rotate(45deg);
        }

        .menu.open span:nth-of-type(2) {
            opacity: 0;
        }

        .menu.open span:nth-of-type(3) {
            top: 14px;
            transform: rotate(-45deg);
        }

        .in {
            transform: translateX(100%);
        }

        .title {
            font-size: 15px;
            color: blue;
            margin-left: 5%;

        }

        .content {
            width: 25%;
            height: 260px;
            border: solid 1px;
            border-radius: 5px;
            box-shadow: #C0C0C0 3px 3px 1px;
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -10;
        }

        .content_blue {
            height: 20%;
            background-color: blue;
            margin-bottom: 5%;
            border-radius: 5px 5px 0 0;

        }

        .content_title {
            color: white;
            font-size: 25px;
            margin-left: 5%;
            margin-top: 0;
            padding-top: 2%;
        }

        table {
            width: 100%;
            height: 140px;
        }

        .button_area {
            width: 70px;

        }
    </style>

    <title></title>
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

        <div class="title" @yield('title')>
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
