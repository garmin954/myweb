<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="{{ asset(ADMIN) }}/css/font.css">
    <link rel="stylesheet" href="{{ asset(ADMIN) }}/css/xadmin.css">
    <meta name="_token" content="{{ csrf_token() }}"/>
    @yield('resources')
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        @section('container')

        @show
    </div>
</div>
</div>

</body>
<script type="text/javascript" src="{{ asset(ADMIN) }}/js/jquery.min.js"></script>
<script src="{{ asset(ADMIN) }}/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="{{ asset(ADMIN) }}/js/xadmin.js"></script>
<script type="text/javascript" src="{{ asset(ADMIN) }}/js/yuanlu.js"></script>
<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
<script src="{{ asset(ADMIN) }}/js/html5.min.js"></script>
<script src="{{ asset(ADMIN) }}/js/respond.min.js"></script>
<![endif]-->
@yield('scripts')

</html>
