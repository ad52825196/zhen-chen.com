<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="author" content="Zhen Chen" />
    <meta name="keywords" content="{{ $keywords }}" />

    @section('title')
    <title>{{ $title }}</title>
    @show

    <link rel="canonical" href="{{ $canonical }}" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/css/weather-icons.min.css" />
    <link rel="stylesheet" href="/css/weather-icons-wind.min.css" />
    <link rel="stylesheet" href="/css/nprogress.css" />
    <link rel="stylesheet" href="/css/jquery.fullPage.css" />
    <link rel="stylesheet" href="/css/main.css" />
</head>
<body>
    @include('layouts.analytics')

    @section('menu')
    @include('layouts.menu')
    @show

    <div id="body">
    @yield('body')
    </div>

    @section('footer')
    @include('layouts.footer')
    @show

    @section('totop')
    <div id="to-top" class="hidden hidden-xs" onclick="$('html, body').animate({scrollTop: 0}, 'slow'); return false;">
        <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
    </div>
    @show

    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.pjax.js"></script>
    <script src="/js/nprogress.js"></script>
    <script src="/js/jquery.fullPage.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
