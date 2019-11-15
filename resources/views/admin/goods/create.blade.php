@extends('admin.layout.base')

@section('title')
@endsection

@section('resources')
    <script src="{{ asset(ADMIN) }}/js/vue.js"></script>
    <!-- 引入样式 -->
    <link rel="stylesheet" href="{{ asset(ADMIN) }}/element-ui/lib/theme-chalk/index.css">
    <!-- 引入组件库 -->
    <script src="{{ asset(ADMIN) }}/element-ui/lib/index.js"></script>

    <meta name="_token" content="{{ csrf_token() }}"/>

    <script type="text/javascript" charset="utf-8" src="{{ asset(VENDOR) }}/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset(VENDOR) }}/ueditor/ueditor.all.min.js"> </script>

    <style>
        .avatar-uploader .el-upload {
            border: 1px dashed #d9d9d9;
            border-radius: 6px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .avatar-uploader .el-upload:hover {
            border-color: #409EFF;
        }
        .avatar-uploader-icon {
            font-size: 28px;
            color: #8c939d;
            width: 178px;
            height: 178px;
            line-height: 178px;
            text-align: center;
        }
        .avatar {
            width: 178px;
            height: 178px;
            display: block;
        }
    </style>
@endsection

@section('container')
    <div id="app">
        <el-form ref="goodsForm" :model="goodsForm" label-width="80px">

            <el-tabs v-model="activeName" @tab-click="handleClick">
                <el-tab-pane label="商品基本信息" name="first">
                    {{--商品名称--}}
                    <el-form-item label="商品名称">
                        <el-input v-model="goodsForm.goods_name"></el-input>
                    </el-form-item>

                    {{--商品描述--}}
                    <el-form-item label="商品描述">
                        <el-input type="textarea" v-model="goodsForm.desc"></el-input>
                    </el-form-item>
                    {{--参团人数--}}
                    <el-form-item label="参团人数">
                        <el-input-number v-model="goodsForm.nums" @change="handleChange" :min="1" :max="10" label="描述文字"></el-input-number>
                    </el-form-item>

                    {{--price--}}
                    <el-form-item label="均价">
                        <el-input-number v-model="goodsForm.price" @change="handleChange" :min="1" :max="10" label="描述文字"></el-input-number>
                    </el-form-item>

                    {{--参团人均--}}
                    <el-form-item label="参团人数">
                        <el-input-number v-model="goodsForm.avg" @change="handleChange" :min="1" :max="10" label="描述文字"></el-input-number>
                    </el-form-item>


                    {{--商品状态--}}
                    <el-form-item label="商品状态">
                        <el-switch
                            v-model="goodsForm.status"
                            active-color="#13ce66"
                            inactive-color="#ff4949">
                        </el-switch>
                    </el-form-item>

                    {{--参团人均--}}
                    <el-form-item label="排序">
                        <el-input-number v-model="goodsForm.sort" @change="handleChange" :min="1" :max="10" label="描述文字"></el-input-number>
                    </el-form-item>

                    {{--是否推荐--}}
                    <el-form-item label="是否推荐">
                        <el-switch
                            v-model="goodsForm.is_top"
                            active-color="#13ce66"
                            inactive-color="#ff4949">
                        </el-switch>
                    </el-form-item>

                    {{--营销类型--}}
                    <el-form-item label="营销类型">
                        <el-select v-model="value" placeholder="请选择">
                            <el-option
                                v-for="item in options"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                            </el-option>
                        </el-select>
                    </el-form-item>

                    <el-form-item label="营销设置">
                        <el-input v-model="goodsForm.sale_type"></el-input>
                    </el-form-item>
                </el-tab-pane>
                <el-tab-pane label="图片设置" name="second">
{{--                    商品主图--}}
                    <el-form-item label="商品主图">
                        <el-upload
                            action="#"
                            list-type="picture-card"
                            :auto-upload="false">
                            <i slot="default" class="el-icon-plus"></i>
                            <div slot="file" slot-scope="{file}">
                                <img :src="file.url" alt="" class="el-upload-list__item-thumbnail" >
                                <span class="el-upload-list__item-actions">
                                <span @click="handlePictureCardPreview(file)" class="el-upload-list__item-preview">
                                  <i class="el-icon-zoom-in"></i>
                                </span>
                                <span v-if="!disabled" @click="handleDownload(file)" class="el-upload-list__item-delete">
                                  <i class="el-icon-download"></i>
                                </span>
                                <span v-if="!disabled" @click="handleRemove(file)" class="el-upload-list__item-delete">
                                  <i class="el-icon-delete"></i>
                                </span>
                              </span>
                            </div>
                        </el-upload>
                    </el-form-item>

{{--                    商品副图--}}
                    <el-form-item label="商品副图">
                        <el-upload
                            action="#"
                            list-type="picture-card"
                            :auto-upload="false">
                            <i slot="default" class="el-icon-plus"></i>
                            <div slot="file" slot-scope="{file}">
                                <img :src="file.url" alt="" class="el-upload-list__item-thumbnail" >
                                <span class="el-upload-list__item-actions">
                                <span @click="handlePictureCardPreview(file)" class="el-upload-list__item-preview">
                                  <i class="el-icon-zoom-in"></i>
                                </span>
                                <span v-if="!disabled" @click="handleDownload(file)" class="el-upload-list__item-delete">
                                  <i class="el-icon-download"></i>
                                </span>
                                <span v-if="!disabled" @click="handleRemove(file)" class="el-upload-list__item-delete">
                                  <i class="el-icon-delete"></i>
                                </span>
                              </span>
                            </div>
                        </el-upload>
                        <el-dialog :visible.sync="dialogVisible">
                            <img width="100%" :src="dialogImageUrl" alt="">
                        </el-dialog>
                    </el-form-item>
                </el-tab-pane>

                <el-tab-pane label="内容" name="third">
                    <script  id="content" type="text/plain" style="width:100%;height:500px;"></script>
                </el-tab-pane>
            </el-tabs>



            <el-form-item>
                <el-button type="primary" @click="onSubmit">立即创建</el-button>
                <el-button>取消</el-button>
            </el-form-item>
        </el-form>
    </div>
@endsection

@section('scripts')

    <script>
        var ue = UE.getEditor('content');

        var vm = new Vue({
            el: '#app',
            data:{
                goodsForm:{
                    'goods_name' : '', // 商品名称
                    'goods_desc' : '', // 商品描述
                    'goods_thumb' : '', // 商品图片
                    'picture_list' : '', // 图片列表
                    'nums' : '1', // 参团人数
                    'price' : '1', // 均价
                    'avg' : '1', // 参团人均
                    'status' : '1', // 商品状态
                    'sort' : '1', // 排序
                    'content' : '1', // 商品内容
                    'is_top' : '1', // 是否推荐
                    'discount' : '1', // 折扣
                    'sale_type' : '1', // 营销类型
                    'sale_value' : '1', // 营销展示值
                },
                options: [{
                    value: '选项1',
                    label: '黄金糕'
                }, {
                    value: '选项2',
                    label: '双皮奶'
                }],
                    activeName : 'first'
            },
            methods:{
                onSubmit(){

                },
            }
        })
    </script>
@endsection
