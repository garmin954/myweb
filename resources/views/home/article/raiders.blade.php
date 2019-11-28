@extends('home.layout.base')
@section('title')
    {{$config['web_name']}}
@endsection
@section('keywords'){{$config['keywords']}}@endsection
@section('description'){{$config['description']}}@endsection
@section('resources')

    <link rel="stylesheet" href="{{ asset(HOME)}}/css/normalize.css"/>
    <link href="{{ asset(HOME)}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset(HOME)}}/css/bootstrap-me.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset(HOME)}}/css/common.css" />

    <link rel="stylesheet" type="text/css" href="{{ asset(HOME)}}/css/animate.css" />
    <link href="{{ asset(HOME)}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset(HOME)}}/css/bootstrap-me.css" rel="stylesheet">
    <link href="{{ asset(HOME)}}/css/case.css" rel="stylesheet">

    {{--    <link rel="stylesheet" href="static/css/infos1.css"/>--}}
{{--    <link rel="stylesheet" href="static/css/infos2.css"/>--}}
@endsection

@section('container')


    <div class="inside_banner_main">
        <div class="inside_banner">
            <img src="{{ asset(HOME)}}/picture/inside_banner.jpg" />
        </div>
    </div>
    <div class="products-wrap">
        <div class="container">
            <div class="web-position strategy wow fadeInUp">
                当前位置：
                <a href='/'>
                    网站首页
                </a>
                >
                <a href='list-5.html'>
                    团建攻略
                </a>
                >
            </div>
            <div class="row-flex wow fadeInUp">
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="article-2.html">
                            <img class="card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1" alt="古北水镇|自驾游全攻略">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                古北水镇|自驾游全攻略
                            </h4>
                            <p class="card-text">
                                古北水镇Tips：江南水乡|司马台长城
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="article-2.html" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="article-2.html">
                            <img class="card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1" alt="古北水镇|自驾游全攻略">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                古北水镇|自驾游全攻略
                            </h4>
                            <p class="card-text">
                                古北水镇Tips：江南水乡|司马台长城
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="article-2.html" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="article-2.html">
                            <img class="card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1" alt="古北水镇|自驾游全攻略">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                古北水镇|自驾游全攻略
                            </h4>
                            <p class="card-text">
                                古北水镇Tips：江南水乡|司马台长城
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="article-2.html" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="article-2.html">
                            <img class="card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1" alt="古北水镇|自驾游全攻略">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                古北水镇|自驾游全攻略
                            </h4>
                            <p class="card-text">
                                古北水镇Tips：江南水乡|司马台长城
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="article-2.html" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="article-2.html">
                            <img class="card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1" alt="古北水镇|自驾游全攻略">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                古北水镇|自驾游全攻略
                            </h4>
                            <p class="card-text">
                                古北水镇Tips：江南水乡|司马台长城
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="article-2.html" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="article-2.html">
                            <img class="card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1" alt="古北水镇|自驾游全攻略">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                古北水镇|自驾游全攻略
                            </h4>
                            <p class="card-text">
                                古北水镇Tips：江南水乡|司马台长城
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="article-2.html" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="article-2.html">
                            <img class="card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1" alt="古北水镇|自驾游全攻略">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                古北水镇|自驾游全攻略
                            </h4>
                            <p class="card-text">
                                古北水镇Tips：江南水乡|司马台长城
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="article-2.html" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="article-2.html">
                            <img class="card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1" alt="古北水镇|自驾游全攻略">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                古北水镇|自驾游全攻略
                            </h4>
                            <p class="card-text">
                                古北水镇Tips：江南水乡|司马台长城
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="article-2.html" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="article-2.html">
                            <img class="card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1" alt="古北水镇|自驾游全攻略">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                古北水镇|自驾游全攻略
                            </h4>
                            <p class="card-text">
                                古北水镇Tips：江南水乡|司马台长城
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="article-2.html" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="article-2.html">
                            <img class="card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1" alt="古北水镇|自驾游全攻略">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                古北水镇|自驾游全攻略
                            </h4>
                            <p class="card-text">
                                古北水镇Tips：江南水乡|司马台长城
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="article-2.html" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="article-2.html">
                            <img class="card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1" alt="古北水镇|自驾游全攻略">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                古北水镇|自驾游全攻略
                            </h4>
                            <p class="card-text">
                                古北水镇Tips：江南水乡|司马台长城
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="article-2.html" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="article-2.html">
                            <img class="card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1" alt="古北水镇|自驾游全攻略">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                古北水镇|自驾游全攻略
                            </h4>
                            <p class="card-text">
                                古北水镇Tips：江南水乡|司马台长城
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="article-2.html" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset(HOME)}}/js/jquery.min.js">
    </script>
    <script type="text/javascript" src="{{ asset(HOME)}}/js/bootstrap.min.js">
    </script>
    <script src="{{ asset(HOME)}}/js/jquery.SuperSlide.2.1.1.js">
    </script>
    <script src="{{ asset(HOME)}}/js/js-detail.js"></script>
    <script type="text/javascript" src="{{ asset(HOME)}}/js/wow.min.js"></script>
    <script type="text/javascript">
        new WOW().init();


    </script>
    <script type="text/javascript">

    </script>
@endsection
