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
                        <a onclick="xadmin.add_tab('配置管理','{{ route('admin.config.index') }}')">
                            <i class="iconfont">&#xec18;</i>
                            <cite>系统配置</cite></a>
                    </li>

                    <li>
                        <a onclick="xadmin.add_tab('配置设置','{{ route('admin.config.config') }}')">
                            <i class="iconfont">&#xec18;</i>
                            <cite>配置设置</cite></a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li layui-icon" lay-tips="产品管理">&#xe857;</i>
                    <cite>产品管理</cite>
                    <i class="iconfont nav_right">&#xec17;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('产品分类','{{ route('admin.goods_category.index') }}')">
                            <i class="iconfont">&#xec18;</i>
                            <cite>产品分类</cite></a>
                    </li>

                    <li>
                        <a onclick="xadmin.add_tab('产品管理','{{ route('admin.goods.index') }}')">
                            <i class="iconfont">&#xec18;</i>
                            <cite>产品管理</cite></a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li layui-icon" lay-tips="其他管理">&#xe705;</i>
                    <cite>其他管理</cite>
                    <i class="iconfont nav_right">&#xec17;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('相册管理','{{ route('admin.picture.index') }}')">
                            <i class="iconfont">&#xec18;</i>
                            <cite>相册管理</cite></a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
</div>
