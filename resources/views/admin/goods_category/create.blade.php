@extends('admin.layout.base')

@section('title')
@endsection

@section('resources')
    <meta name="_token" content="{{ csrf_token() }}"/>
@endsection

@section('container')
    <form class="layui-form layui-form-pane" action=""  lay-filter="example">

        <input type="hidden" name="type_id">
        <div class="layui-form-item">
            <label class="layui-form-label">分类名称</label>
            <div class="layui-input-block">
                <input type="text" name="category_name" lay-verify="required" placeholder="请输入分类名称" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">上级分类</label>
            <div class="layui-input-block">
                <select name="pid" >
                    <option value="0"> 顶级分类</option>
                    @foreach($goodsCateList as $cate)
                        
                        <option value="{{ $cate['category_id'] }}"> {{ $cate['category_name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="checkbox" name="status" value="1" lay-skin="switch" lay-text="ON|OFF">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-block">
                <input type="number" name="sort" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')

    <script>
        var id = "{{ Request ()->get('id', 0) }}";

        layui.use(['form', 'jquery'], function(){
            var form = layui.form
                ,$ = layui.jquery
                ,layer = layui.layer;

            //自定义验证规则
            form.verify({
            });

            let _params = {
                "category_id": id // id
                ,"category_name": "33" // 分类名称
                ,"pid": '' // 上级
                ,"status": true // 状态
                ,"sort": 1 // 排序
            };

            if (parseInt(id) !== 0) {
                //表单取值
				_params = YuanLu.getFrom({
                    url : "{{ route('admin.goods_category.info') }}",
                    params: {id:id},
                    data: _params,
                    form: form
                });
            }else {
				//表单赋值
				form.val('example', _params);
			}

            form.on('submit(submit)', function(data){
				//监听提交
				let params = form.val('example');
				console.log(params);
				YuanLu.submitForm({
                    url : "{{ route('admin.goods_category.create') }}",
                    params: params,
                });
                return false;
            });
        });
    </script>
@endsection
