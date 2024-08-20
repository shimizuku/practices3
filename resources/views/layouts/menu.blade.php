<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <meta name="Description" content="ポートフォリオ" />
        <meta name="Keywords" content="ポートフォリオ,エンジニア" />
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"><!--アイコンwebフォント-->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
        <!-- Scripts -->
    </head>
    <body>
        <div>
            <canvas id="canvas">
        </div>
        <div class="container">
            <!--メニュー-->
            <div class="menu-wrap">
                <nav class="menu">
                    <div class="icon-list">
                        <a href="{{ route('index') }}">
                            <span>トップページ</span>
                        </a>
                        <a href="{{ route('contents') }}">
                            <span>コンテンツ</span>
                        </a>
                        <a href="{{ route('contact.show') }}">
                            <span>コンタクト</span>
                        </a>
                    </div>
                </nav>
                <button class="close-button" id="close-button">Close Menu</button>
                <!-- / .menu-Open Menu -->
            </div>
            <button class="menu-button" id="open-button">Open Menu</button>
            <div class="content-wrap">
                <div class="content"> @yield('content') </div>
                <!-- / .content-wrap -->
            </div>
            <!-- / .container -->
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!--メニュー-->
        <script>
            $(function () {
                $('#nav li a').hover(function () {
                    $(this).find('span').stop().animate({
                        'marginRight': '100px'
                    }, 500);
                }, function () {
                    $(this).find('span').stop().animate({
                        'marginRight': '0px'
                    }, 300);
                });
            });
        </script>
        <!--テキストアニメーション-->
        <script>
            $(function () {
                $(".tagline").letterfx({
                    "fx": "fall",
                    "backwards": false,
                    "timing": 100,
                });
            });
        </script>
    </body>
</html>
