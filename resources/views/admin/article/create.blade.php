@extends('admin.layout.base')

@section('title')
@endsection

@section('resources')
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ asset(ADMIN) }}/element-ui/lib/theme-chalk/index.css">
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
            width: 78px;
            height: 78px;
            line-height: 78px;
            text-align: center;
        }
        .avatar {
            width: 78px;
            height: 78px;
            display: block;
        }
    </style>
@endsection

@section('container')
    <div id="app">
        <el-form ref="forms"  :rules="rules" :model="forms" label-width="80px" >
            <template>
                <el-tabs v-model="activeName" >
                    <el-tab-pane label="基本设置" name="first">

                        <el-form-item label="文章名称"  prop="title">
                            <el-input v-model="forms.title"></el-input>
                        </el-form-item>

                        <el-form-item label="描述"  prop="title">
                            <el-input type="textarea" v-model="forms.article_desc"></el-input>
                        </el-form-item>


                        <el-form-item label="所属类型" prop="category_id">
                            <el-select v-model="forms.category_id" placeholder="请选择所属类型">
                                <el-option v-for="cate in cateList" :label="cate.category_name" :value="cate.category_id"></el-option>
                            </el-select>
                        </el-form-item>

                        <el-form-item label="图片上传" >
                            <el-upload
                                action="{{ route('admin.upload') }}"
                                :on-success='handleSuccess'
                                :headers="{'X-CSRF-TOKEN': '{{ csrf_token() }}'}"
                                list-type="picture-card"
                                :file-list="thumbItem"
                                name="file"
                                :multiple="false"
                                :limit="1">
                                <i slot="default" class="el-icon-plus"></i>
                                <div slot="file" slot-scope="{file}">
                                    <img :src="file.url" alt="" class="el-upload-list__item-thumbnail" >
                                </div>
                            </el-upload>
                        </el-form-item>


                        <el-form-item label="排序" style="width: 200px">
                            <el-input type="number" v-model="forms.sort" min="1" max="127"></el-input>
                        </el-form-item>
                        <el-form-item label="推荐">
                            <el-switch v-model="forms.is_top"  active-value="1" inactive-value="0"></el-switch>
                        </el-form-item>

                        <el-form-item label="状态">
                            <el-switch v-model="forms.status"  active-value="1" inactive-value="0"></el-switch>
                        </el-form-item>

                    </el-tab-pane>
                    <el-tab-pane label="内容" name="second">
                        <textarea  id="content" v-model="forms.content" type="text/plain"></textarea>
                    </el-tab-pane>

                </el-tabs>
            </template>



            <el-form-item>
                <el-button type="primary" @click="onSubmit('forms')">立即创建</el-button>
                <el-button @click="resetForm('forms')">重置</el-button>
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

        var id = "{{ request()->get('id') }}";
        var vm = new Vue({
            el: '#app',
            data :{
                forms: {
                    art_id: id ? id : 0,
                    title: '',
                    article_desc: '',
                    category_id: {{request()->get('cate_id', '')}},
                    thumb: '',
                    is_top: '1',
                    sort: '50',
                    status: '1',
                    content:'内容'
                },
                rules: {
                    title: [
                        { required: true, message: '请输入广告名称', trigger: 'blur' },
                        { min: 2, max: 15, message: '长度在 2 到 15 个字符', trigger: 'blur' }
                    ],
                    category_id: [
                        { required: true, message: '请选择广告类型', trigger: 'change' }
                    ],

                },
                thumbItem:[], // 相册
                cateList:[],
                activeName : 'first'

            },
            created(){
                this.getInitialData();
            },
            methods:{
                getInitialData(){
                    let self = this;
                    axios.post("{{ route('admin.article.getInitialData') }}", {id: self.forms.art_id}).then(respond=>{
                        let res = respond.data;
                        if (res.code > 0){
                            self.cateList = res.data.cate_list;

                            if (self.forms.art_id) {
                                self.forms.art_id =  res.data.info.art_id

                                self.forms.title =  res.data.info.title
                                self.forms.article_desc =  res.data.info.article_desc
                                self.forms.thumb =  res.data.info.thumb
                                self.forms.sort =  res.data.info.sort
                                self.forms.is_top =  res.data.info.is_top.toString()
                                self.forms.category_id =  res.data.info.category_id
                                self.forms.status =  res.data.info.status.toString();
                                if (self.forms.thumb){
                                    self.thumbItem = [{name:'',url:self.forms.thumb}]
                                }
                                self.forms.content =  res.data.info.content

                                if(self.forms.content){
                                    setTimeout(function () {
                                        ueditor.setContent(res.data.info.content)
                                    },1000)
                                }

                            }
                        } else {
                            layer.msg(res.msg);
                        }
                    }).catch(e=>{
                        layer.msg('获取异常'+ e);
                    })
                },
                onSubmit(form) {
                    let self = this;
                    let index = parent.layer.getFrameIndex(window.name);
                    this.$refs[form].validate((valid) => {
                        self.forms.content =  ueditor.getContent();
                        if (valid) {
                            axios.post("{{ route('admin.article.create') }}", self.forms).then(respond=>{
                                let res = respond.data;
                                if (res.code > 0){
                                    layer.msg(res.msg, {shade:0.5, icon:1, anim:6});
                                    window.parent.location.reload();//刷新父页面
                                    // parent.layer.close(index);
                                } else {
                                    layer.msg(res.msg);
                                }
                            }).catch(e=>{
                                layer.msg('获取异常'+ e);
                            })
                        } else {
                            console.log('error submit!!');
                            return false;
                        }
                    });
                },
                resetForm(formName) {
                    this.$refs[formName].resetFields();
                },
                // 添加图片
                handleSuccess(response, file, fileList){
                    this.forms.thumb = response.data;
                    self.thumbItem = [{name:'',url:response.data}]
                }
                ,deleteUpload(){

                }
            },


        })
    </script>
@endsection
