<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('resources\css\reset.css') }}">
    <style>
        .main_box {
            display: flex;
            flex-direction: row;
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
            top: 25px;
            margin-left: 5%;
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
    </style>

    <title></title>
</head>

<body>
    <div class="main_box">
        {{-- メニューバー 色の修正は後で --}}
        <nav class="nav" id="nav">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Registration</a></li>
                <li><a href="">Login</a></li>
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

        <div class="content">
        </div>
    </div>
</body>

</html>
