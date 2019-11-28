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

    <div class="main">
        <div class="view-product-detail">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-md-9">
                        <div class="product-detail">
                            <h2 class="product-title text-center">
                                {{$info['title']}}
                            </h2>
                            <!-- 文章内容 -->
                            <div class="product-content">
                                {!! $info['content'] !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 recommend-wrap">
                        <div class="product-detail">
                            <h4 class="recommend-title">
                                相关推荐
                            </h4>
                            @foreach($recommend as $item)
                                <div class="thumbnail">
                                    <a href="{{route('goodsInfo', ['id'=>$item['goods_id']])}}">
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
