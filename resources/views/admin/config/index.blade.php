@extends('admin.layout.base')

@section('title')
    @endsection

@section('container')
    <div class="layui-col-md12">
        <div class="layui-card">
            <div class="layui-card-body ">
            </div>
            <div class="layui-card-header">
                    <button class="layui-btn" onclick="xadmin.open('添加配置','{{ route('admin.config.create') }}',600 )"><i class="layui-icon"></i>添加</button>
            </div>
            <div class="layui-card-body layui-table-body layui-table-main">


                <table class="layui-hide" id="list" lay-filter="list"></table>

                <script type="text/html" id="toolbar">
{{--                    <div class="layui-btn-container">--}}
{{--                        <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>--}}
{{--                        <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>--}}
{{--                        <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>--}}
{{--                    </div>--}}
                </script>
                {{--                行工具--}}
                <script type="text/html" id="bar">
                    <a class="layui-btn layui-btn-xs" lay-event="update">编辑</a>
                    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                </script>

                {{--                状态--}}
                <script type="text/html" id="status">
                    <input type="checkbox" name="status" lay-filter="status" data-id="<% d.config_id %>" value="<% d.status %>" lay-skin="switch"  lay-text="ON|OFF"
                    <%#  if(d.status == 1){ %>
                    checked
                    <%# }  %>
                    >

                </script>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        layui.use(['table', 'laytpl', 'layer', 'form'], function(){
            var table = layui.table
                ,layer = layui.layer
                ,form = layui.form
                ,laytpl = layui.laytpl;

            let url = '{{ route('admin.config.index') }}';
            table.render({
                elem: '#list'
                ,url: url
                ,id:'idTest'
                ,title: '用户数据表'
                ,totalRow: true
                ,toolbar: '#toolbar' // 自定义头部工具
                ,defaultToolbar: ['filter', 'print', 'exports'] // layui工具
                ,response: {
                    // statusName: 'code' //规定数据状态的字段名称，默认：code
                    statusCode: 1
                    ,countName: 'count' //规定数据总数的字段名称，默认：count
                    ,dataName: 'data' //规定数据列表的字段名称，默认：data
                }
                ,cols: [[
                    {type: 'checkbox', fixed: 'left'}
                    ,{field:'config_name', title:'配置名称', minWidth:50, fixed: 'left'}
                    ,{field:'config_code', title:'配置代码', minWidth:120, edit: 'text'}
                    ,{field:'status', title:'状态', minWidth:80, templet:'#status'}
                    ,{field:'updated_at', title:'更新时间', minWidth:120}
                    ,{fixed: 'right', title:'操作', toolbar: '#bar', minWidth:150}
                ]]
                ,page: true
                ,done: function(res, curr, count){
                    logs(res);

                }
            });
            laytpl.config({
                open: '<%',
                close: '%>'
            });

            window.reload = ()=>{

                table.reload('idTest', {
                    url: url
                    ,where: {} //设定异步数据接口的额外参数
                    //,height: 300
                });

            }
            //工具栏事件
            table.on('toolbar(list)', function(obj){
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

            form.on('switch(status)', function(data){
                let status = data.elem.checked ? 1: 0;
                YuanLu.changStatus({
                    url :'{{ route('admin.config.changeField') }}',
                    params : {id: $(data.elem).attr('data-id'), value: status, field : 'status'}
                });
            });

            //监听行工具事件
            table.on('tool(list)', function(obj){
                var data = obj.data;
                //console.log(obj)
                if(obj.event === 'del'){
                    layer.confirm('真的删除行么', function(index){
                        obj.del();
                        layer.close(index);
                    });
                } else if(obj.event === 'update'){
                    xadmin.open('修改配置','{{ route('admin.config.create') }}?id='+data.type_id,600 )
                }
            });
        });
    </script>
@endsection
