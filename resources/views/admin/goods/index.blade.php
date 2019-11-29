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
            <div class="layui-card-body" id="app">
                <el-form :inline="true" ref="form" :model="form" class="demo-form-inline">
                    <el-form-item label="商品名称">
                        <el-input v-model="form.goods_name" placeholder="商品名称"></el-input>
                    </el-form-item>
                    <el-form-item label="分类">
                        <el-cascader
                                v-model="form.category_id"
                                :options="optionsCate"
                                :props="{ checkStrictly: true }"
                                clearable></el-cascader>
                    </el-form-item>
                    <el-form-item label="栏目" >
                        <el-select v-model="form.nav_id" placeholder="请选择">

                        <el-option
                                v-for="item in typeCateOptions"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value"></el-option>
                        </el-select>

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
                <button class="layui-btn" onclick="xadmin.open('添加配置','{{ route('admin.goods.create') }}' )"><i class="layui-icon"></i>添加</button>
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
                    <a class="layui-btn layui-btn-xs" lay-event="look">查看</a>
                    <a class="layui-btn layui-btn-xs" lay-event="update">编辑</a>
                    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                </script>
                {{--                蕾西--}}
                <script type="text/html" id="type">
                     <a href="javascript:;" class="layui-btn layui-btn-xs @{{  d.type == 1 ? ' ': 'layui-btn-danger' }}">
                         @{{  d.type == 1 ? '团建产品': '拼团建' }}
                     </a>


                </script>
                {{--                状态--}}
                <script type="text/html" id="status">
                    <input type="checkbox" name="status" lay-filter="status" data-id="@php  echo "{{ d.goods_id }}"; @endphp" value="@php  echo "{{ d.status }}"; @endphp" lay-skin="switch"  lay-text="ON|OFF"
                           @{{  d.status == 1 ? 'checked': '' }} >

                </script>
                {{--                状态--}}
                <script type="text/html" id="is_top">
                    <input type="checkbox" name="is_top" lay-filter="is_top" data-id="@php  echo "{{ d.goods_id }}"; @endphp" value="@php  echo "{{ d.is_top }}"; @endphp" lay-skin="switch"  lay-text="ON|OFF"
                           @{{  d.is_top == 1 ? 'checked': '' }} >

                </script>
                {{--主图--}}
                <script type="text/html" id="goods_thumb">
                    <img style="width: 80px;height: 60px" src="@php  echo "{{ d.goods_thumb }}"; @endphp" alt="@php  echo "{{ d.goods_name }}"; @endphp" >
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
                        goods_name: '',
                        category_id: '',
                        status: '',
                        nav_id: '',
                    },
                    optionsStatus:[
                        {label:'全部', value:''},
                        {label:'正常', value:'1'},
                        {label:'关闭', value:'0'},
                    ],
                    optionsCate: [],
                    typeCateOptions:[
                        {label:'全部', value:''},{
                        value: '1',
                        label: '团建产品',
                    },{
                        value: '2',
                        label: '拼团建',
                    },{
                            value: '3',
                            label: '个人团',
                        }]
                },
                created(){
                    this.getSearchData();
                },
                methods:{
                    getSearchData(){
                        let self = this;
                        axios.get("{{ route('admin.goods.getSearchData') }}", {}).then(respond=>{
                            let res = respond.data;
                            if (res.code > 0){
                                self.optionsCate =  res.data.cate_list
                            }else{
                                layer.msg('获取搜索资源异常');
                            }
                        }).catch(e=>{
                            layer.msg('获取搜索资源异常'+ e);
                        })
                    },
                    onSubmit(){
                        reload(this.form.goods_name, this.form.category_id, this.form.status, this.form.nav_id);
                    }
                }
            });
            layui.use(['table', 'laytpl', 'layer', 'form'], function(){
                var table = layui.table
                    ,layer = layui.layer
                    ,form = layui.form
                    ,laytpl = layui.laytpl;

                let url = '{{ route('admin.goods.index') }}';
                table.render({
                    elem: '#list',
                    height:700
                    ,url: url
                    ,id:'idTest'
                    ,title: '用户数据表'
                    ,totalRow: true
                    ,toolbar: '#toolbar' // 自定义头部工具
                    ,defaultToolbar: [] // layui工具
                    ,response: {
                        // statusName: 'code' //规定数据状态的字段名称，默认：code
                        statusCode: 1
                        ,countName: 'count' //规定数据总数的字段名称，默认：count
                        ,dataName: 'data' //规定数据列表的字段名称，默认：data
                    }
                    ,cols: [[
                        { fixed: 'left',width: 1}
                        ,{field:'goods_thumb', title:'图片', minWidth:90, templet:'#goods_thumb'}
                        ,{field:'goods_name', title:'名称', minWidth:120, }
                        ,{field:'nums', title:'价格(均价)', minWidth:120, }
                        ,{field:'avg', title:'参与人均价', minWidth:120, }
                        ,{field:'price', title:'价格(均价)', minWidth:120, }
                        ,{field:'sort', title:'排序', minWidth:120, edit:'text'}
                        ,{field:'sale_type', title:'营销展示类型', minWidth:120}
                        ,{field:'sale_value', title:'营销展示值', minWidth:120}
                        ,{field:'type', title:'栏目类型', minWidth:100, templet:'#type'}
                        ,{field:'is_top', title:'推荐', minWidth:120, templet:'#is_top'}
                        ,{field:'status', title:'状态', minWidth:120, templet:'#status'}
                        ,{field:'updated_at', title:'更新时间', minWidth:180}
                        ,{fixed: 'right', title:'操作', toolbar: '#bar', minWidth:160}
                    ]]
                    ,page: true
                    ,done: function(res, curr, count){
                        logs(res);
                    }
                });
                // laytpl.config({
                //     open: '<%',
                //     close: '%>'
                // });

                window.reload = (goods_name='', category_id='', status=1, nav_id='')=>{
                    table.reload('idTest', {
                        url: url
                        ,where: {
                            goods_name: goods_name,
                            category_id: category_id,
                            status: status,
                            nav_id: nav_id,
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
                        url :'{{ route('admin.goods.changeField') }}',
                        params : {id: $(data.elem).attr('data-id'), value: status, field : 'status'}
                    });
                });

                form.on('switch(is_top)', function(data){
                    let status = data.elem.checked ? 1: 0;
                    YuanLu.changStatus({
                        url :'{{ route('admin.goods.changeField') }}',
                        params : {id: $(data.elem).attr('data-id'), value: status, field : 'is_top'}
                    });
                });

                table.on('edit()', function(obj){ //注：edit是固定事件名，test是table原始容器的属性 lay-filter="对应的值"
                    if (obj.value> 127){
                        layer.msg('最大不能超过127');
                        return false;
                    }
                    YuanLu.changStatus({
                        url :'{{ route('admin.goods.changeField') }}',
                        params : {id: obj.data.goods_id, value: obj.value, field : 'sort'}
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
                        xadmin.open('修改配置','{{ route('admin.goods.create') }}?id='+data.goods_id )
                    } else if(obj.event === 'look'){
                        window.open( "{{ route('goods') }}"+'?id='+data.goods_id );
                    }
                });
            });
        </script>
@endsection
