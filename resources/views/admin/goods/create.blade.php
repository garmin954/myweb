@extends('admin.layout.base')

@section('title')
@endsection

@section('resources')
    <!-- 引入样式 -->
    <link rel="stylesheet" href="{{ asset(ADMIN) }}/element-ui/lib/theme-chalk/index.css">
    <!-- 引入组件库 -->
    <meta name="_token" content="{{ csrf_token() }}"/>

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
        <el-form ref="goodsForm" :model="goodsForm" label-width="80px" style="max-width: 1255px">

            <el-tabs v-model="activeName" @tab-click="handleClick">
                <el-tab-pane label="商品基本信息" name="first">
                    {{--商品名称--}}
                    <el-form-item label="商品名称">
                        <el-input v-model="goodsForm.goods_name"></el-input>
                    </el-form-item>

                    {{--商品描述--}}
                    <el-form-item label="商品描述">
                        <el-input type="textarea" v-model="goodsForm.goods_desc"></el-input>
                    </el-form-item>
                    {{--参团人数--}}
                    <el-form-item label="参团人数">
                        <el-input-number v-model="goodsForm.nums" @change="handleChange" :min="1" :max="1000" label="描述文字">
                        </el-input-number>
                    </el-form-item>

                    {{--price--}}
                    <el-form-item label="均价" style="width: 300px">
                        <el-input
                                type="number"
                                placeholder="请输入均价"
                                suffix-icon="el-icon-money"
                                v-model="goodsForm.price">
                        </el-input>
                    </el-form-item>

                    {{--参团人均--}}
                    <el-form-item label="参团人均">
                        <el-input-number v-model="goodsForm.avg" @change="handleChange" :min="1" :max="10000" label="描述文字"></el-input-number>
                    </el-form-item>


                    {{--商品状态--}}
                    <el-form-item label="商品状态">
                        <el-switch
                            v-model="goodsForm.status"
                            active-value="1"
                            inactive-value="0"
                            >
                        </el-switch>
                    </el-form-item>

                    {{--参团人均--}}
                    <el-form-item label="排序">
                        <el-input-number v-model="goodsForm.sort" @change="handleChange" :min="1" :max="1000" label="描述文字"></el-input-number>
                    </el-form-item>

                    {{--是否推荐--}}
                    <el-form-item label="是否推荐">
                        <el-switch
                            v-model="goodsForm.is_top"
                            active-value="1"
                            inactive-value="0">
                        </el-switch>
                    </el-form-item>
                    {{--营销类型--}}
                    <el-form-item label="营销类型">
                        <el-select v-model="goodsForm.sale_type" placeholder="请选择">
                            <el-option
                                    v-for="(item ,index) in typeOptions"
                                    :key="item.value"
                                    :label="item.label"
                                    :value="item.value">
                            </el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item v-if="goodsForm.sale_type" label="营销值" style="width: 300px">
                        <el-input
                                placeholder="请输入营销值"
                                v-model="goodsForm.sale_value">
                        </el-input>
                    </el-form-item>

                    {{--分类--}}
                    <el-form-item label="分类">
                        <el-cascader
                                v-model="goodsForm.category_list"
                                :options="cateOptions"
                                :props="props"
                                clearable>
                        </el-cascader>
                    </el-form-item>
                </el-tab-pane>


                <el-tab-pane label="图片设置" name="second">
{{--                    商品主图--}}
                    <el-form-item label="商品主图">
                        <el-upload
                            action="{{ route('admin.upload') }}"
                            :on-success='beforeTempSuccess'
                            :headers="{'X-CSRF-TOKEN': '{{ csrf_token() }}'}"
                            list-type="picture-card"
                            :file-list="thumbItem"
                            name="file"
                            :multiple="false"
                            {{--:disabled="goodsForm.goods_thumb != ''"--}}
                            :limit="1"
                            >
                            <i slot="default" class="el-icon-plus"></i>
                            <div slot="file" slot-scope="{file}">
                                <img :src="file.url" alt="" class="el-upload-list__item-thumbnail" >
                            </div>
                        </el-upload>
                    </el-form-item>

