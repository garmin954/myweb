@extends('admin.layout.base')

@section('title')
    @endsection

@section('container')
    <div class="layui-col-md12">
        <div class="layui-card">
            <div class="layui-card-body ">
            </div>
            <div class="layui-card-header">
                    <button class="layui-btn" onclick="xadmin.open('添加配置','{{ route('admin.config_type.create') }}',600 )"><i class="layui-icon"></i>添加</button>
            </div>
            <div class="layui-card-body layui-table-body layui-table-main">

            </div>

        </div>
    </div>
@endsection
