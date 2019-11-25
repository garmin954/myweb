<div class="header-top">
    <div class="wm-1200">
        <div class="notice-msg clearfix">
            欢迎访问我的网站，电话：139-0316-6318
        </div>
        <!-- 网站公告 -->
        <ul class="top-msg-group">
            <li class="nav-item has-down">
                <span class="top-wechat-icon"></span>
                <div class="dropdown-panel">
                    <div class="top-qr-code">
                        <img src="{{ asset(HOME) }}/picture/ewm.jpg" alt="">
                    </div>
                </div>
            </li>
        </ul>
        <!-- 信息提示 -->
    </div>
</div>
<!-- 顶部信息栏 -->
<div class="header-search">
    <div class="wm-1200">
        <div class="header-logo">
            <a href="/"><img src="{{ asset(HOME) }}/picture/logo.png" alt=""></a>
        </div>
        <!-- logo -->
        <div class="header-contact">
            <div class="tit">客户服务电话<i class="arrow-icon"></i></div>
            <div class="num">139-0316-6318</div>
            <div class="more-box">
                <span class="item">139-0316-6318</span>
                <span class="item">139-0316-6318</span>
            </div>
        </div>
        <!-- 联系方式 -->
    </div>
</div>
<!-- 顶部搜索 -->
<div class="header-nav">
    <div class="wm-1200">
        <!-- PC端导航 -->
        <div class="header-menu">
            <ul class="menu-group clearfix">
                <li class="active"><a href="/">首页</a></li>
                <li>
                    <a href="{{ route('group') }}">团建产品</a>
                </li>
                <li>
                    <a href="list-5.html">团建攻略</a>
                </li>
                <li>
                    <a href="list-7.html">拼团建</a>
                </li>
                <li>
                    <a href="list-4.html">合作伙伴</a>
                </li>
                <li>
                    <a href="list-2.html">未来企服</a>
                </li>
                <li>
                    <a href="list-3.html">关于我们</a>
                </li>
            </ul>
        </div>
        <!-- 移动端导航 -->
        <div class="header-menu-m">
            <p class="p-1">
                <img src="{{ asset(HOME) }}/picture/logo-1.png" />
            </p>
            <p class="p-2">
                <img src="{{ asset(HOME) }}/images/icon.png" />
            </p>
            <div class="header-menu-m-list">
                <ul class="clearfix">
                    <li>
                        <a href="/">首页</a>
                    </li>
                    <li class="nav-break">
                        |
                    </li>
                    <li>
                        <a href="list-6.html">团建产品</a>
                    </li>
                    <li class="nav-break">
                        |
                    </li>
                    <li>
                        <a href="list-5.html">团建攻略</a>
                    </li>
                    <li>
                        <a href="list-7.html">拼团建</a>
                    </li>
                    <li class="nav-break">
                        |
                    </li>
                    <li>
                        <a href="list-4.html">合作伙伴</a>
                    </li>
                    <li class="nav-break">
                        |
                    </li>
                    <li>
                        <a href="list-2.html">未来企服</a>
                    </li>
                    <li>
                        <a href="list-3.html">关于我们</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.header-menu-m .p-2 img').click(function(){
        $('.header-menu-m-list').toggle();
    });
</script>
