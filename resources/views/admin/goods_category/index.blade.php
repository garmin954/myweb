@extends('admin.layout.base')

@section('title')
    @endsection

@section('container')
    <div class="layui-row layui-col-space10">
        <div class="layui-col-md4 layui-col-lg4">
            <div class="layui-card">
                <div class="layui-card-header">
                    产品分类
                </div>
                <div class="layui-card-body ">
                    <div id="goodsTree"></div>
                </div>
            </div>
        </div>
        <div class="layui-col-md8 layui-col-lg8 ">
        <div class="layui-card">
            <div class="layui-card-body ">
            </div>
            <div class="layui-card-header">
                    <button class="layui-btn" onclick="xadmin.open('添加配置','{{ route('admin.goods_category.create') }}',600 )"><i class="layui-icon"></i>添加</button>
            </div>
            <div class="layui-card-body layui-table-body layui-table-main">

                <table class="layui-hide" id="list" lay-filter="list"></table>

                <script type="text/html" id="toolbar">
                    <div class="layui-btn-container">
                        <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>
                        <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
                        <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>
                    </div>
                </script>
{{--                行工具--}}
                <script type="text/html" id="bar">
                    <a class="layui-btn layui-btn-xs" lay-event="update">编辑</a>
                    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                </script>

                {{--                状态--}}
                <script type="text/html" id="status">
                    <input type="checkbox" name="status" lay-filter="status" data-id="@{{ d.category_id }}" value="@php  echo "{{ d.status }}"; @endphp" lay-skin="switch"  lay-text="ON|OFF"
                           @{{  d.status == 1 ? 'checked': '' }} >

                </script>
            </div>

        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>


        layui.use(['table', 'laytpl', 'layer', 'form', 'tree'], function(){
            var table = layui.table
                ,layer = layui.layer
                ,form = layui.form
                ,laytpl = layui.laytpl,
                tree = layui.tree;

            let url = '{{ route('admin.goods_category.index') }}';
            table.render({
                elem: '#list'
                ,url: url
                ,id:'idTest'
                ,title: '用户数据表'
                ,totalRow: true
                // ,toolbar: '#toolbar' // 自定义头部工具
                ,defaultToolbar: ['filter', 'print', 'exports'] // layui工具
                ,response: {
                    // statusName: 'code' //规定数据状态的字段名称，默认：code
                    statusCode: 1
                    ,countName: 'count' //规定数据总数的字段名称，默认：count
                    ,dataName: 'data' //规定数据列表的字段名称，默认：data
                }
                ,cols: [[
                     {type: 'checkbox', fixed: 'left'}
                    ,{field:'category_id', title:'ID', minWidth:50, fixed: 'left', unresize: true, sort: true, totalRowText: '合计'}
                    ,{field:'category_name', title:'分类名称', minWidth:120, edit: 'text'}
                    ,{field:'pname', title:'上级分类', minWidth:120 }
                    ,{field:'sort', title:'排序', minWidth:80, edit:'text', sort: 'true'}
                    ,{field:'status', title:'状态', minWidth:80, templet:'#status'}
                    ,{field:'updated_at', title:'更新时间', minWidth:120}
                    ,{fixed: 'right', title:'操作', toolbar: '#bar', minWidth:150}
                ]]
                ,page: true

            });
            form.render();

            form.on('switch(status)', function(data){
                let status = data.elem.checked ? 1: 0;
                YuanLu.changStatus({
                    url :'{{ route('admin.goods_category.changeField') }}',
                    params : {id: $(data.elem).attr('data-id'), value: status, field : 'status'}
                });
            });

            table.on('edit()', function(obj){ //注：edit是固定事件名，test是table原始容器的属性 lay-filter="对应的值"
                if (obj.value> 127){
                    layer.msg('最大不能超过127');
                    return false;
                }
                YuanLu.changStatus({
                    url :'{{ route('admin.goods_category.changeField') }}',
                    params : {id: obj.data.category_id, value: obj.value, field : 'sort'}
                });
            });

            window.reload = (pid = 0)=>{

                table.reload('idTest', {
                    url: url
                    ,where: {
                        pid: pid
                    } //设定异步数据接口的额外参数
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

            //监听行工具事件
            table.on('tool(list)', function(obj){
                var data = obj.data;
                console.log(obj)
                if(obj.event === 'del'){
                    layer.confirm('确认删除？', function(index){
                        YuanLu.delData({
                            url :'{{ route('admin.goods_category.delData') }}',
                            params : {id: obj.data.category_id},
                            obj: obj,
                        });
                    });

                } else if(obj.event === 'update'){
                    xadmin.open('修改','{{ route('admin.goods_category.create') }}?id='+data.category_id,600 )
                }
            });


            $(function () {
                axios.post("{{route('admin.goods_category.getGoodsCategoryTree')}}", {}).then(respond => {
                    let res = respond.data
                    if(res.code > 0){
                        //渲染
                        var inst1 = tree.render({
                            elem: '#goodsTree'  //绑定元素
                            ,data: res.data
                            ,click: function(obj){
                                // console.log(obj.data); //得到当前点击的节点数据
                                // console.log(obj.state); //得到当前节点的展开状态：open、close、normal
                                // console.log(obj.elem); //得到当前节点元素
                                // console.log(obj.data.children); //当前节点下是否有子节点
                                reload(obj.data.id);
                            }
                        });
                    } else{
                        layer.msg('获取异常');
                    }
                }).catch((e)=>{
                    layer.msg('获取异常'+e);
                })
            })


        });


    </script>
@endsection
