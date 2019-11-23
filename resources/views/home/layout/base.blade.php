<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <link type="text/css" rel="stylesheet" href="{{ asset(HOME) }}/css/base.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset(HOME) }}/css/header.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset(HOME) }}/css/footer.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset(HOME) }}/css/swiper.min.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset(HOME) }}/css/index.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset(HOME) }}/css/owl.carousel.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset(HOME) }}/css/owl.theme.default.css" />
    <script src="{{ asset(HOME) }}/js/jquery.min.js"></script>

    <!--[if lte IE 9]>
    <script>if (!/upgrade\.html/.test(location.href)) window.location = window.location.host+'/upgrade.html'; </script>
    <![endif]-->
    @section('resources')

    @show
</head>
<body>
@include('home.layout.header')

@section('container')

@show


@include('home.layout.footer');
<script src="{{ asset(HOME) }}/js/swiper.min.js"></script>
<script src="{{ asset(HOME) }}/js/superslide.min.js"></script>
<script type="text/javascript" src="{{ asset(HOME) }}/js/owl.carousel.js"></script>
<script type="text/javascript" src="{{ asset(HOME) }}/js/superfish.js"></script>
<script type="text/javascript" src="{{ asset(HOME) }}/js/jquery.slicknav.js"></script>
<script type="text/javascript" src="{{ asset(HOME) }}/js/countDown.js"></script>

<script type="text/javascript">
    jQuery(".cus-show").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:5,interTime:50});
</script>

@section('scripts')

@show
</body>
</html>