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

    <link href="{{ asset(HOME)}}/css/component.css" rel="stylesheet">

    {{--    <link rel="stylesheet" href="static/css/infos1.css"/>--}}
{{--    <link rel="stylesheet" href="static/css/infos2.css"/>--}}
@endsection

@section('container')


    <div class="container">
        <div class="detail-empty-space">
        </div>
        <div id="grid-gallery" class="grid-gallery">
            <section class="grid-wrap wow fadeInUp">
                <ul class="grid">
                    <li class="grid-sizer">
                    </li>
                    @foreach($list as $item)
                    <li>
                        <figure>
                            <div class="shadow">
                                <img src="{{$item['thumb']}}" alt="" />
                                <div class="shadow-text">
                                    <h3>
                                        {{$item['title']}}
                                    </h3>
                                    <p>
                                        {{$item['article_desc']}}
                                    </p>
                                </div>
                            </div>
                        </figure>
                    </li>
                    @endforeach

                </ul>
            </section>
            <script>
                new WOW().init();
            </script>
            <section class="slideshow">
                <ul>
                    @foreach($list as $item)
                    <li>
                        <figure>
                            <figcaption>
                                <h3>
                                    {{$item['title']}}
                                </h3>
                                <p>
                                    {{$item['article_desc']}}
                                </p>
                            </figcaption>
                            <img src="{{$item['thumb']}}" alt="" />
                        </figure>
                    </li>
                    @endforeach
                </ul>
                <nav>
                        <span class="icon nav-prev">
                        </span>
                    <span class="icon nav-next">
                        </span>
                    <span class="icon nav-close">
                        </span>
                </nav>
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
    <script src="{{ asset(HOME)}}/js/modernizr.custom.js"></script>
    <script src="{{ asset(HOME)}}/js/imagesloaded.pkgd.min.js">
    </script>
    <script src="{{ asset(HOME)}}/js/masonry.pkgd.min.js">
    </script>
    <script src="{{ asset(HOME)}}/js/classie.js">
    </script>
    <script src="{{ asset(HOME)}}/js/cbpGridGallery.js">
    </script>
        <script type="text/javascript">
        new WOW().init();
        </script>
        <script>
            new CBPGridGallery(document.getElementById('grid-gallery'));
        </script>

@endsection
