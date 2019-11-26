@extends('home.layout.base')
@section('title')
    首页
@endsection
@section('keywords')
    首页
@endsection
@section('description')

@endsection
@section('resources')

    <link type="text/css" rel="stylesheet" href="{{ asset(HOME)}}/css/infos1.css"/>
    <link type="text/css" rel="stylesheet" href="{{ asset(HOME)}}/css/infos2.css"/>
    <link rel="stylesheet" href="{{ asset(HOME)}}/css/normalize.css"/>
    <link rel="stylesheet" href="{{ asset(HOME)}}/css/normalize.css"/>
    <link href="{{ asset(HOME)}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset(HOME)}}/css/bootstrap-me.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset(HOME)}}/css/animate.css" />
{{--    <link rel="stylesheet" href="static/css/infos1.css"/>--}}
{{--    <link rel="stylesheet" href="static/css/infos2.css"/>--}}
@endsection

@section('container')

    <div class="container">
        <section class="content">
            <div class="detail">
                <header class="detail-header">
                    <div class="inner-detail-info detail-header-content">
                        <div class="ivu-row">
                            <div class="ivu-col ivu-col-span-24 ivu-col-span-md-12">
                                <div class="slide-pics inner-detail-header-img">
                                    <div class="bd">
                                        <ul>
                                            <li>
                                                <img
                                                    src="https://iproduct.damaotuanjian.com/PRODUCT/BC1E1D10-CAF1-11E9-82FA-6B165D383025-s1"
                                                />
                                            </li>
                                            <li>
                                                <img
                                                    src="https://iproduct.damaotuanjian.com/PRODUCT/B7C76BC0-CF94-11E9-9B87-1B97CC7AA662-s1"
                                                />
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="prev" href="javascript:void(0)">
                                    </a>
                                    <a class="next" href="javascript:void(0)">
                                    </a>
                                </div>
                            </div>

                            <div class="ivu-col ivu-col-span-24 ivu-col-span-md-12">
                                <div class="inner-detail-header-text">
                                    <div class="inner-detail-header-title">
                                        【奔跑吧，少年！】提升凝聚力趣味运动会
                                    </div>
                                    <div class="inner-detail-header-purposes">
                                                    <span>
                                                        增强积极性
                                                    </span>
                                        <span>
                                                        提升凝聚力
                                                    </span>
                                        <span>
                                                        新员工融入
                                                    </span>
                                        <span>
                                                        鼓舞士气
                                                    </span>
                                    </div>
                                    <div class="inner-detail-header-desc">
                                        通过多种新颖特制器材，让参加项目者更为投入，脱离了传统运动会只能“多人观看，少人参与”的不足之处
                                    </div>
                                    <div class="inner-detail-header-tags">
                                                    <span class="iconfont">
                                                        
                                                    </span>
                                        <span class="inner-detail-header-tags-text">
                                                        1天0晚
                                                    </span>
                                        <span class="iconfont">
                                                        
                                                    </span>
                                        <span class="inner-detail-header-tags-text">
                                                        20-800人
                                                    </span>
                                    </div>
                                    <div class="inner-detail-header-submit">
                                        <div class="ivu-row">
                                            <div class="ivu-col ivu-col-span-10">
                                                <div
                                                    class="component-button component-button-primary component-button-circle">
                                                    <button>
                                                        提交需求
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="ivu-col ivu-col-span-10 ivu-col-push-1">
                                                <div
                                                    class="component-button iconfont component-button-info component-button-circle">
                                                    <button>
                                                         在线咨询
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner-detail-header-price">
                                                    <span>
                                                        318
                                                    </span>
                                    </div>
                                    <div class="inner-detail-header-priceBooking">
                                                    <span>
                                                        30人均价
                                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </section>
    </div>

    <div class="cont-bot">
        <div class="container">
            <section class="content">
                <div class="detail">
                    <section class="detail-section-content">
                        <div class="detail-content">
                            {!! $info['content'] !!}
                            <div class="hot-product-items component-order detail-order">
                                <h4 class="component-order-header">
                                    相关推荐
                                </h4>
                            </div>
                            <div class="recommend-wrap">
                                <div class="product-detail">
                                    <div class="thumbnail">
                                        <a href="article-1.html">
                                            <div class="size-control s-4-3">
                                                <img class="size-control-item card-img-top"
                                                     src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1"
                                                     alt="古北水镇">
                                            </div>
                                        </a>
                                        <div class="caption">
                                            <h5 class="title">
                                                古北水镇
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="article-1.html">
                                            <div class="size-control s-4-3">
                                                <img class="size-control-item card-img-top"
                                                     src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1"
                                                     alt="古北水镇">
                                            </div>
                                        </a>
                                        <div class="caption">
                                            <h5 class="title">
                                                古北水镇
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="article-1.html">
                                            <div class="size-control s-4-3">
                                                <img class="size-control-item card-img-top"
                                                     src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1"
                                                     alt="古北水镇">
                                            </div>
                                        </a>
                                        <div class="caption">
                                            <h5 class="title">
                                                古北水镇
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="article-1.html">
                                            <div class="size-control s-4-3">
                                                <img class="size-control-item card-img-top"
                                                     src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1"
                                                     alt="古北水镇">
                                            </div>
                                        </a>
                                        <div class="caption">
                                            <h5 class="title">
                                                古北水镇
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="article-1.html">
                                            <div class="size-control s-4-3">
                                                <img class="size-control-item card-img-top"
                                                     src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1"
                                                     alt="古北水镇">
                                            </div>
                                        </a>
                                        <div class="caption">
                                            <h5 class="title">
                                                古北水镇
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="article-1.html">
                                            <div class="size-control s-4-3">
                                                <img class="size-control-item card-img-top"
                                                     src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1"
                                                     alt="古北水镇">
                                            </div>
                                        </a>
                                        <div class="caption">
                                            <h5 class="title">
                                                古北水镇
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </section>
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
        <script type="text/javascript">
            jQuery(".slide-pics").slide({
                mainCell: ".bd ul",
                autoPlay: true
            });
    </script>
    <script type="text/javascript">
        $('.header-menu-m .p-2 img').click(function () {
            $('.header-menu-m-list').toggle();
        });
    </script>
@endsection
