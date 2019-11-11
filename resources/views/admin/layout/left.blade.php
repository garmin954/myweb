<div class="left-nav">
    <div class="logo" style="width: 100%;height: 45px!important;line-height: 45px!important;
  text-align: center;color: white;    border-bottom: 1px solid rgba(0, 0, 0, 0.18);">YuanLu</div>
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="系统管理">&#xe87f;</i>
                    <cite>系统管理</cite>
                    <i class="iconfont nav_right">&#xec17;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('配置类型','{{ route('admin.config_type.index') }}')">
                            <i class="iconfont">&#xec18;</i>
                            <cite>配置类型</cite></a>
                    </li>

                    <li>
                        <a onclick="xadmin.add_tab('系统配置','{{ route('admin.config.index') }}')">
                            <i class="iconfont">&#xec18;</i>
                            <cite>系统配置</cite></a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="会员管理">&#xe87f;</i>
                    <cite>会员管理</cite>
                    <i class="iconfont nav_right">&#xec17;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('统计页面','welcome1.html')">
                            <i class="iconfont">&#xec18;</i>
                            <cite>统计页面</cite></a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe70b;</i>
                            <cite>会员管理</cite>
                            <i class="iconfont nav_right">&#xec17;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('会员删除','member-del.html')">
                                    <i class="iconfont">&#xec18;</i>
                                    <cite>会员删除</cite></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="图标字体">&#xe7b1;</i>
                    <cite>图标字体</cite>
                    <i class="iconfont nav_right">&#xec17;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('图标对应字体','unicode.html')">
                            <i class="iconfont">&#xec18;</i>
                            <cite>图标对应字体</cite></a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
