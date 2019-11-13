@extends('admin.layout.base')

@section('title')
@endsection

@section('resources')
    <meta name="_token" content="{{ csrf_token() }}"/>
@endsection

@section('container')
    <form class="layui-form" action=""  lay-filter="example">

        <div class="layui-form-item">
            <label class="layui-form-label">配置名称</label>
            <div class="layui-input-block">
                <input type="text" name="config_name" placeholder="请输入配置名称" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">配置代码</label>
            <div class="layui-input-block">
                <input type="text" name="config_code" placeholder="请输入配置代码"  class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">配置分类</label>
                <div class="layui-input-inline">
                    <select name="type_id">
                        <option value="">请选择</option>
                        @foreach( config('template.config_input_type') as $key =>$val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">配置类型</label>
            <div class="layui-input-inline">
                    <select name="config_type">
                        <option value="">请选择</option>
                        @foreach($config_type_list as $type)
                            <option value="{{ $type['type_id'] }}">{{ $type['type_name'] }}</option>
                        @endforeach
                    </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">配置值</label>
            <div class="layui-input-block">

                <input type="text" name="value" placeholder="" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">配置选值</label>
            <div class="layui-input-block">
                <textarea name="values" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">配置状态</label>
            <div class="layui-input-block">
                <input type="checkbox" name="status" value="1" lay-skin="switch" lay-text="ON|OFF">
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">配置描述</label>
            <div class="layui-input-block">
                <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')

    <script>
        var id = "{{ Request ()->get('id', 0) }}";

        layui.use(['form', 'layedit'], function(){
            var form = layui.form
                ,layer = layui.layer
                ,layedit = layui.layedit;

            //自定义验证规则
            form.verify({
            });

            let _params = {
                "id": id // id
                ,"config_name": "" // 配置名称
                ,"config_code": 1 // 配置名称
                ,"type_id": 1 // 所属分类
                ,"config_type": 1 // 所属类型
                ,"value": '' // 值
                ,"values": '' // 多选值
                ,"status": true // 状态
                ,"desc": "我爱 layui" // 描述
            };

            if (parseInt(id) !== 0) {
                //表单取值
                _params = YuanLu.getFrom({
                    url : "{{ route('admin.config.info') }}",
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
                YuanLu.submitForm({
                    url : "{{ route('admin.config.create') }}",
                    params: params,
                });
                return false;
            });
        });
    </script>
@endsection
