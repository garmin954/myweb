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

    <link type="text/css" rel="stylesheet" href="{{ asset(HOME)}}/css/list-con.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset(HOME)}}/css/animate.css" />
    <style>
        .recommend-wrap{top: 0px}
        .loading{
            display: none;
            width: 80px;
            height: 40px;
            margin: 0 auto;
            margin-top:100px;
            margin-bottom:100px;
        }
        .loading span{
            display: inline-block;
            width: 8px;
            height: 100%;
            border-radius: 4px;
            background: lightgreen;
            -webkit-animation: load 1s ease infinite;
            animation: load 1s ease infinite;
        }
        @-webkit-keyframes load{
            0%,100%{
                height: 40px;
                background: lightgreen;
            }
            50%{
                height: 70px;
                margin: -15px 0;
                background: lightblue;
            }
        }
        .loading span:nth-child(2){
            -webkit-animation-delay:0.2s;
            animation-delay:0.2s;
        }
        .loading span:nth-child(3){
            -webkit-animation-delay:0.4s;
            animation-delay:0.4s;
        }
        .loading span:nth-child(4){
            -webkit-animation-delay:0.6s;
            animation-delay:0.6s;
        }
        .loading span:nth-child(5){
            -webkit-animation-delay:0.8s;
            animation-delay:0.8s;
        }

        ul.pagination {display: inline-block;padding: 0;margin: 0;}
        .pagination a{text-decoration: none;margin-right: 0px!important; }
        ul.pagination li {display: inline;}
        .disabled ,.pagination  .active, .pagination li a {color: black; float: left;padding: 8px 16px;text-decoration: none;transition: background-color .3s;border: 1px solid #ddd; margin: 0 4px;}
        .pagination .active{background-color: #4CAF50;color: white;border: 1px solid #4CAF50;}
        .disabled{background-color: rgba(236, 236, 236, 0.78);}
        ul.pagination  a.active {background-color: #4CAF50;color: white;border: 1px solid #4CAF50;}
        ul.pagination li a:hover:not(.active) {background-color: #ddd;}
    </style>
@endsection

@section('container')

    <div class="container" >
        <section class="content" id="appa">
            <div class="product">
                <div class="detail-empty-space">
                </div>
                <header class="product-filter-conent wow fadeInUp">

                    @foreach($cate_list as $key=>$cate)
                        <div class="inner-product-filter product-filter-item">
                            <span class="inner-product-filter-sider">
                                {{$cate['label']}}
                            </span>
                            <div class="top-cate inner-product-filter-items inner-product-filter-items-fold drop-items-{{$key}}">
                                <ul class="drop-list-items-{{$key}}">
                                    <li class="inner-product-filter-tabs-sel"  data-pid="{{$cate['value']}}" data-id="0">
                                        不限
                                    </li>
                                    @foreach($cate['children'] as $second)
                                        <li data-pid="{{$cate['value']}}" data-id="{{$second['value']}}">
                                            {{$second['label']}}
                                        </li>
                                    @endforeach

                                </ul>
                                <div id="show-more-{{$key}}">
                                </div>
                            </div>
                            @foreach($cate['children'] as $second)
                                <div id="tj-son" style="display: none" class="children-item-{{$cate['value']}} children-item-{{$cate['value']}}-{{$second['value']}} children-cate inner-product-filter-items inner-product-filter-items-fold drop-items1">
                                    <ul id="tj-son-list" class="drop-list-items1 sub-item-{{$second['value']}}">

                                        @if(isset($second['children']))
                                            <li class="inner-product-filter-items-sel-sub">
                                                不限
                                            </li>
                                            @foreach($second['children'] as $third)
                                                <li data-id="{{$third['value']}}">
                                                    {{$third['label']}}
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <div id="show-more1">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <script type="text/javascript">
                            $(function() {
                                var list = $('#tj-son-list').find('li');
                                if (list.length > 1) {
                                    $('#tj-son').show();
                                } else {
                                    $('#tj-son').hide();
                                }

                                var slideHeight = 40; // px
                                var defHeight = $('.drop-list-items-{{$key}}').height();
                                if (defHeight > slideHeight) {
                                    $('.drop-items-{{$key}}').css('height', slideHeight + 'px');
                                    $('#show-more-{{$key}}').append('<span class="inner-product-filter-more">展示更多</span>');
                                    $('#show-more-{{$key}} span').click(function() {
                                        var curHeight = $('.drop-items-{{$key}}').height();
                                        if (curHeight == slideHeight) {
                                            $('.drop-items-{{$key}}').animate({
                                                    height: defHeight
                                                },
                                                "normal");
                                            $('#show-more-{{$key}} span').html('收起');
                                        } else {
                                            $('.drop-items-{{$key}}').animate({
                                                    height: slideHeight
                                                },
                                                "normal");
                                            $('#show-more-{{$key}} span').html('展示更多');
                                        }
                                        return false;
                                    });
                                }
                            });
                        </script>
                    @endforeach
                </header>
                <section class="product-list wow fadeInUp">
                    <div class="inner-product-list product-list-content">
                        <div class="loading">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="item-list">

                        </div>

                        <div class="page" style="text-align: center;margin-top: 35px">
                            <input type="hidden" id="page" value="1">
                            <input type="hidden" id="limit" value="8">
                            <ul class="pagination">

                            </ul>
                        </div>
                    </div>

                    <div class="recommend-wrap">
                        <div class="product-detail">
                            <h4 class="recommend-title">
                                相关推荐
                            </h4>
                            <div class="thumbnail">
                                <a href="article-1.html">
                                    <div class="size-control s-4-3">
                                        <img class="size-control-item card-img-top" src="https://iproduct.damaotuanjian.com/PRODUCT/60ABA2E5-F9B4-90B7-37D9-48FB07B28444-s1"
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
                </section>
            </div>
        </section>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        let page = $("#page").val();
        let limit =  $("#limit").val();

        $(function () {
            Object.keys($(".top-cate ul li")).forEach((key)=>{
                if(!isNaN(parseInt(key))){
                    $(".top-cate ul li")[key].addEventListener('click', function () {
                        let id = $(this).attr('data-id');
                        let pid = $(this).attr('data-pid');
                        $(this).siblings().removeClass('inner-product-filter-tabs-sel');
                        $(this).addClass('inner-product-filter-tabs-sel');
                        $(".children-item-"+pid).hide();
                        $(".children-item-"+pid+'-'+id).show()
                        console.log($('.sub-item-' + id));
                        $('.sub-item-'+id).children().removeClass('inner-product-filter-items-sel-sub')
                        $('.sub-item-'+id).children().first().addClass('inner-product-filter-items-sel-sub')

                        console.log(pid);
                        console.log(id);
                        if(id == 0){
                            $(".children-item-"+pid).hide();
                        }
                        selectCate(page, limit);
                    })
                }

            });

            Object.keys($(".children-cate ul li")).forEach((key)=>{
                if(!isNaN(parseInt(key))){
                    $(".children-cate ul li")[key].addEventListener('click', function () {
                        $(this).siblings().removeClass('inner-product-filter-items-sel-sub');
                        $(this).addClass('inner-product-filter-items-sel-sub');
                        let id = $(this).attr('data-id');

                        selectCate(page, limit);
                    })
                }

            });

            selectCate(page, limit);
        })

        function selectCate(page= 1, limit= 8) {
            $('.loading').show();
            let seconds = [];
            let first = [];
            Object.keys($(".top-cate ul li")).forEach((key)=>{
                if(!isNaN(parseInt(key))){
                    if($(".top-cate ul li")[key].getAttribute('class')){
                        let id = $(".top-cate ul li")[key].getAttribute('data-id');
                        if(id && id !=0){
                            first.push(id);
                        }
                    }
                }
            });

            Object.keys($(".children-cate ul li")).forEach((key)=>{
                if(!isNaN(parseInt(key))){
                    if($(".children-cate ul li")[key].getAttribute('class')){
                        let id = $(".children-cate ul li")[key].getAttribute('data-id');
                        if(id){
                            seconds.push(id);
                        }
                    }
                }
            });
            // console.log(first);
            // console.log(seconds);

            let params = {
                first:first.toString(),
                seconds:seconds.toString(),
                page: page,
                limit: limit,
            }
            axios.post("{{ route('goods.searchGoods') }}", params).then(respond=>{
                let res = respond.data;
                if(res.code > 0){

                    if(res.data.length > 0){
                        let html = '';
                        res.data.forEach(item=>{
                            html += `
                            <a href="{{route('goodsInfo')}}?id=`+item.goods_id+`" target="_blank" class="">
                                <div class="inner-product-list-item">
                                    <div class="inner-product-list-item-img">
                                        <img alt="" src=" `+item.goods_thumb+`">
                                    </div>
                                    <div class="inner-product-list-item-title">
                                        `+item.goods_name+`
                                    </div>
                                    <div class="inner-product-list-item-tags">`;
                                    let cate3 = item['cate'][{{ CATE_3 }}];
                                    if (cate3 != undefined){
                                        cate3.forEach((item)=>{
                                            html +=`<span> `+item.category_name+` </span>`
                                        });
                                    }
                                    html +=`</div>
                                    <div class="inner-product-list-item-type">`;
                                        let cate2 = item['cate'][{{ CATE_2 }}];
                                    if (cate2 != undefined){
                                            cate2.forEach((item)=>{
                                                html += ``+item.category_name+` | `
                                            });
                                        }
                                    let cate4 = item['cate'][{{ CATE_4 }}];
                                    if (cate4 != undefined){
                                        cate4.forEach((item)=>{
                                            html += ``+item.category_name+` | `
                                        });
                                    }

                                    if (item.nums){
                                        html += item.nums+` 人 `;
                                    }
                                    html +=`</div>
                                    <div class="inner-product-list-item-destination">
                                            <span>`;
                                                let cate1 = item['cate'][{{ CATE_1 }}];
                                                if (cate1 != undefined){
                                                    cate1.forEach((item)=>{
                                                        html += ``+item.category_name+``
                                                    });
                                                }
                                    html += `</span>
                                    </div>
                                    <div class="inner-product-list-item-price">
                                            <span>
                                                `+item.price+`
                                            </span>
                                    </div>
                                    <div class="inner-product-list-item-priceBooking">
                                            <span>
                                               `+item.avg+`人均价
                                            </span>
                                    </div>
                                </div>
                            </a>
                            `;
                        })
                        $('.item-list').html(html)

                    }else{
                        $('.item-list').html(`
                            <p style="text-align: center;font-size: 1.5rem;margin-top: 50px;">没有数据~~~</p>
                        `)
                    }

                    let pageCount = Math.round(res.count / res.limit);
                    console.log(pageCount);
                    let prev = next = 0;
                    if(res.page <= 1){
                        prev = 1;
                    }else{
                        prev = res.page-1;
                    }

                    if(res.page >= pageCount){
                        next = pageCount;
                    }else{
                        next = parseInt(res.page)+1;
                    }
                    let phtml = `
                            <li><a href="javascript:;" onclick="selectCate('`+prev+`')">上一页</a></li>
                            `;
                    for(var i=1; i <= pageCount; i++){
                        phtml += `<li><a `;
                        if(i == page){
                            phtml += ` class='active' `;
                        }
                        phtml += ` href="javascript:;" onclick="selectCate('`+i+`')">`+i+`</a></li>`;
                    }


                    phtml += `<li><a href="javascript:;" onclick="selectCate('`+next+`')">下一页</a></li>
                    `;

                    if (pageCount <= 0){
                        phtml = '';
                    }

                    // 分页
                    $('.pagination').html(phtml);

                    $('.loading').hide();

                }else{

                }
            }).catch(e=>{

            });
        }

    </script>


@endsection
