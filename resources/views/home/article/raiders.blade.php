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

                @foreach($list as $item)
                <div class="col">
                    <div class="thumbnail product-item">
                        <a href="{{ route('artInfo', ['id'=> $item['art_id']]) }}" style="height: 191px;">
                            <img  class="card-img-top" src="{{$item['thumb']}}" alt="{{$item['title']}}" style="width: 100%;height: 100%">
                        </a>
                        <div class="caption">
                            <h4 class="card-title">
                                {{$item['title']}}
                            </h4>
                            <p class="card-text">
                                {{$item['article_desc']}}
                            </p>
                        </div>
                        <footer>
                            <div class="listview-tags col">
                                            <span class="label label-info">
                                                团建攻略
                                            </span>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('artInfo', ['id'=> $item['art_id']]) }}" class="btn btn-htj">
                                    查看攻略
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                @endforeach

            </div>
            <div style="text-align: center">
                {{ $list->links() }}
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
