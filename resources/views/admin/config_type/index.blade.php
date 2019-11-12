@extends('admin.layout.base')

@section('title')
    @endsection

@section('container')
    <div class="layui-col-md12">
        <div class="layui-card">
            <div class="layui-card-body ">
            </div>
            <div class="layui-card-header">
                    <button class="layui-btn" onclick="xadmin.open('添加配置','{{ route('admin.config_type.create') }}',600 )"><i class="layui-icon"></i>添加</button>
            </div>
            <div class="layui-card-body layui-table-body layui-table-main">

                <table class="layui-hide" id="test" lay-filter="test"></table>

                <script type="text/html" id="toolbarDemo">
                    <div class="layui-btn-container">
                        <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>
                        <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
                        <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>
                    </div>
                </script>
                <script type="text/html" id="barDemo">
                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                </script>
                
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        layui.use('table', function(){
            var table = layui.table;

            table.render({
                elem: '#test'
                ,url:'/test/table/demo1.json'
                ,toolbar: '#toolbarDemo'
                ,title: '用户数据表'
                ,totalRow: true
                ,cols: [[
                    {type: 'checkbox', fixed: 'left'}
                    ,{field:'id', title:'ID', width:80, fixed: 'left', unresize: true, sort: true, totalRowText: '合计'}
                    ,{field:'username', title:'用户名', width:120, edit: 'text'}
                    ,{field:'email', title:'邮箱', width:150, edit: 'text', templet: function(res){
                            return '<em>'+ res.email +'</em>'
                        }}
                    ,{field:'experience', title:'积分', width:80, sort: true, totalRow: true}
                    ,{field:'sex', title:'性别', width:80, edit: 'text', sort: true}
                    ,{field:'logins', title:'登入次数', width:100, sort: true, totalRow: true}
                    ,{field:'sign', title:'签名'}
                    ,{field:'city', title:'城市', width:100}
                    ,{field:'ip', title:'IP', width:120}
                    ,{field:'joinTime', title:'加入时间', width:120}
                    ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}
                ]]
                ,page: true
            });

            //工具栏事件
            table.on('toolbar(test)', function(obj){
                var checkStatus = table.checkStatus(obj.config.id);
                switch(obj.event){
                    case 'getCheckData':
                        var data = checkStatus.data;
                        layer.alert(JSON.stringify(data));
                        break;
                    case 'getCheckLength':
                        var data = checkStatus.data;
                        layer.msg('选中了：'+ data.length + ' 个');
                        break;
                    case 'isAll':
                        layer.msg(checkStatus.isAll ? '全选': '未全选')
                        break;
                };
            });
        });
    </script>
@endsection
