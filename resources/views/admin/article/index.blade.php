@extends('admin.layout.base')

@section('title')
    @endsection

@section('resources')
    <link rel="stylesheet" href="{{ asset(ADMIN) }}/element-ui/lib/theme-chalk/index.css">

    <style>
        .layui-table-cell{
            height:80px;
            line-height: 80px;
        }
        .layui-table-total{display: none}
    </style>
@endsection

@section('container')
    <div class="layui-col-md12">
        <div class="layui-card">
            <div class="layui-card-body " id="app">
                <el-form :inline="true" ref="form" :model="form" class="demo-form-inline">
                    <el-form-item label="商品名称">
                        <el-input v-model="form.title" placeholder="标题"></el-input>
                    </el-form-item>

                    <el-form-item label="状态">
                        <el-select v-model="form.status" placeholder="请选择">
                            <el-option
                                v-for="item in optionsStatus"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                            </el-option>
                        </el-select>
                    </el-form-item>

                    <el-form-item>
                        <el-button type="primary" @click="onSubmit">查询</el-button>
                    </el-form-item>
                </el-form>
            </div>
            <div class="layui-card-header">
                    <button class="layui-btn" onclick="xadmin.open('添加内容','{{ route('admin.article.create', array('cate_id'=> request()->get('cate_id'))) }}',800 )"><i class="layui-icon"></i>添加</button>
            </div>
            <div class="layui-card-body layui-table-body layui-table-main">


                <table class="layui-hide" id="list" lay-filter="list"></table>

                <script type="text/html" id="toolbar">
                </script>
                {{--                行工具--}}
                <script type="text/html" id="bar">
                    <a class="layui-btn layui-btn-xs" lay-event="update">编辑</a>
                    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                </script>
                {{--                图片--}}
                <script type="text/html" id="thumb">
                    <img src="@php echo "{{ d.thumb  }}";@endphp" alt="" style="width: 100%;height: 100%">
                </script>
                {{--                推荐--}}
                <script type="text/html" id="is_top">
                    <input type="checkbox" name="is_top" lay-filter="is_top" data-id="@php  echo "{{ d.art_id }}"; @endphp" value="@php  echo "{{ d.is_top }}"; @endphp" lay-skin="switch"  lay-text="ON|OFF"
                           @{{  d.is_top == 1 ? 'checked': '' }} >
                </script>
                {{--                状态--}}
                <script type="text/html" id="status">
                    <input type="checkbox" name="status" lay-filter="status" data-id="@php  echo "{{ d.art_id }}"; @endphp" value="@php  echo "{{ d.status }}"; @endphp" lay-skin="switch"  lay-text="ON|OFF"
                           @{{  d.status == 1 ? 'checked': '' }} >

                </script>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset(ADMIN) }}/js/vue.js"></script>
    <script src="{{ asset(ADMIN) }}/element-ui/lib/index.js"></script>
    <script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.js"></script>
    <script>
        var vm = new Vue({
            el:'#app',
            data: {
                form:{
                    title: '',
                    status: ''
                },
                optionsStatus:[
                    {label:'全部', value:''},
                    {label:'正常', value:'1'},
                    {label:'关闭', value:'0'},
                ],
                optionsCate: []
            },
            created(){
                this.getSearchData();
            },
            methods:{
                getSearchData(){
                },
                onSubmit(){
                    reload(this.form.title, this.form.status);
                }
            }
        });

        layui.use(['table', 'laytpl', 'layer', 'form'], function(){
            var table = layui.table
                ,layer = layui.layer
                ,form = layui.form
                ,laytpl = layui.laytpl;

            let url = '{{ route('admin.article.index') }}';
            table.render({
                elem: '#list'
                ,url: url
                ,id:'idTest'
                ,title: '用户数据表'
                ,totalRow: true
                // ,toolbar: '#toolbar' // 自定义头部工具
                ,defaultToolbar: [] // layui工具'filter', 'print', 'exports'
                ,response: {
                    // statusName: 'code' //规定数据状态的字段名称，默认：code
                    statusCode: 1
                    ,countName: 'count' //规定数据总数的字段名称，默认：count
                    ,dataName: 'data' //规定数据列表的字段名称，默认：data
                }
                ,cols: [[
                    {type: 'checkbox', fixed: 'left'}
                    ,{field:'title', title:'标题', minWidth:50, fixed: 'left'}
                    ,{field:'thumb', title:'图片', minWidth:50, templet: '#thumb'}
                    ,{field:'category_name', title:'所属分类', minWidth:120}
                    ,{field:'sort', title:'排序', minWidth:80, edit:'text'}
                    ,{field:'is_top', title:'推荐', minWidth:80, templet:'#is_top'}
                    ,{field:'status', title:'状态', minWidth:80, templet:'#status'}
                    ,{field:'created_at', title:'添加时间', minWidth:120}
                    ,{field:'updated_at', title:'更新时间', minWidth:120}
                    ,{fixed: 'right', title:'操作', toolbar: '#bar', minWidth:150}
                ]]
                ,page: true
                ,where: {
                    cate_id : "{{ request()->get('cate_id') }}}"
                }
                ,done: function(res, curr, count){
                    logs(res);
                }
            });


            window.reload = (title='', status=0)=>{

                table.reload('idTest', {
                    url: url
                    ,where: {
                        title:title,
                        status:status,
                        cate_id : "{{ request()->get('cate_id') }}}"
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

            form.on('switch(status)', function(data){
                let status = data.elem.checked ? 1: 0;
                YuanLu.changStatus({
                    url :'{{ route('admin.article.changeField') }}',
                    params : {id: $(data.elem).attr('data-id'), value: status, field : 'status'}
                });
            });

            form.on('switch(is_top)', function(data){
                let status = data.elem.checked ? 1: 0;
                YuanLu.changStatus({
                    url :'{{ route('admin.article.changeField') }}',
                    params : {id: $(data.elem).attr('data-id'), value: status, field : 'is_top'}
                });
            });

            table.on('edit()', function(obj){ //注：edit是固定事件名，test是table原始容器的属性 lay-filter="对应的值"
                if (obj.value> 127){
                    layer.msg('最大不能超过127');
                    return false;
                }
                YuanLu.changStatus({
                    url :'{{ route('admin.article.changeField') }}',
                    params : {id: obj.data.art_id, value: obj.value, field : 'sort'}
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
                    xadmin.open('修改','{{ route('admin.article.create',array('cate_id'=> request()->get('cate_id'))) }}&id='+data.art_id,800 )
                }
            });
        });
    </script>
@endsection