{{--                    商品副图--}}
                    <el-form-item label="商品副图">
                        <el-upload
                                action="{{ route('admin.upload') }}"
                                :file-list="thumbList"
                                :on-success='beforeListSuccess'
                                :headers="{'X-CSRF-TOKEN': '{{ csrf_token() }}'}"
                                list-type="picture-card"
                                name="file"
                                :before-remove='finishRemoveFun'
                                :multiple="false"
                                >
                            <i slot="default" class="el-icon-plus"></i>
                            <div slot="file" slot-scope="{file}">
                                <img :src="file.url" alt="" class="el-upload-list__item-thumbnail" >
                            </div>
                        </el-upload>
                        <el-dialog :visible.sync="dialogVisible">
                            <img width="100%" :src="dialogImageUrl" alt="">
                        </el-dialog>
                    </el-form-item>
                </el-tab-pane>

                <el-tab-pane label="内容" name="third">
                    <div style="padding-right: 1px;width: 1250px;border: 1px solid grey;box-sizing: content-box;">
                    <textarea  id="content" v-model="goodsForm.content" type="text/plain"></textarea>
                    </div>
                </el-tab-pane>
            </el-tabs>



            <el-form-item style="margin-top: 50px">
                <el-button type="primary" @click="onSubmit">立即创建</el-button>
                <el-button>取消</el-button>
            </el-form-item>
        </el-form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset(ADMIN) }}/js/vue.js"></script>
    <script src="{{ asset(ADMIN) }}/element-ui/lib/index.js"></script>
    <script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.js"></script>

    <script type="text/javascript" charset="utf-8" src="{{ asset(VENDOR) }}/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset(VENDOR) }}/ueditor/ueditor.all.js"> </script>
    {{--<script src="stylesheet" href="{{ asset(ADMIN) }}/js/axios.min.js"></script>--}}
    <script>
        var ueditor =UE.getEditor('content', {
        });
        ueditor.ready(function() {
            ueditor.setHeight(600);
            //设置编辑器的内容
            // ue.setContent('hello');
            // //获取html内容，返回: <p>hello</p>
            // var html = ue.getContent();
            // //获取纯文本内容，返回: hello
            // var txt = ue.getContentTxt();
        });


        var goods_id = "{{ request()->get('id') }}";
        var vm = new Vue({
            el: '#app',
            data:{
                goodsForm:{
                    'goods_id' : goods_id ? goods_id :'',
                    'goods_name' : '', // 商品名称
                    'goods_desc' : '', // 商品描述
                    'goods_thumb' : '', // 商品图片
                    'picture_list' : [], // 图片列表
                    'category_list' : [],
                    'nums' : '1', // 参团人数
                    'price' : '1', // 均价
                    'avg' : '1', // 参团人均
                    'status' : '1', // 商品状态
                    'sort' : '50', // 排序
                    'content' : '1', // 商品内容
                    'is_top' : '0', // 是否推荐
                    'sale_type' : '1', // 营销类型
                    'sale_value' : '1', // 营销展示值
                },
                value:'',
                dialogVisible:false,
                props: { multiple: true },
                cateOptions:  [], // 分类
                typeOptions:[], // 类型
                thumbList:[], // 相册
                thumbItem:[], // 相册
                activeName : 'first' // 当前tab
            },
            created(){
                this.getGoodsRelated();
            },
            methods:{
                getGoodsRelated(){
                    let self = this;
                    let url = "{{ route('admin.goods.getGoodsRelated') }}";
                    let params = {goods_id: goods_id};
                    axios.post(url, params).then(respond => {
                        res = respond.data;
                        if (res.code > 0){
                            self.cateOptions = res.data.cate_list
                            self.typeOptions = Object.keys(res.data.type_list).map((key)=>({
                                label: res.data.type_list[key],
                                value: key
                            }));

                            // 基本信息
                            if (self.goodsForm.goods_id != '' && parseInt(self.goodsForm.goods_id) > 0){
                                self.goodsForm.goods_id = res.data.info.goods_id;
                                self.goodsForm.category_list = res.data.info.category_list;
                                self.goodsForm.goods_id=res.data.info.goods_id;
                                self.goodsForm.goods_name=res.data.info.goods_name;
                                self.goodsForm.goods_desc=res.data.info.goods_desc;
                                self.goodsForm.goods_thumb=res.data.info.goods_thumb;
                                self.goodsForm.picture_list = res.data.info.picture_list.split(',');
                                self.goodsForm.category_list=res.data.info.category_list;
                                self.goodsForm.nums=res.data.info.nums;
                                self.goodsForm.price=res.data.info.price;
                                self.goodsForm.avg=res.data.info.avg;
                                self.goodsForm.status=res.data.info.status.toString();
                                self.goodsForm.sort=res.data.info.sort;
                                self.goodsForm.is_top=res.data.info.is_top.toString();
                                self.goodsForm.sale_type=res.data.info.sale_type.toString();
                                self.goodsForm.sale_value=res.data.info.sale_value;
                                self.goodsForm.content=res.data.info.content;
                                setTimeout(function () {
                                    ueditor.setContent(res.data.info.content)
                                },1000)
                               self.thumbList = self.goodsForm.picture_list.map((item)=>({
                                   name:'',
                                   url:item,
                                }));
                                if (self.goodsForm.goods_thumb){
                                    self.thumbItem = [{name:'',url:self.goodsForm.goods_thumb}]
                                }
                                self.$forceUpdate();
                            }
                        }else{
                            layer.msg('获取异常');
                        }
                    }).catch((e)=>{
                        layer.msg('获取异常'+e);
                    })
                },
                // 添加图片
                beforeTempSuccess(response, file, fileList){
                    this.goodsForm.goods_thumb = response.data;
                    self.thumbItem = [{name:'',url:response.data}]
                },
                beforeListSuccess(response, file, fileList){
                    this.thumbList.push({name:'',url:response.data});
                    this.goodsForm.picture_list.push(response.data);
                },
                // 删除图片
                finishRemoveFun(file, fileList){
                    console.log(file);
                    this.goodsForm.picture_list.forEach((item, index)=>{
                        if (file.url == item) {
                            this.goodsForm.picture_list.splice(index, 1)
                        }
                    })
                },
                onSubmit(){
                    let params = JSON.parse(JSON.stringify(this.goodsForm));
                    params.content = ueditor.getContent();
                    //监听提交
                    let index = parent.layer.getFrameIndex(window.name);
                    let url = "{{ route('admin.goods.create') }}";
                    axios.post(url, params).then(respond => {
                        res = respond.data;
                        if (res.code > 0){
                            layer.msg(res.msg,{icon:1,shade:0.5,anim:6});
                            setTimeout(function () {
                                parent.layer.close(index);
                                window.parent.location.reload();//刷新父页面
                            }, 2000)
                        }else{
                            layer.msg(res.msg);
                        }
                    }).catch((e)=>{
                        layer.msg('提交异常'+e);
                    });
                    console.log(this.goodsForm);
                },
                handleChange(){

                },
                handleClick(){

                },

                dialogImageUrl(){

                }
            }
        })

    </script>
@endsection
