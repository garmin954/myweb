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
            <el-form-item label="广告名称"  prop="adv_name">
                <el-input v-model="forms.adv_name"></el-input>
            </el-form-item>
            <el-form-item label="广告类型" prop="type_id">
                <el-select v-model="forms.type_id" placeholder="请选择活动区域">
                    <el-option v-for="type in typeList" :label="type.type_name" :value="type.type_id"></el-option>
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

            <el-form-item label="链接" prop="link">
                <el-input v-model="forms.link"></el-input>
            </el-form-item>

            <el-form-item label="排序">
                <el-input v-model="forms.sort" min="1" max="127"></el-input>
            </el-form-item>

            <el-form-item label="状态">
                <el-switch v-model="forms.status"  active-value="1" inactive-value="0"></el-switch>
            </el-form-item>

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
    <script>
        var id = "{{ request()->get('id') }}";
        var vm = new Vue({
            el: '#app',
            data :{
                forms: {
                    adv_id: id ? id : 0,
                    adv_name: '',
                    type_id: '',
                    thumb: '',
                    link: 'http://',
                    sort: '50',
                    status: '1',
                },
                rules: {
                    adv_name: [
                        { required: true, message: '请输入广告名称', trigger: 'blur' },
                        { min: 2, max: 15, message: '长度在 2 到 15 个字符', trigger: 'blur' }
                    ],
                    type_id: [
                        { required: true, message: '请选择广告类型', trigger: 'change' }
                    ],
                    link: [
                        { type: 'url', required: true, message: '请填写正确的链接', trigger: 'change' }
                    ],
                },
                thumbItem:[], // 相册
                typeList:[],

            },
            created(){
                this.getInitialData();
            },
            methods:{
                getInitialData(){
                    let self = this;
                    axios.post("{{ route('admin.advertise.getInitialData') }}", {id: self.forms.adv_id}).then(respond=>{
                        let res = respond.data;
                        if (res.code > 0){
                            self.typeList = res.data.adv_type_list;

                            if (self.forms.adv_id) {
                                self.forms.adv_id =  res.data.info.adv_id
                                self.forms.adv_name =  res.data.info.adv_name
                                self.forms.thumb =  res.data.info.thumb
                                self.forms.link =  res.data.info.link
                                self.forms.sort =  res.data.info.sort
                                self.forms.type_id =  res.data.info.type_id
                                self.forms.status =  res.data.info.status.toString();

                                if (self.forms.thumb){
                                    self.thumbItem = [{name:'',url:self.forms.thumb}]
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
                        console.log(valid);
                        if (valid) {
                            axios.post("{{ route('admin.advertise.create') }}", self.forms).then(respond=>{
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
