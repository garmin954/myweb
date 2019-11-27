
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hydrogen &mdash; A free HTML5 Template </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />



    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset(VENDOR) }}/jQuery-pbl/css/animate.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset(VENDOR) }}/jQuery-pbl/css/magnific-popup.css">
    <!-- Salvattore -->
    <link rel="stylesheet" href="{{ asset(VENDOR) }}/jQuery-pbl/css/salvattore.css">
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset(VENDOR) }}/jQuery-pbl/css/style.css">
    <!-- Modernizr JS -->
    <script src="{{ asset(VENDOR) }}/jQuery-pbl/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{ asset(VENDOR) }}/jQuery-pbl/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>


<style>
    .yl-del{border-radius: 0px 4px;right: 0px;position: absolute;top: 0px;font-size: 12px;background: #7088fb;color: white;padding: 0px 5px;text-decoration: none;}
    .yl-del:hover{text-decoration: none;color: white;background: #6dccfb;}
    .yl-del:focus{text-decoration: none;color: white;background: #6dccfb;}
</style>



<div id="fh5co-main">
    <div class="container">

        <div class="row">

            <div id="fh5co-board" data-columns>
                @foreach($list as $image)
                <div class="item">
                    <div class="animate-box">
                        <a href="{{$image}}" class="image-popup fh5co-board-img" title="{{$image}}">
                            <img src="{{$image}}" alt="{{$image}}"></a>
                        <a class="yl-del" href="javascript:;" onclick="delImage(this)"> 删除 </a>

                    </div>
                    <!--<div class="fh5co-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, eos?</div>-->
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="{{ asset(VENDOR) }}/jQuery-pbl/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="{{ asset(VENDOR) }}/jQuery-pbl/js/jquery.waypoints.min.js"></script>
<!-- Magnific Popup -->
<script src="{{ asset(VENDOR) }}/jQuery-pbl/js/jquery.magnific-popup.min.js"></script>
<!-- Salvattore -->
<script src="{{ asset(VENDOR) }}/jQuery-pbl/js/salvattore.min.js"></script>
<!-- Main JS -->
<script src="{{ asset(VENDOR) }}/jQuery-pbl/js/main.js"></script>

<script src="https://cdn.bootcss.com/layer/3.0.3/layer.min.js"></script>
<script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.js"></script>


<script>

    window.show = 0;
    function delImage(obj) {

        var path = $(obj).siblings().attr('href');
        var str="<p style='width: 230px;text-align: center;margin: 16px;'>确认删除这张图片</p>" +
            "<form id='images'><lable style='margin-left: 87px;'>\n" +
            "    <input type=\"hidden\" name='path' value=\""+path+"\" > " +
            "    <input type=\"checkbox\" name='show' value=\"1\" > 不再询问" +
            "</lable></form>";

        if (show == 0) {
            layer.open({
                type: 1,
                skin: 'layui-layer-demo', //样式类名
                closeBtn: 0, //不显示关闭按钮
                anim: 2,
                btn:['确认','取消'],
                btnAlign:'c',
                shadeClose: true, //开启遮罩关闭
                content: str,
                yes:function () {
                    console.log(show);
                    axios.post("{{ route('admin.picture.delImage') }}", $("#images").serialize()).then(respond=>{
                        let res = respond.data;
                        if(res.code > 0){
                            $(obj).parent().parent().remove()
                            show = res.show;
                            layer.msg(res.msg, {icon: 1})
                            layer.closeAll()

                        } else{
                            layer.msg(res.msg, {icon: 2})
                        }
                    }).catch(e=>{
                        layer.msg('异常'+e);
                    })
                }
            });
        } else {

            $.post("{:url('images/delImage')}", {path:path}, function (data) {
                if (data.status) {

                    $(obj).parent().parent().remove()
                    layer.msg(data.msg, {icon: 1})
                    layer.closeAll()
                } else {
                    layer.msg(data.msg, {icon: 2})
                }
            })
        }
    }
</script>

</body>
</html>
