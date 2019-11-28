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

    <div class="wrapper case_wrapper tab_wrapper">
        <div class="container">
            <div class="web-position wow fadeInUp">
                当前位置：
                <a href='/'>
                    网站首页
                </a>
                >
                <a href='#'>
                    未来企服
                </a>
                >
            </div>
            <div class="tab_box modal_show col-sm-12 wow fadeInUp">
                <div class="tab_details on">
                    <div class="row">

                        @foreach($list as $item)
                        <div class="col-sm-4 col-xs-6">
                            <a href="{{route('artInfo', ['id'=>$item['art_id']])}}" title="{{$item['title']}}">
                                <div class="nr">
                                    <div class="img_boxs">
                                        <img class="img-responsive" src="{{$item['thumb']}}" alt="{{$item['title']}}"
                                        />
                                    </div>
                                    <div class="text_boxs">
                                        <h4>
                                            {{$item['title']}}
                                        </h4>
                                        <p class="p2">
                                            详情：{{$item['article_desc']}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div style="text-align: center">
                        {{ $list->links() }}
                    </div>
                </div>

            </div>

            <!--
            <div class="page">
            <dl class="list-inline"><li class="thisclass">1</li>
            <li><a href='list_2.html'>2</a></li>
            <li><a href='list_3.html'>3</a></li>
            <li><a href='list_4.html'>4</a></li>
            <li><a href='list_5.html'>5</a></li>
            <li><a href='list_6.html'>6</a></li>
            <li><a href='list_7.html'>7</a></li>
            <li><a href='list_8.html'>8</a></li>
            <li><a href='list_9.html'>9</a></li>
            <li><a href='list_10.html'>10</a></li>
            <li><a href='list_11.html'>11</a></li>
            <li><a href='list_2.html'>下一页</a></li>
            <li><a href='list_14.html'>末页</a></li>
            </dl>
            </div>
            -->
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


@endsection
