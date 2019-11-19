@extends('admin.layout.base')

@section('title')
@endsection

@section('resources')
    <meta name="_token" content="{{ csrf_token() }}"/>
@endsection

@section('container')
    <form class="layui-form" action=""  lay-filter="example">

        <input type="hidden" name="config_id">
        <div class="layui-form-item">
            <label class="layui-form-label">广告名称</label>
            <div class="layui-input-block">
                <input type="text" name="adv_name" lay-verify="required" placeholder="请输入广告名称" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">上传图片</label>
            <div class="layui-input-block">
                <div class="layui-upload">
                    <button type="button" class="layui-btn" id="test1">上传图片</button>
                    <div class="layui-upload-list" style="height: 150px;border: 1px solid grey">
                        <img class="layui-upload-img" id="demo1"style="width: auto;height: 100%">
                        <p id="demoText"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">链接</label>
            <div class="layui-input-block">
                <input type="text" name="link" placeholder="" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-block">
                <input type="text" name="sort" placeholder="" value="50" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="checkbox" checkbox name="status" value="1" lay-skin="switch" lay-text="ON|OFF">
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
        var id = "{{ Request()->get('id', 0) }}";

        layui.use(['form', 'layedit', 'upload'], function(){
            var form = layui.form
                ,layer = layui.layer
                ,upload = layui.upload
                ,layedit = layui.layedit;

            //自定义验证规则
            form.verify({
            });

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
            }



            //普通图片上传
            var uploadInst = upload.render({
                elem: '#test1'
                ,url: "{{ route('admin.upload') }}"
                ,headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                ,before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#demo1').attr('src', result); //图片链接（base64）
                    });
                }
                ,done: function(res){
                    //如果上传失败
                    if(res.code > 0){
                        return layer.msg('上传失败');
                    }
                    //上传成功
                }
                ,error: function(){
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function(){
                        uploadInst.upload();
                    });
                }
            });

        });
    </script>
@endsection
