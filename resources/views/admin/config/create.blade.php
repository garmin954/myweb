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
                        <option value=""></option>
                        <option value="0">写作</option>

                    </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">配置类型</label>
            <div class="layui-input-inline">
                    <select name="config_type">
                        <option value=""></option>
                        <option value="0">写作</option>
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
                title: function(value){
                    if(value.length < 5){
                        return '标题至少得5个字符啊';
                    }
                }
                ,pass: [
                    /^[\S]{6,12}$/
                    ,'密码必须6到12位，且不能出现空格'
                ]
                ,content: function(value){
                    layedit.sync(editIndex);
                }
            });

            //监听指定开关
            form.on('switch(switchTest)', function(data){
                layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                    offset: '6px'
                });
                layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
            });



            if (parseInt(id) !== 0) {
                let url = "{{ route('admin.config.info') }}";
                $.post(url, {id: id},function (res) {
                    if(res.code > 0){
                        layer.msg(res.msg, {icon:1, shade:0.5,anim:6})
                    } else {
                        layer.msg(res.msg, {icon:2, shade:0.5,anim:6})
                    }
                })
            }
            //表单赋值
            form.val('example', {
                "id": id // id
                ,"config_name": "" // 配置名称
                ,"config_code": 1 // 配置名称
                ,"type_id": 1 // 所属分类
                ,"config_type": 1 // 所属类型
                ,"value": '' // 值
                ,"values": '' // 多选值
                ,"status": true // 状态
                ,"desc": "我爱 layui" // 描述
            });

            //表单取值
            var data = form.val('example');
            // alert(JSON.stringify(data));

            //监听提交
            form.on('submit(submit)', function(data){

                $.ajax({
                    url: "{{ route('admin.config.create') }}",
                    type: 'post',
                    data: data.field,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success:function(res){
                        if(res.code > 0){
                            layer.msg(res.msg, {icon:1, shade:0.5,anim:6})
                        } else {
                            layer.msg(res.msg, {icon:2, shade:0.5,anim:6})
                        }
                    }
                });

                return false;
            });
        });
    </script>
@endsection
