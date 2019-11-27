@extends('admin.layout.base')

@section('title')
@endsection

@section('resources')

@endsection
@section('container')
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">原密码</label>
            <div class="layui-input-inline">
                <input type="text" name="oldpassword" required  lay-verify="required" placeholder="请输入原密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">新密码</label>
            <div class="layui-input-inline">
                <input type="password" name="newpassword" required lay-verify="required" placeholder="请输入新密码" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">确认新密码</label>
            <div class="layui-input-inline">
                <input type="password" name="repassword" required lay-verify="required" placeholder="请输入确认新密码" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        //Demo
        layui.use('form', function(){
            var form = layui.form;

            //监听提交
            form.on('submit(formDemo)', function(data){
                // layer.msg(JSON.stringify(data.field));
                axios.post("{{ route('admin.editPass') }}", data.field).then(respond=>{
                    let res = respond.data;
                    if(res.code > 0){
                        layer.msg(res.msg, {icon:1,shade:0.6,anim:6})
                        setTimeout(function () {
                            window.history.back();
                        }, 2000)

                    } else{
                        layer.msg(res.msg)
                    }
                }).catch(e=>{
                    layer.msg('异常'+e);
                })
                return false;
            });
        });
    </script>
@endsection
