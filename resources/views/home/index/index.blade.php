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
    <link rel="stylesheet" type="text/css" href="{{ asset(HOME)}}/css/animate.css" />
    {{--    <link rel="stylesheet" href="static/css/infos1.css"/>--}}
    {{--    <link rel="stylesheet" href="static/css/infos2.css"/>--}}
@endsection
@section('container')
    <!-- 主导航 -->
    <div id="slider">
        <div class="owl-carousel owl-theme">
            @foreach($banner_list as $banner)
            <div class="item">
                <a href="{{$banner['link']}}">
                    <img src="{{$banner['thumb']}}" />
                </a>
            </div>
            @endforeach

        </div>
    </div>

    <script type="text/javascript" src="{{ asset(HOME) }}/js/xs.js"></script>
    <!--轮播图-->
    <div class="big">
        <div class="wm-1200">
            <div class="column-container slide-yx">
                <div class="column-bar">
                    <span class="col-title">当季优选</span>
                    <ul class="tab-group">
                        @foreach($cate_1_list as $cate1)
                            <li>{{$cate1['category_name']}}</li>
                        @endforeach

                    </ul>
                    <a href="{{route('group')}}" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper">
                    <div class="tab-box line-type-box">
                        <ul class="column-list-group clearfix">
                            @foreach($goods_1_list as $key=>$goods1)

                                @if($key == 0)
                                    <li class="first-item">
                                <i class="sale-icon"></i>
                                <a href="{{route('goodsInfo', ['id'=>$goods1['goods_id']])}}" class="img-area"><img src="{{$goods1['goods_thumb']}}" alt=""></a>
                                <div class="info-bar">
                                    <a href="" class="tit">{{$goods1['goods_name']}}</a>
                                    <span class="pri"><span class="jg">&yen;<span class="num">{{$goods1['price']}}</span></span>起</span>
                                </div>
                            </li>
                                @else
                                    <li class="item
                                    @if($key == 3 || $key == 8)
                                        mr_0
                                    @endif">
                                        <a href="{{route('goodsInfo', ['id'=>$goods1['goods_id']])}}">
                                            <div class="img-area">
                                                <img src="{{$goods1['goods_thumb']}}" alt=""></div>
                                            <div class="info-area">
                                                <div class="tit">{{$goods1['goods_name']}}</div>
                                                <div class="data-bar clearfix">
                                                    <span class="myd">{{$goods1['sale_value']}} 次好评</span>
                                                    <span class="pri"><span class="jg">&yen;<span class="num">{{$goods1['price']}}</span></span>起</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endif

                            @endforeach

                        </ul>

                    </div>
                </div>
            </div>
            <!-- 当季优选 -->
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">找场地</span>
                    <a href="{{route('group')}}" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper clearfix">
                    <div class="col-side-area">
                        <div class="side-con">
                            <h4 class="type-bar">价位</h4>
                            <ul class="type-group">
                                <li><a href="{{route('group')}}" class="item">不限</a></li>
                                @foreach($cate_5_list as $cate5)
                                <li><a href="{{route('group')}}" class="item">{{$cate5['category_name']}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="side-banner">
                            <a href="" class=""><img src="{{ asset(HOME) }}/picture/68.jpg" alt="" class=""></a>
                        </div>
                    </div>
                    <div class="tab-box same-type-box fr">
                        <ul class="column-list-group clearfix">
                            @foreach($goods_5_list as $key=>$goods5)

                                @if($key <= 6)
                                <li class="item
                                    @if($key == 3 || $key == 6)
                                    mr_0
                                @endif">
                                    <a href="{{route('goodsInfo', ['id'=>$goods5['goods_id']])}}">
                                        <div class="img-area">
                                            <img src="{{$goods5['goods_thumb']}}" alt=""></div>
                                        <div class="info-area">
                                            <div class="tit">{{$goods5['goods_name']}}</div>
                                            <div class="data-bar clearfix">
                                                <span class="myd">{{$goods5['sale_value']}} 次好评</span>
                                                <span class="pri"><span class="jg">&yen;<span class="num">{{$goods5['price']}}</span></span>起</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 找场地 -->
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">主题团建</span>
                    <a href="{{route('group')}}" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper clearfix">
                    <div class="col-side-area">
                        <div class="side-con tj-info">
                            <h4 class="type-bar">主题团建</h4>
                            <ul class="type-group">
                                @foreach($cate_2_list as $cate2)
                                    <li><a href="{{route('group')}}" class="item">{{$cate2['category_name']}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="side-banner">
                            <a href="" class=""><img src="{{ asset(HOME) }}/picture/69.jpg" alt="" class=""></a>
                        </div>
                    </div>
                    <div class="tab-box same-type-box fr">
                        <ul class="column-list-group clearfix">
                            @foreach($goods_2_list as $key=>$goods2)
                                @if($key <= 6)

                                <li class="item
                                    @if($key == 3 || $key == 5)
                                    mr_0
                                @endif">
                                    <a href="{{route('goodsInfo', ['id'=>$goods2['goods_id']])}}">
                                        <div class="img-area">
                                            <img src="{{$goods2['goods_thumb']}}" alt=""></div>
                                        <div class="info-area">
                                            <div class="tit">{{$goods2['goods_name']}}</div>
                                            <div class="data-bar clearfix">
                                                <span class="myd">{{$goods2['sale_value']}} 次好评</span>
                                                <span class="pri"><span class="jg">&yen;<span class="num">{{$goods2['price']}}</span></span>起</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 主题团建 -->
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">客户反馈</span>
                    <a href="{{route('raiders')}}" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper clearfix">
                    <div class="col-side-area">
                        <div class="ship-banner">
                            <a href=""><img src="{{ asset(HOME) }}/picture/70.jpg" alt="" class=""></a>
                        </div>
                    </div>
                    <div class="tab-box ship-type-box fr">
                        <ul class="ship-list-group clearfix">
                            @foreach($art_4_list as $arts4)
                            <li>
                                <a href="{{route('artInfo', ['id'=>$arts4['art_id']])}}" class="name">{{$arts4['title']}}</a>
                                <a href="{{route('artInfo', ['id'=>$arts4['art_id']])}}" class="info-area">
                                    <div class="tit">{{$arts4['article_desc']}}</div>
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <!-- 客户反馈 -->
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">拼团建</span>
                    <a href="{{route('fight')}}" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper clearfix">
                    <ul class="tuan-list-group clearfix">
                        @foreach($pin_list as $key => $pins)
                        <li class="item load
                            @if($key == 3)
                                mr_0
                            @endif
                            ">
                            <a href="{{route('goodsInfos', ['id'=>$pins['goods_id']])}}">
                                <div class="date">
                                    <input type="hidden" name="countDown" data-prefix="还有" data-suffix="" value="{{$pins['end_time']}}">
                                    <span></span><span class="time-end">活动结束</span>
                                </div>
                                <div class="img-area"><img src="{{$pins['goods_thumb']}}" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">{{$pins['goods_name']}}</div>
                                    <div class="data-bar clearfix">
                                        <span class="yhq">
                                            <span class="yj">原价<del>&yen;{{$pins['price']}}</del></span>
                                            <span class="zk">{{$pins['sale_value']}}折</span>
                                        </span>
                                        <span class="pri"><span class="jg">&yen<span class="num">{{$pins['price']*$pins['sale_value']/10}}</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- 拼团建 -->
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">合作伙伴</span>
                    <a href="{{route('cooperation')}}" class="more-link">更多<i class="more-icon"></i></a>
                </div>
            </div>
            <div class="partner-container clearfix">
                <div class="c1 clearfix">

                    @foreach($friendship_list as $key =>$link1)
                        @if($key <= 8)
                            <div class="partner-img
                            @if($key % 2 == 1)
                                    white
                            @else
                                    orange
                            @endif
                            ">
                                <img src="{{$link1['thumb']}}"/>
                            </div>
                        @endif
                    @endforeach

                </div>
                <div class="c2 clearfix">
                    {{--partner-logo-img--}}
                    @foreach($friendship_list as $key =>$link1)
                        @if($key <= 15 && $key >= 9)
                            <div class="
                            @if($key % 2 == 1)
                                        partner-img  white
                            @else
                                    @if($key == 12)
                                    partner-logo-img
                                    @else
                                        partner-img  white
                                    @endif
                                        partner-img  orange
                            @endif
                                    ">
                                <img src="{{$link1['thumb']}}"/>
                            </div>
                        @endif
                    @endforeach


                </div>
                <div class="c3 clearfix">
                    @foreach($friendship_list as $key =>$link1)
                        @if($key >= 19)
                            <div class="partner-img
                            @if($key % 2 == 1)
                                  orange

                            @else
                                    white
                            @endif
                                    ">
                                <img src="{{$link1['thumb']}}"/>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- 合作伙伴 -->
        </div>
    </div>
    <div class="index-pic">
        <a href="list-6.html"><img src="{{ asset(HOME) }}/images/inside-banner.jpg" width="100%"/></a>
    </div>
    <div class="big">
        <div class="wm-1200">
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">未来企服</span>
                    <a href="{{route('future')}}" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper clearfix">
                    <div class="tab-box other-type-box">
                        <div class="qf-first-item">
                            <a href="{{route('artInfo', ['id'=>$art_3_list[0]['art_id']])}}">
                                <div class="img-area">
                                    <img src="{{$art_3_list[0]['thumb']}}" alt="">
                                </div>
                                <div class="info-area">
                                    <div class="tit-al">{{$art_3_list[0]['article_desc']}}</div>

                                </div>
                            </a>
                        </div>
                        <ul class="column-list-group sec-items clearfix">

                            @foreach($art_3_list as $key =>$arts3)
                                @if($key >= 1)
                                    <li class="item">
                                        <a href="{{route('artInfo', ['id'=>$arts3['art_id']])}}">
                                            <div class="img-area"><img src="{{$arts3['thumb']}}" alt=""></div>
                                            <div class="info-area">
                                                <div class="tit-al">{{$arts3['article_desc']}}</div>

                                            </div>
                                        </a>
                                    </li>
                                @endif

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 未来企服 -->

            <div class="column-container cus-show">
                <div class="column-bar">
                    <span class="col-title">个人拼团出游</span>
                    <a href="{{route('fight')}}" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper bd clearfix">
                    <ul class="jieban-list-group clearfix">
                        @foreach($pins_list as $pinss)
                        <li>
                            <a href="{{route('goodsInfo', ['id'=>$pinss['goods_id']])}}" class="">

                                <div class="img-area"><img src="{{$pinss['goods_thumb']}}" alt="" class=""></div>
                                <div class="info-area">
                                    <h4 class="tit">{{$pinss['goods_name']}}</h4>

                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- 个人拼团出游 -->
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">自驾游路线推荐</span>
                    <a href="{{route('raiders')}}" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper clearfix">
                    <div class="tab-box">
                        <ul class="strategy-list-group clearfix">
                            @foreach($art_1_list as $arts1)
                            <li>
                                <a href="{{route('artInfo', ['id'=>$arts1['art_id']])}}">
                                    <div class="img-area">
                                        <img src="{{$arts1['thumb']}}" alt="">
                                        <span class="date">{{$arts1['created_at']}}</span>
                                    </div>
                                    <div class="info-area">
                                        <h4 class="tit">{{$arts1['title']}}</h4>
                                        <div class="line-bar"></div>
                                        <div class="txt">{{$arts1['article_desc']}}</div>
                                    </div>
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <!-- 自驾游路线推荐 -->
        </div>
    </div>
    <div class="big st-brand">
        <div class="wm-1200">
            <ul class="brand-list">
                <li class="item"><i class="icon1"></i>价格公正，安心购买</li>
                <li class="item"><i class="icon2"></i>品质保证，放心出行</li>
                <li class="item"><i class="icon3"></i>产品丰富，一站式服务</li>
                <li class="item last"><i class="icon4"></i>专业顾问，24小时客服</li>
            </ul>
        </div>
    </div>


@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset(HOME)}}/js/countDown.js"></script>
<script>
    $(function(){
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
    })
</script>
@endsection