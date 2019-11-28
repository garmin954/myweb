@extends('admin.layout.base')

@section('title')
    @endsection
@section('resources')
    <script type="text/javascript" charset="utf-8" src="{{ asset(VENDOR) }}/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset(VENDOR) }}/ueditor/ueditor.all.min.js"> </script>
    <script src="{{ asset(ADMIN) }}/lib/layui/layui.js" charset="utf-8"></script>
    <link rel="stylesheet" href="{{ asset(ADMIN) }}/lib/layui/css/layui.css">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <style>
        .layui-upload-list{width: 100px;height: 80px;border: 1px solid}
    </style>
@endsection

@section('container')
    <div class="layui-col-md12">
        <div class="layui-card">
            <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                <ul class="layui-tab-title">
                    <div class="layui-card-header">
                        @foreach( $config_type_list as $type_list)
                        <li
                            @if ($loop->first)
                            class="layui-this"
                            @endif
                        >{{ $type_list['type_name'] }}</li>
                        @endforeach
                    </div>
                </ul>
                <div class="layui-tab-content ">
                        @foreach( $config_type_list as $type_list)
                    <div class="layui-tab-item
                      @if ($loop->first)
                        layui-show
                      @endif
                        "
                    >
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <form action="" class="layui-form layui-form-pane">
                            {{-- 设置--}}
                                @foreach( $type_list['child'] as $configs)
                                @switch($configs['type_id'])
                                    @case(1)
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">{{$configs['config_name']}}</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="{{$configs['config_code']}}" value="{{$configs['value']}}" class="layui-input">
                                            </div>
                                        </div>
                                    @break
                                    @case(2)
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">{{$configs['config_name']}}</label>
                                            <div class="layui-input-block">
                                                <input type="number" name="{{$configs['config_code']}}" value="{{$configs['value']}}" class="layui-input">
                                            </div>
                                        </div>
                                    @break
                                    @case(3)
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">{{$configs['config_name']}}</label>
                                            <div class="layui-input-block">
                                                <textarea name="{{$configs['config_code']}}" class="layui-textarea">{{$configs['value']}}</textarea>
                                            </div>
                                        </div>
                                    @break
                                    @case(4)
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">{{$configs['config_name']}}</label>
                                            <div class="layui-input-block">
                                                <input type="radio" name="{{$configs['config_code']}}" value="男" title="男" checked="">
                                            </div>
                                        </div>
                                    @break
                                    @case(5)
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">{{$configs['config_name']}}</label>
                                            <div class="layui-input-block">
                                                <textarea name="{{$configs['config_code']}}" id="{{$configs['config_code']}}" type="text/plain" style="width:1024px;height:500px;">{{$configs['value']}}</textarea>
                                            </div>
                                        </div>
                                    @break

                                    @case(6)
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">{{$configs['config_name']}}</label>
                                            <div class="layui-input-block">
                                                <div class="layui-upload">
                                                    <button type="button" class="layui-btn" id="upload_{{$configs['config_id']}}">上传图片</button>
                                                    <div class="layui-upload-list">
                                                        <input type="hidden" name="{{$configs['config_code']}}" value="{{$configs['value']}}">
                                                        <img style="width: 100%;height: 100%" class="layui-upload-img" id="image_{{$configs['config_id']}}" src="{{$configs['value']}}">
                                                        <p id="text_{{$configs['config_id']}}"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @break
                                @endswitch
                            @endforeach
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="submit_{{$type_list['type_id']}}">立即提交</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
        });
        layui.use(['table','upload', 'form', 'layer', 'element', 'layedit'], function(){
            var $ = layui.jquery
                ,upload = layui.upload;
            var table = layui.table
                ,layer = layui.layer
                ,element = layui.element
                ,layedit = layui.layedit
                ,form = layui.form;

            @foreach( $config_type_list as $type_list)
                @foreach( $type_list['child'] as $configs)
                    @switch($configs['type_id'])
                        @case(5)
                        var ue = UE.getEditor('{{$configs['config_code']}}');
                        @break
                        @case(6)
                        //普通图片上传
                        var uploadInst_{{$configs['config_id']}} = upload.render({
                            elem: '#upload_{{$configs['config_id']}}'
                            , url: "{{ route('admin.upload') }}"
                            , before: function (obj) {
                                //预读本地文件示例，不支持ie8
                                obj.preview(function (index, file, result) {
                                    $('#image_{{$configs['config_id']}}').attr('src', result); //图片链接（base64）
                                });
                            }
                            , done: function (res) {
                                //如果上传失败
                                if (res.code <= 0) {
                                    return layer.msg('上传失败');
                                }
                                //上传成功
                                $("[name='{{$configs['config_code']}}']").val(res.data)
                                return layer.msg('上传成功');
                            }
                            , error: function () {
                                //演示失败状态，并实现重传
                                var demoText = $('#text_{{$configs['config_id']}}');
                                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                                demoText.find('.demo-reload').on('click', function () {
                                    uploadInst_{{$configs['config_id']}}.upload();
                                });
                            }
                        })
                        //绑定原始文件域
                        @break

                    @endswitch

                @endforeach
                //监听提交

                form.on('submit(submit_{{$type_list['type_id']}})', function(data){
                    axios.post("{{route('admin.config.config')}}", data.field).then(res=>{
                        if(res.data.code > 0){
                            layer.msg(res.data.msg, {icon:1, shade:0.5, anim:6});
                            setTimeout(function () {
                                window.location.reload();
                            }, 2000)
                        }else{
                            layer.msg(res.data.msg, {icon:2, shade:0.5, anim:6})
                        }
                    }).catch(e=>{
                        layer.msg('异常'+ e)
                    })
                    return false;
                });
            @endforeach

        });
    </script>
@endsection
