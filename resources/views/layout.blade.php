<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="author" content="Zhen Chen" />
    <meta name="keywords" content="@yield('keywords'){{ $meta['keywords'] or '' }}" />

    <title>@yield('title'){{ $meta['title'] or '' }}</title>

    <link rel="canonical" href="@yield('canonical'){{ $meta['canonical'] or '' }}" />

    <link rel="icon" href="/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/css/weather-icons.min.css" />
    <link rel="stylesheet" href="/css/weather-icons-wind.min.css" />
    <link rel="stylesheet" href="/css/main.css" />

    <script src="//tajs.qq.com/stats?sId=54396677" async></script>

    @yield('head')
</head>
<body>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-44785715-2', 'auto');
    ga('send', 'pageview');
</script>

<!-- Begin Nav Bar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
            <a class="navbar-brand" href="/">Rainbow</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li id="home"><a href="/">Home</a></li>
                <li><a href="#" title="Coming Soon">Blog</a></li>
                <li class="dropdown" id="portfolio">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Portfolio <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" title="Coming Soon">Programming</a></li>
                        <li><a href="#" title="Coming Soon">Videos</a></li>
                        <li><a href="#" title="Coming Soon">Translation</a></li>
                    </ul>
                </li>
                <li class="dropdown" id="gallery">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" title="Coming Soon">Animations</a></li>
                        <li><a href="#" title="Coming Soon">Books</a></li>
                        <li><a href="#" title="Coming Soon">Cards</a></li>
                        <li><a href="#" title="Coming Soon">Footprints</a></li>
                        <li><a href="#" title="Coming Soon">Games</a></li>
                        <li><a href="#" title="Coming Soon">Movies</a></li>
                        <li><a href="#" title="Coming Soon">Music</a></li>
                        <li><a href="#" title="Coming Soon">People</a></li>
                        <li><a href="#" title="Coming Soon">Softwares</a></li>
                        <li><a href="#" title="Coming Soon">Storytelling</a></li>
                        <li><a href="#" title="Coming Soon">TV Shows</a></li>
                        <li><a href="#" title="Coming Soon">Websites</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" title="Coming Soon">Special</a></li>
                    </ul>
                </li>
                <li id="giveaway"><a href="#" title="Coming Soon">Giveaway</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li id="guestbook"><a href="guestbook" title="Coming Soon">Guestbook</a></li>
                <li class="dropdown" id="about">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="about">Me</a></li>
                        <li><a href="#" title="Coming Soon">Resume</a></li>
                        <li><a href="#" title="Coming Soon">Changelog</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Nav Bar -->

<!-- Announcement -->
<div class="alert alert-info" role="alert"><strong>Heads up!</strong> This website is currently under migration and rebuild. The whole process may last for a couple of months.</div>
@yield('announcement')
@if (isset($alerts))
    @foreach ($alerts as $alert)
    <div class="alert {{ $alert['type'] or 'alert-info' }}" role="alert">{{ $alert['content'] or '' }}</div>
    @endforeach
@endif

<!-- Begin Container -->
<div class="container">
    @yield('container')
</div>
<!-- End Container -->

<!-- Begin Footer -->
<footer>
    <p class="text-muted">
    Powered by <a href="//laravel.com/">Laravel</a>, <a href="//www.cloudflare.com/">CloudFlare</a> and <a href="//m.do.co/c/abfc6e767656">DigitalOcean</a>
    Copyright <span class="fa fa-copyright"></span> 2013
    <script>
    var myDate = new Date(), t = myDate.getFullYear();
    if (t > 2013) { document.write("- ", t); }
    </script>
    <a rel="license" href="//creativecommons.org/licenses/by-nc-sa/4.0/">CC BY-NC-SA 4.0</a>
    </p>

    <ul class="social-icon flat-list">
        <li><a href="//www.facebook.com/profile.php?id=100008100810667"><span class="fa fa-facebook-official fa-lg"></span></a></li>
        <li><a href="//weibo.com/chenzhen42"><span class="fa fa-weibo fa-lg"></span></a></li>
        <li><a href="//github.com/ad52825196"><span class="fa fa-github fa-lg"></span></a></li>
        <li><a href="//steamcommunity.com/profiles/76561198026604898"><span class="fa fa-steam-square fa-lg"></span></a></li>
    </ul>
</footer>
<!-- End Footer -->

<!-- To-Top Block -->
<div id="to-top" class="hidden hidden-xs" onclick="$('html, body').animate({scrollTop: 0}, 'slow'); return false;">
    <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
</div>

<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/jquery.lazyload.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>

<script>$('#@yield("active"){{ $meta["active"] or "" }}').addClass('active');</script>

@yield('foot')
</body>
</html>
