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

    <link href="{{ asset(HOME)}}/css/about.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset(HOME)}}//css/aos.css" />
    <script type="text/javascript" src="{{ asset(HOME)}}//js/aos.js"></script>
    <style>
        .service_main:nth-child(even){background: #ffffff}
    </style>

@endsection

@section('container')

    <div class="inside_banner_main">
        <div class="inside_banner">
            <img src="{{asset(HOME)}}/picture/inside_banner.jpg" />
        </div>
    </div>
    <!--公司简介-->
    <div class="inside_main service_main">
        <div class="container">
            <div class="index_title" aos="fade-up">
                <h2>
                    公司简介
                </h2>
                <span>
                 About Us
                </span>
            </div>
            <!--列表-->
            <div class="row company_introduction">
                <div class="col-sm-4 about_img" aos="fade-up">
                    <img src="{{$config['gs_image']}}" />
                </div>
                <div class="col-sm-8 InfoContent clearfix" aos="fade-up">
                    {!! $config['about_us'] !!}
                </div>
            </div>
        </div>
    </div>
    <!--企业文化-->
    <div class="inside_main service_main culture_mian">
        <div class="culture_bg" style="background-image: url({{ asset(HOME) }}/images/bg1.jpg);">
        </div>
        <!--背景-->
        <div class="container">
            <div class="culture_text" aos="fade-up">
                <div class="culture_title">
                    <h2>
                        联系我们
                    </h2>
                    <span>
                            </span>
                </div>
                <div class="InfoContent">
                    <p style="margin-top: 0px; margin-bottom: 0px; white-space: normal; text-align: justify; font-stretch: normal; font-size: 12px; line-height: normal;">
                                <span style="font-family: 黑体, SimHei;">
                                    <strong style="font-size: 16px;">
                                        全国免费服务热线：
                                    </strong>
                                    <strong style="font-size: 16px;">
                                    </strong>
                                </span>
                    </p>
                    <p style="margin-top: 0px; margin-bottom: 0px; white-space: normal; text-align: justify; font-stretch: normal; font-size: 11px; line-height: normal;">
                                <span style="-webkit-font-kerning: none; font-size: 14px; font-family: 黑体, SimHei;">
                                   {{$config['tels']}}
                                </span>
                    </p>
                    <p style="margin-top: 0px; margin-bottom: 0px; white-space: normal; text-align: justify; font-stretch: normal; font-size: 11px; line-height: normal;">
                                <span style="font-size: 16px; -webkit-font-kerning: none; font-family: 黑体, SimHei;">
                                    <br/>
                                </span>
                    </p>
                    <p style="margin-top: 0px; margin-bottom: 0px; white-space: normal; text-align: justify; font-stretch: normal; font-size: 12px; line-height: normal;">
                                <span style="-webkit-font-kerning: none; font-size: 16px; font-family: 黑体, SimHei;">
                                    <strong>
                                        地址：
                                    </strong>
                                </span>
                    </p>
                    <p style="margin-top: 0px; margin-bottom: 0px; white-space: normal; text-align: justify; font-stretch: normal; font-size: 11px; line-height: normal;">
                                <span style="-webkit-font-kerning: none; font-size: 14px; font-family: 黑体, SimHei;">
                                    {{$config['address']}}
                                </span>
                    </p>
                    <p style="margin-top: 0px; margin-bottom: 0px; white-space: normal; text-align: justify; font-stretch: normal; font-size: 11px; line-height: normal;">
                                <span style="font-size: 16px; -webkit-font-kerning: none; font-family: 黑体, SimHei;">
                                    <br/>
                                </span>
                    </p>
                    <p style="margin-top: 0px; margin-bottom: 0px; white-space: normal; text-align: justify; font-stretch: normal; font-size: 12px; line-height: normal;">
                                <span style="-webkit-font-kerning: none; font-size: 16px; font-family: 黑体, SimHei;">
                                    <strong>
                                        联系人：
                                    </strong>
                                </span>
                    </p>
                    <p style="margin-top: 0px; margin-bottom: 0px; white-space: normal; text-align: justify; font-stretch: normal; font-size: 11px; line-height: normal;">
                                <span style="-webkit-font-kerning: none; font-size: 14px; font-family: 黑体, SimHei;">
                                    {{$config['contact']}}
                                </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--合作伙伴-->
    <div class="inside_main service_main">
        <div class="container">
            <div class="index_title" aos="fade-up">
                <a href="javascript:void(0);">
                    <h2>
                        合作客户
                    </h2>
                    <span>
                                OUR PARTNERS
                            </span>
                </a>
            </div>
            <!--列表-->
            <div class="row partner_list">
                @foreach($adv_list as $adv)
                <div class="col-xs-6 col-sm-3 col-md-2 column" aos="fade-up">
                    <a href="javascript:void(0);">
                        <div class="img">
                            <img src="{{$adv['thumb']}}" alt="" />
                        </div>
                    </a>
                </div>
                @endforeach

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
                //动画
                AOS.init({
                    offset: 20,
                    duration: 600,
                    easing: 'ease-in-sine',
                    delay: 100,
                });
                $(function() {
                    $('.header .nav>li:eq(5)').addClass('active');
                });
            </script>
@endsection
