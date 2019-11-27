<!doctype html>
<html  class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>Yuan-Lu</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{asset(ADMIN)}}/css/font.css">
    <link rel="stylesheet" href="{{asset(ADMIN)}}/css/login.css">
    <link rel="stylesheet" href="{{asset(ADMIN)}}/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset(ADMIN)}}/lib/layui/layui.js" charset="utf-8"></script>
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">

<div class="login layui-anim layui-anim-up">
    <div class="message">管理登录</div>
    <div id="darkbannerwrap"></div>

    <form method="post" class="layui-form" >
        <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">

        <input name="captcha" lay-verify="required" placeholder="验证码"  type="text" style="width: 60%;float:left;display: block" class="layui-input">
        <div style="width: 35%;margin-left: 5%;float: right;height: 50px">
            <img src="{{captcha_src()}}" alt="验证码"
                 onclick="this.src='{{captcha_src()}}'+Math.random()" style="width: 100%;height: 100%">
        </div>
        <hr class="hr15">

        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
    </form>
</div>
<script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.js"></script>

<script>

    $(function  () {
        layui.use('form', function(){
            var form = layui.form;
            // layer.msg('玩命卖萌中', function(){
            //   //关闭后的操作
            //   });
            //监听提交
            form.on('submit(login)', function(data){
                // alert(888)

                axios.post("{{route('admin.login')}}", data.field).then(res=>{
                    if(res.data.code > 0){
                        layer.msg(res.data.msg, {icon:1, shade:0.5, anim:6})
                        setTimeout(function () {
                            window.location.href = "{{ route('admin.home') }}";
                        }, 2000)
                    }else{
                        layer.msg(res.data.msg, {icon:2, shade:0.5, anim:6})
                    }
                }).catch(e=>{
                    layer.msg('异常'+ e)
                })
                return false;
            });
        });
    })
</script>
<!-- 底部结束 -->

</body>
</html>
