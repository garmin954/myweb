@extends('home.layout.base')
@section('title')
    {{$config['web_name']}}
@endsection
@section('keywords'){{$config['keywords']}}@endsection
@section('description'){{$config['description']}}@endsection

@section('container')
    <!-- 主导航 -->
    <div id="slider">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <a href="#">
                    <img src="https://imetadata.damaotuanjian.com/METADATA/40B7DB90-D3A0-11E9-8E15-D3DCA8C874B5" />
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="https://imetadata.damaotuanjian.com/METADATA/B8C8254D-BC47-B6A1-9DFB-4BE027AA5538" />
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="https://imetadata.damaotuanjian.com/METADATA/E4F36930-CFD2-11E9-8E03-C3E3740D724B" />
                </a>
            </div>
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
                        <li>亲子互动</li>
                        <li>水上娱乐</li>
                        <li>户外体验</li>
                        <li>周边跟团游</li>
                    </ul>
                    <a href="#" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper">
                    <div class="tab-box line-type-box">
                        <ul class="column-list-group clearfix">
                            <li class="first-item">
                                <i class="sale-icon"></i>
                                <a href="" class="img-area"><img src="{{ asset(HOME) }}/picture/01.jpg" alt=""></a>
                                <div class="info-bar">
                                    <a href="" class="tit">【青春游】成都+色达+新都桥+稻城亚双...</a>
                                    <span class="pri"><span class="jg">&yen;<span class="num">10799.00</span></span>起</span>
                                </div>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/02.png" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit">都江堰-成都大熊猫繁育基地汽车1日游牛人专线，...</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/03.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit">峨眉山-乐山双汽2日游</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item mr_0">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/04.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit">[中秋]成都+都江堰+青城山1日游净纯玩蜀都，0自...</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/05.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit">【青春游】成都+色达+新都桥+稻城亚丁双汽12日游</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/06.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit">【青春游】成都+色达+新都桥+稻城亚丁双汽8日跟团游</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/07.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit">【直通车】成都+都江堰+青城山巴士往返1日游含青...</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/08.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit">都江堰-青城山汽车1日游金牌导游，万人甄选，纯玩...</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item mr_0">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/09.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit">[中秋]成都+都江堰+青城山1日游净纯玩蜀都，0自...</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    <!--
                    <ul class="column-list-group clearfix">
                        <li class="first-item">
                            <i class="sale-icon"></i>
                            <a href="" class="img-area"><img src="{{ asset(HOME) }}/picture/s1.jpg" alt=""></a>
                            <div class="info-bar">
                                <a href="" class="tit">【青春游】成都+色达+新都桥+稻城亚双...</a>
                                <span class="pri"><span class="jg">&yen;<span class="num">10799.00</span></span>起</span>
                            </div>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/02.png" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">都江堰-成都大熊猫繁育基地汽车1日游牛人专线，...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/03.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">峨眉山-乐山双汽2日游</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item mr_0">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/04.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">[中秋]成都+都江堰+青城山1日游净纯玩蜀都，0自...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/05.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">【青春游】成都+色达+新都桥+稻城亚丁双汽12日游</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/06.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">【青春游】成都+色达+新都桥+稻城亚丁双汽8日跟团游</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/07.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">【直通车】成都+都江堰+青城山巴士往返1日游含青...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/08.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">都江堰-青城山汽车1日游金牌导游，万人甄选，纯玩...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item mr_0">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/09.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">[中秋]成都+都江堰+青城山1日游净纯玩蜀都，0自...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <ul class="column-list-group clearfix">
                        <li class="first-item">
                            <i class="sale-icon"></i>
                            <a href="" class="img-area"><img src="{{ asset(HOME) }}/picture/s2.jpg" alt=""></a>
                            <div class="info-bar">
                                <a href="" class="tit">【青春游】成都+色达+新都桥+稻城亚双...</a>
                                <span class="pri"><span class="jg">&yen;<span class="num">10799.00</span></span>起</span>
                            </div>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/02.png" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">都江堰-成都大熊猫繁育基地汽车1日游牛人专线，...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/03.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">峨眉山-乐山双汽2日游</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item mr_0">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/04.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">[中秋]成都+都江堰+青城山1日游净纯玩蜀都，0自...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/05.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">【青春游】成都+色达+新都桥+稻城亚丁双汽12日游</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/06.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">【青春游】成都+色达+新都桥+稻城亚丁双汽8日跟团游</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/07.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">【直通车】成都+都江堰+青城山巴士往返1日游含青...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/08.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">都江堰-青城山汽车1日游金牌导游，万人甄选，纯玩...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item mr_0">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/09.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">[中秋]成都+都江堰+青城山1日游净纯玩蜀都，0自...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <ul class="column-list-group clearfix">
                        <li class="first-item">
                            <i class="sale-icon"></i>
                            <a href="" class="img-area"><img src="{{ asset(HOME) }}/picture/s3.jpg" alt=""></a>
                            <div class="info-bar">
                                <a href="" class="tit">【青春游】成都+色达+新都桥+稻城亚双...</a>
                                <span class="pri"><span class="jg">&yen;<span class="num">10799.00</span></span>起</span>
                            </div>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/02.png" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">都江堰-成都大熊猫繁育基地汽车1日游牛人专线，...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/03.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">峨眉山-乐山双汽2日游</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item mr_0">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/04.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">[中秋]成都+都江堰+青城山1日游净纯玩蜀都，0自...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/05.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">【青春游】成都+色达+新都桥+稻城亚丁双汽12日游</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/06.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">【青春游】成都+色达+新都桥+稻城亚丁双汽8日跟团游</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/07.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">【直通车】成都+都江堰+青城山巴士往返1日游含青...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/08.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">都江堰-青城山汽车1日游金牌导游，万人甄选，纯玩...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item mr_0">
                            <a href="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/09.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">[中秋]成都+都江堰+青城山1日游净纯玩蜀都，0自...</div>
                                    <div class="data-bar clearfix">
                                        <span class="myd">6688 次好评</span>
                                        <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    -->
                    </div>
                </div>
            </div>
            <!-- 当季优选 -->
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">找场地</span>
                    <a href="" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper clearfix">
                    <div class="col-side-area">
                        <div class="side-con">
                            <h4 class="type-bar">价位</h4>
                            <ul class="type-group">
                                <li><a href="" class="item">不限</a></li>
                                <li><a href="" class="item">150元以下</a></li>
                                <li><a href="" class="item">150-300元</a></li>
                                <li><a href="" class="item">300-450元</a></li>
                                <li><a href="" class="item">450-700元</a></li>
                                <li><a href="" class="item">1000元以上</a></li>
                            </ul>
                        </div>
                        <div class="side-banner">
                            <a href="" class=""><img src="{{ asset(HOME) }}/picture/68.jpg" alt="" class=""></a>
                        </div>
                    </div>
                    <div class="tab-box same-type-box fr">
                        <ul class="column-list-group clearfix">
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/10.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">德阳黑龙滩长岛天堂洲际酒...</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/11.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">德阳龙之梦瑞峰公寓酒店</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/12.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">德阳柳江古镇李家大院</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item mr_0">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/13.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">美客美家酒店</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/14.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">城市客栈(成都宽窄巷子店</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/15.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">德阳帝盛君豪酒店</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/16.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">尚锦翡翠大酒店(乐山大佛店)</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item mr_0">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/17.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">黑龙滩长岛天堂洲际酒</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 找场地 -->
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">主题团建</span>
                    <a href="" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper clearfix">
                    <div class="col-side-area">
                        <div class="side-con tj-info">
                            <h4 class="type-bar">主题团建</h4>
                            <ul class="type-group">
                                <li><a href="" class="item">温泉</a></li>
                                <li><a href="" class="item">游乐场</a></li>
                                <li><a href="" class="item">博物馆</a></li>
                                <li><a href="" class="item">水世界</a></li>
                                <li><a href="" class="item">演出</a></li>
                                <li><a href="" class="item">儿童乐园</a></li>
                                <li><a href="" class="item">漂流</a></li>
                                <li><a href="" class="item">赏花</a></li>
                            </ul>
                        </div>
                        <div class="side-banner">
                            <a href="" class=""><img src="{{ asset(HOME) }}/picture/69.jpg" alt="" class=""></a>
                        </div>
                    </div>
                    <div class="tab-box same-type-box fr">
                        <ul class="column-list-group clearfix">
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/22.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">北京欢乐谷</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/23.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">故宫</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/24.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">水立方</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item mr_0">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/25.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">鸟巢3D体育馆</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/26.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">圆明园</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/27.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">温泉</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/28.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">北京大观园</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="item mr_0">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/29.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">桃园仙谷</div>
                                        <div class="data-bar clearfix">
                                            <span class="myd">6688 次好评</span>
                                            <span class="pri"><span class="jg">&yen;<span class="num">99.00</span></span>起</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 主题团建 -->
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">客户反馈</span>
                    <a href="" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper clearfix">
                    <div class="col-side-area">
                        <div class="ship-banner">
                            <a href=""><img src="{{ asset(HOME) }}/picture/70.jpg" alt="" class=""></a>
                        </div>
                    </div>
                    <div class="tab-box ship-type-box fr">
                        <ul class="ship-list-group clearfix">
                            <li>
                                <a href="" class="name">皇家加勒比国际游轮</a>
                                <a href="" class="info-area">
                                    <div class="tit">10月预售，限量双成人立减500长江三峡景色美，...</div>
                                </a>
                            </li>
                            <li>
                                <a href="" class="name">公主游轮</a>
                                <a href="" class="info-area">
                                    <div class="tit">丰都鬼城+神农溪+三峡大坝【长海系列游轮—长江1号...</div>
                                </a>
                            </li>
                            <li>
                                <a href="" class="name">长江黄金系列邮轮</a>
                                <a href="" class="info-area">
                                    <div class="tit">长江三峡—目的地参团【黄金系列游轮—黄金7号周四...</div>
                                </a>
                            </li>
                            <li class="mr_0">
                                <a href="" class="name">世纪游轮</a>
                                <a href="" class="info-area">
                                    <div class="tit">品长江黄金游轮·赏三峡诗画风光·享典雅尊贵人生>长...</div>
                                </a>
                            </li>
                            <li>
                                <a href="" class="name">南海邮轮</a>
                                <a href="" class="info-area">
                                    <div class="tit">暑期2大1小，儿童不占床只要699 【免费升级到3楼+...</div>
                                </a>
                            </li>
                            <li>
                                <a href="" class="name">黄金邮轮</a>
                                <a href="" class="info-area">
                                    <div class="tit">与家人来一次触动灵魂的旅行【世纪天子号游轮】重...</div>
                                </a>
                            </li>
                            <li>
                                <a href="" class="name">丽星邮轮</a>
                                <a href="" class="info-area">
                                    <div class="tit">长江三峡景色美，风光使得游人醉【世纪系列豪华游...</div>
                                </a>
                            </li>
                            <li class="mr_0">
                                <a href="" class="name">皇家加勒比国际游轮</a>
                                <a href="" class="info-area">
                                    <div class="tit">【限量楼层升级】长江三峡4晚5日游 重庆-宜昌 豪华...</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 客户反馈 -->
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">拼团建</span>
                    <a href="" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper clearfix">
                    <ul class="tuan-list-group clearfix">
                        <li class="item load">
                            <a href="">
                                <div class="date">
                                    <input type="hidden" name="countDown" data-prefix="还有" data-suffix="" value="2020/01/01 00:00:00">
                                    <span></span><span class="time-end">活动结束</span>
                                </div>
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/38.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">[国庆]桂林-阳朔-大漓江-遇龙河-阿 什国际品牌酒店 西栅内客栈</div>
                                    <div class="data-bar clearfix">
                                        <span class="yhq">
                                            <span class="yj">原价<del>&yen;440.99</del></span>
                                            <span class="zk">6.85折</span>
                                        </span>
                                        <span class="pri"><span class="jg">&yen<span class="num">380.99</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item load">
                            <a href="">
                                <div class="date">
                                    <input type="hidden" name="countDown" data-prefix="还有" data-suffix="" value="2020/01/01 00:00:00">
                                    <span></span><span class="time-end">活动结束</span>
                                </div>
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/39.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">阳澄联合阳澄湖大闸蟹礼券 2988型公4.5两 母3.5两 4对</div>
                                    <div class="data-bar clearfix">
                                        <span class="yhq">
                                            <span class="yj">原价<del>&yen;440.99</del></span>
                                            <span class="zk">6.85折</span>
                                        </span>
                                        <span class="pri"><span class="jg">&yen<span class="num">220.09</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item load">
                            <a href="">
                                <div class="date">
                                    <input type="hidden" name="countDown" data-prefix="还有" data-suffix="" value="2020/01/01 00:00:00">
                                    <span></span><span class="time-end">活动结束</span>
                                </div>
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/40.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">臭豆腐 休闲零食 黑色油炸豆腐干蒜蓉味零食小吃120g</div>
                                    <div class="data-bar clearfix">
                                        <span class="yhq">
                                            <span class="yj">原价<del>&yen;440.99</del></span>
                                            <span class="zk">6.85折</span>
                                        </span>
                                        <span class="pri"><span class="jg">&yen<span class="num">32.99</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="item load mr_0">
                            <a href="">
                                <div class="date">
                                    <input type="hidden" name="countDown" data-prefix="还有" data-suffix="" value="2020/01/01 00:00:00">
                                    <span></span><span class="time-end">活动结束</span>
                                </div>
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/41.jpg" alt=""></div>
                                <div class="info-area">
                                    <div class="tit">【门票】成都大熊猫基地</div>
                                    <div class="data-bar clearfix">
                                        <span class="yhq">
                                            <span class="yj">原价<del>&yen;440.99</del></span>
                                            <span class="zk">6.85折</span>
                                        </span>
                                        <span class="pri"><span class="jg">&yen<span class="num">99.99</span></span>起</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">
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
            <!-- 拼团建 -->
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">合作伙伴</span>
                    <a href="" class="more-link">更多<i class="more-icon"></i></a>
                </div>
            </div>
            <div class="partner-container clearfix">
                <div class="c1 clearfix">
                    <div class="partner-img orange">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img white">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img orange">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img white">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img orange">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img white">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img orange">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img white">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img orange">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                </div>
                <div class="c2 clearfix">
                    <div class="partner-img white">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img orange">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img white">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-logo-img">
                        <img src="{{ asset(HOME) }}/picture/logo_partner.png"/>
                    </div>
                    <div class="partner-img white">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img orange">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img white">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                </div>
                <div class="c3 clearfix">
                    <div class="partner-img orange">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img white">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img orange">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img white">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img orange">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img white">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img orange">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img white">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
                    <div class="partner-img orange">
                        <img src="{{ asset(HOME) }}/picture/baidu.png"/>
                    </div>
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
                    <a href="" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper clearfix">
                    <div class="tab-box other-type-box">
                        <div class="qf-first-item">
                            <a href="#">
                                <div class="img-area">
                                    <img src="{{ asset(HOME) }}/picture/1111.jpg" alt="">
                                </div>
                                <div class="info-area">
                                    <div class="tit-al">肉干肉脯休闲零食特产小吃靖江风味猪肉脯自然片</div>

                                </div>
                            </a>
                        </div>
                        <ul class="column-list-group sec-items clearfix">
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/48.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">肉干肉脯休闲零食特产小吃靖江风味猪肉脯自然片</div>

                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/49.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">鱼豆腐170g 原味烧烤味豆腐香辣味特产风味零食 </div>

                                    </div>
                                </a>
                            </li>
                            <li class="item mr_0">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/50.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">黄山烧饼梅干菜酥饼</div>

                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/48.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">肉干肉脯休闲零食特产小吃靖江风味猪肉脯自然片</div>

                                    </div>
                                </a>
                            </li>
                            <li class="item">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/49.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">鱼豆腐170g 原味烧烤味豆腐香辣味特产风味零食 </div>

                                    </div>
                                </a>
                            </li>
                            <li class="item mr_0">
                                <a href="">
                                    <div class="img-area"><img src="{{ asset(HOME) }}/picture/50.jpg" alt=""></div>
                                    <div class="info-area">
                                        <div class="tit-al">黄山烧饼梅干菜酥饼</div>

                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 未来企服 -->

            <div class="column-container cus-show">
                <div class="column-bar">
                    <span class="col-title">个人拼团出游</span>
                    <a href="" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper bd clearfix">
                    <ul class="jieban-list-group clearfix">
                        <li>
                            <a href="" class="">

                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/56.jpg" alt="" class=""></div>
                                <div class="info-area">
                                    <h4 class="tit">乌鲁木齐+布尔津+喀纳斯+克拉玛依+伊宁市+那拉提+巴音布鲁克...</h4>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="">

                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/56.jpg" alt="" class=""></div>
                                <div class="info-area">
                                    <h4 class="tit">乌鲁木齐+布尔津+喀纳斯+克拉玛依+伊宁市+那拉提+巴音布鲁克...</h4>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="">

                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/56.jpg" alt="" class=""></div>
                                <div class="info-area">
                                    <h4 class="tit">乌鲁木齐+布尔津+喀纳斯+克拉玛依+伊宁市+那拉提+巴音布鲁克...</h4>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="">

                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/56.jpg" alt="" class=""></div>
                                <div class="info-area">
                                    <h4 class="tit">乌鲁木齐+布尔津+喀纳斯+克拉玛依+伊宁市+那拉提+巴音布鲁克...</h4>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="">
                                <div class="img-area"><img src="{{ asset(HOME) }}/picture/59.jpg" alt="" class=""></div>
                                <div class="info-area">
                                    <h4 class="tit">华东五市-苏州园林-杭州-乌镇双飞6日游</h4>

                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- 个人拼团出游 -->
            <div class="column-container">
                <div class="column-bar">
                    <span class="col-title">自驾游路线推荐</span>
                    <a href="" class="more-link">更多<i class="more-icon"></i></a>
                </div>
                <div class="column-wrapper clearfix">
                    <div class="tab-box">
                        <ul class="strategy-list-group clearfix">
                            <li>
                                <a href="">
                                    <div class="img-area">
                                        <img src="{{ asset(HOME) }}/picture/64.jpg" alt="">
                                        <span class="date">2018-8-31</span>
                                    </div>
                                    <div class="info-area">
                                        <h4 class="tit">巴厘岛购物别犯愁，一篇攻略搞定各类人群，合理安排一天的购物...</h4>
                                        <div class="line-bar"></div>
                                        <div class="txt">来到巴厘岛除了在度假酒店享受惬意的时光，在蓝梦岛，金巴兰海滩打卡拍...</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <div class="img-area">
                                        <img src="{{ asset(HOME) }}/picture/65.jpg" alt="">
                                        <span class="date">2018-8-31</span>
                                    </div>
                                    <div class="info-area">
                                        <h4 class="tit">巴厘岛购物别犯愁，一篇攻略搞定各类人群，合理安排一天的购物...</h4>
                                        <div class="line-bar"></div>
                                        <div class="txt">来到巴厘岛除了在度假酒店享受惬意的时光，在蓝梦岛，金巴兰海滩打卡拍...</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <div class="img-area">
                                        <img src="{{ asset(HOME) }}/picture/66.jpg" alt="">
                                        <span class="date">2018-8-31</span>
                                    </div>
                                    <div class="info-area">
                                        <h4 class="tit">巴厘岛购物别犯愁，一篇攻略搞定各类人群，合理安排一天的购物...</h4>
                                        <div class="line-bar"></div>
                                        <div class="txt">来到巴厘岛除了在度假酒店享受惬意的时光，在蓝梦岛，金巴兰海滩打卡拍...</div>
                                    </div>
                                </a>
                            </li>
                            <li class="mr_0">
                                <a href="">
                                    <div class="img-area">
                                        <img src="{{ asset(HOME) }}/picture/67.png" alt="">
                                        <span class="date">2018-8-31</span>
                                    </div>
                                    <div class="info-area">
                                        <h4 class="tit">巴厘岛购物别犯愁，一篇攻略搞定各类人群，合理安排一天的购物...</h4>
                                        <div class="line-bar"></div>
                                        <div class="txt">来到巴厘岛除了在度假酒店享受惬意的时光，在蓝梦岛，金巴兰海滩打卡拍...</div>
                                    </div>
                                </a>
                            </li>
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