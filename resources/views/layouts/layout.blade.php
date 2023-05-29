<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('resources\css\reset.css') }}">
    <style>
    </style>
    <title></title>
</head>

<body>
    <div class="main_box">

        <div class="title_bar" @yield('title_bar')>
            <div class="bar">
                <div class="menu" @yield('menu')>
                    <span class="menu_line-top"></span>
                    <span class="meny_line-middle"></span>
                    <span class="meny_line-bottom"></span>
                </div>
            </div>
            <div class="title" @yield('title')>
                <h1>RESE</h1>
            </div>
        </div>

        <div class="content">


        </div>
    </div>
</body>

</html>
