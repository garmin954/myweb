@extends('admin.layout.base')

@section('title')
    @endsection
@section('resources')
    <script type="text/javascript" charset="utf-8" src="{{ asset(VENDOR) }}/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset(VENDOR) }}/ueditor/ueditor.all.min.js"> </script>
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
                <div class="layui-tab-content">

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
                                                <input type="text" name="{{$configs['config_code']}}" class="layui-input">
                                            </div>
                                        </div>
                                    @break
                                    @case(2)
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">{{$configs['config_name']}}</label>
                                            <div class="layui-input-block">
                                                <input type="number" name="{{$configs['config_code']}}" class="layui-input">
                                            </div>
                                        </div>
                                    @break
                                    @case(3)
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">{{$configs['config_name']}}</label>
                                            <div class="layui-input-block">
                                                <textarea name="{{$configs['config_code']}}" class="layui-textarea"></textarea>
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
                                                <script name="{{$configs['config_code']}}" id="{{$configs['config_code']}}" type="text/plain" style="width:1024px;height:500px;"></script>
                                            </div>
                                        </div>
                                        <script>
                                            var ue = UE.getEditor('{{$configs['config_code']}}');
                                        </script>
                                    @break
                                @endswitch
                            @endforeach

                            </form>
                        </div>
                    </div>
                    @endforeach
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        layui.use(['table', 'form', 'layer', 'element', 'layedit'], function(){
            var table = layui.table
                ,layer = layui.layer
                ,element = layui.element
                ,layedit = layui.layedit
                ,form = layui.form;

            // layedit.build('demo'); //建立编辑器
        });
    </script>
@endsection
