<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="{{ asset(ADMIN) }}/css/font.css">
    <link rel="stylesheet" href="{{ asset(ADMIN) }}/css/xadmin.css">

    @yield('resources')

</head>
<body class="index" onload="setBg()">
<!-- 顶部开始 -->
<div class="container">
    <div class="logo">
        <a href="/"></a>
    </div>
    <div class="left_open">
        <a><i title="展开左侧栏" class="iconfont">&#xec1e;</i></a>
    </div>
    <div class="left_menu ">
        <a href="/" target="_blank"><i title="前端" class="iconfont">&#xe68a;</i></a>
    </div>
    <div class="left_menu">
        <a href="javascript:;" class="refreshThis" id="refresh"><i title="刷新" class="iconfont">&#xe673;</i></a>
    </div>

    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">&nbsp;</a>
        </li>
    </ul>
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;" onclick="showChangeBackground()" class="iconfont font-lg layui-icon" >&#xe66a;</a>
        </li>
{{--        <li class="layui-nav-item to-index">--}}
{{--            <a href="javascript:;" class="iconfont" title="消息"  >&#xe610;</a>--}}
{{--        </li>--}}
        <li class="layui-nav-item to-index">
            <a href="/" target="_blank" class="iconfont layui-icon" title="前端"  >&#xe68e;</a>
        </li>
        <li class="layui-nav-item to-index">
            <a href="javascript:;"  > <i class="iconfont layui-icon" >&#xe716;</i></a>
            <dl class="layui-nav-child">
                <!-- 二级菜单 -->
                <dd>
                    <a  href="/">打开前台</a></dd>
                <dd>
                    <a onclick="xadmin.add_tab('修改密码','{{ route('admin.editPass') }}')">修改密码</a></dd>
                <dd>
                    <a href="{{route('admin.outLogin')}}">退出</a></dd>
            </dl>
        </li>
    </ul>

</div>
<!-- 顶部结束 -->
<!-- 中部开始 -->
<!-- 左侧菜单开始 -->
@include('admin.layout.left')
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->
<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="true">
        <ul class="layui-tab-title" id="iframe_nums">
            <li class="home">
                <i class="layui-icon">&#xe68e;</i>
            </li>

        </ul>
        <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
            <dl>
                <dd data-type="this">关闭当前</dd>
                <dd data-type="other">关闭其它</dd>
                <dd data-type="all">关闭全部</dd>
            </dl>
        </div>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='{{ route('admin.home') }}' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
        </div>
        <div id="tab_show"></div>
    </div>
</div>
<div class="page-content-bg"></div>
<style id="theme_style"></style>
<!-- 右侧主体结束 -->
<!-- 中部结束 -->

<style>
    #showRight {
        overflow: hidden;
        border-radius: 5px 0px 0px 5px;
        box-shadow: 0px 0px 8px #afadad;
        width: 0px;
        height: 100%;
        position: absolute;
        right: 0px;
        top: 0px;
        z-index: 99999;
        background: rgba(255, 255, 255, 1);
    }

    .show_header {
        width: 100%;
        height: 40px;
        line-height: 40px;
        padding: 5px;
        background: #e6e6e6;
    }

    .close_show {
        width: 20px;
        height: 40px;
        float: left;
        display: inline-block;
        cursor: pointer
    }

    .show_title {
        width: 80%;
        height: 40px;
        text-align: center
    }
    .show_box{ top:0px;position: fixed;width: 0%;height: 100%;background: rgba(0,0,0,0.7);z-index: 999;}
    .color-box{height: 80px;border-radius: 5px;margin-bottom: 10px}
    .color-box .layui-card-header{margin-top: 22px;border-bottom:0px; display: inline-block;}
</style>
<!--右侧颜色板-->
<div id="showRight">
    <div class="show_header">
        <div class="iconfont close_show" onclick="closeBackground()">&#xec19;</div>
        <div class="show_title">自定义主题</div>
    </div>

    <div class="show_body layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-sm12 layui-col-md12">
                <div class="color-box">
                    <div class="layui-card-header">
                        <span>顶部菜单：</span>
                        <div id="topMenu"></div>
                    </div>
                </div>
                <div  class="color-box">
                    <div class="layui-card-header">
                        <span>左部菜单：</span>
                        <div id="leftMenu"></div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="show_box"></div>
</div>
<!--右侧颜色板结束-->
</body>
<script src="{{ asset(ADMIN) }}/js/jquery.min.js"></script>
<script src="{{ asset(ADMIN) }}/lib/layui/layui.js" charset="utf-8"></script>
<script src="{{ asset(ADMIN) }}/js/xadmin.js"></script>

<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
<script src="{{ asset(ADMIN) }}/js/html5.min.js"></script>
<script src="{{ asset(ADMIN) }}/js/respond.min.js"></script>
<![endif]-->

<script>
    function setBg() {
        var color = getCookie('left_bg');
        $(".left-nav").attr('style','background:'+color+"!important")
        console.log(color)
    }
    // 是否开启刷新记忆tab功能
    // var is_remember = false;
    $(function () {
        var color = getCookie('left_bg');
        $(".left-nav").attr('style','background:'+color+"!important")
    })
</script>
</html>
