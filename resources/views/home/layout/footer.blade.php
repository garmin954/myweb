<div class="st-help clear">
    <img src="{{ asset(HOME) }}/images/footer.jpg" width="100%"/>
</div>
<div class="st-link">
    <div class="wm-1200">
        <div class="st-link-list clearfix">
            <strong>友情链接：</strong>
            <div class="child">
                @foreach($friend_list as $fres)
                 <a href="{{$fres['link']}}">{{$fres['adv_name']}}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="st-footer">
    <div class="wm-1200">
        <div class="st-foot-edit">
            <p>{{$config['web_name']}} {{$config['gs_desc']}}</p>
        </div>
    </div>
</div>
<div class="footer footernav visible-xs">
    <a href="/">
                <span class="glyphicon glyphicon-home">
                </span>
        <br>
        首页
    </a>
    <a href="tel:13903166318">
                <span class="glyphicon glyphicon-phone">
                </span>
        <br>
        手机
    </a>
    <a href="sms:13903166318">
                <span class="glyphicon glyphicon-comment">
                </span>
        <br>
        短信
    </a>
    <a href="#">
                <span class="glyphicon glyphicon-circle-arrow-up">
                </span>
        <br>
        顶部
    </a>
</div>

