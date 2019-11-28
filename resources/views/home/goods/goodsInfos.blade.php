@extends('home.layout.base')
@section('title')
    {{$info['goods_name']}}-{{$config['web_name']}}
@endsection
@section('keywords')
    {{$info['goods_name']}}-{{$config['keywords']}}
@endsection
@section('description')
    {{$info['goods_desc']}}-{{$config['description']}}

@endsection
@section('resources')

    <link type="text/css" rel="stylesheet" href="{{ asset(HOME)}}/css/infos1.css"/>
    <link type="text/css" rel="stylesheet" href="{{ asset(HOME)}}/css/infos2.css"/>
    <link rel="stylesheet" href="{{ asset(HOME)}}/css/normalize.css"/>
    <link rel="stylesheet" href="{{ asset(HOME)}}/css/normalize.css"/>
    <link href="{{ asset(HOME)}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset(HOME)}}/css/bootstrap-me.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset(HOME)}}/css/animate.css" />
    <link href="{{ asset(HOME)}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset(HOME)}}/css/bootstrap-me.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset(HOME)}}/css/common.css" />
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
                                            @foreach($info['picture_list'] as $pic)
                                            <li>
                                                <img
                                                    src="{{$pic}}"
                                                />
                                            </li>
                                            @endforeach

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
                                        {{$info['goods_name']}}
                                    </div>
                                    <div class="inner-detail-header-purposes">
                                        @foreach($cate[CATE_3] as $cate3)
                                            <span> {{$cate3['category_name'] }} </span>
                                        @endforeach
                                    </div>
                                    <div class="inner-detail-header-desc">
                                        {{$info['goods_desc']}}
                                    </div>
                                    <div class="inner-detail-header-tags">
                                                    <span class="iconfont">
                                                        
                                                    </span>
                                        @foreach($cate[CATE_4] as $cate4)
                                            <span class="inner-detail-header-tags-text">{{$cate3['category_name'] }}</span>
                                        @endforeach

                                        <span class="iconfont">
                                                        
                                                    </span>
                                        <span class="inner-detail-header-tags-text">
                                                        {{$info['nums']}}人
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
                                    <div class="inner-product-list-item-date">
                                        <input type="hidden" name="countDown" data-prefix="还有" data-suffix="" value="{{$info['end_time']}}">
                                        <span></span><span class="time-end">活动结束</span>
                                    </div>
                                    <div class="inner-detail-header-price">
                                                    <span>
                                                        {{$info['price']}}
                                                    </span>
                                    </div>
                                    <div class="inner-detail-header-priceBooking">
                                                    <span>
                                                        {{$info['avg']}}人均价
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
                                    @foreach($recommend as $item)
                                        <div class="thumbnail">
                                            <a href="{{route('goodsInfos', ['id'=>$item['goods_id']])}}">
                                                <div class="size-control s-4-3">
                                                    <img class="size-control-item card-img-top"
                                                         src="{{$item['goods_thumb']}}"
                                                         alt="{{$item['goods_name']}}">
                                                </div>
                                            </a>
                                            <div class="caption">
                                                <h5 class="title">
                                                    {{$item['goods_name']}}
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach

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
    <script type="text/javascript" src="{{ asset(HOME)}}/js/wow.min.js"></script>
    <script type="text/javascript" src="{{ asset(HOME)}}/js/countDown.js"></script>
        <script type="text/javascript">
            jQuery(".slide-pics").slide({
                mainCell: ".bd ul",
                autoPlay: true
            });

            $("input[name='countDown']").each(function () {
                var time_end=this.value;
                var con=$(this).next("span");
                var _=this.dataset;
                countDown(con,{
                    title:_.title,//优先级最高,填充在prefix位置
                    prefix:_.prefix,//前缀部分
                    suffix:_.suffix,//后缀部分
                    time_end:time_end//要到达的时间
                })
                //提供3个事件分别为:启动,重启,停止
                    .on("countDownStarted countDownRestarted  countDownEnded ",function (arguments) {
                        console.info(arguments);
                    });
            });

    </script>
    <script type="text/javascript">
        $('.header-menu-m .p-2 img').click(function () {
            $('.header-menu-m-list').toggle();
        });
    </script>
@endsection
