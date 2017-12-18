<template>
    <el-row>
        <!--新建-->
        <el-row :gutter="20">
            <el-col :span="17"
                    :offset="4">
                <el-form :model="addData"
                         :rules="addRule"
                         ref="addData"
                         :label-width="'100px'">
                    <el-form-item label="课程名称"
                                  prop="title">
                        <el-input v-model="addData.title"
                                  auto-complete="off"
                                  placeholder="课程名称"></el-input>
                    </el-form-item>
                    <el-form-item label="主讲教师"
                                  prop="teacher">
                        <el-input v-model="addData.teacher"
                                  auto-complete="off"
                                  placeholder="主讲教师"></el-input>
                    </el-form-item>
                    <el-form-item label="课程类型"
                                  prop="type">
                        <el-select v-model="addData.type"
                                   placeholder="请选择课程类型">
                            <el-option v-for="item in typeList"
                                       :label="item.label"
                                       :value="item.value">
                            </el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item label="课程方向"
                                  :label-width="'100px'"
                                  prop="direction">
                        <el-select v-model="addData.direction"
                                   placeholder="请选择课程类型">
                            <el-option v-for="item in direList"
                                       :label="item.label"
                                       :value="item.value">
                            </el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item label="课程描述"
                                  prop="descript">
                        <textarea v-model='addData.descript'
                                  placeholder="课程描述"></textarea>
                    </el-form-item>
                    <el-form-item label="课程图片"
                                  prop="imgurl">
                        <upload v-on:showPreview="showPreviews"
                                :message="addData.imgurl"></upload>
                    </el-form-item>
                </el-form>
            </el-col>
        </el-row>
        <el-button type="primary"
                   @click="addConfirm">立即创建</el-button>
    </el-row>
</template>
<script>
import axios from "axios"
var qs = require('querystring');
import upload from "../../components/Upload.vue"
export default {
    data() {
        return {
            addData: {
                title: '',
                teacher: '',
                type: '',
                direction: '',
                descript: '',
                examtype: '在线考核',
                imgurl: '',
            },
            typeList: [
                {
                    value: '全部',
                    label: '全部'
                }, {
                    value: '基础',
                    label: '基础'
                }, {
                    value: '中级',
                    label: '中级'
                }, {
                    value: '高级',
                    label: '高级'
                }, {
                    value: '实战案例',
                    label: '实战案例'
                }, {
                    value: '工具软件',
                    label: '工具软件'
                }],
            direList: [
                {
                    value: "全部",
                    label: "全部"
                }, {
                    value: "可视化编程",
                    label: "可视化编程"
                }, {
                    value: "web应用程序设计",
                    label: "web应用程序设计",
                }, {
                    value: "软件测试",
                    label: "软件测试",
                }, {
                    value: '数据库管理',
                    label: '数据库管理'
                }, {
                    value: '图形图像制作',
                    label: '图形图像制作'
                }, {
                    value: '网络构建技术',
                    label: '网络构建技术'
                }, {
                    value: '网络系统管理',
                    label: '网络系统管理'
                }, {
                    value: '多媒体制作',
                    label: '多媒体制作'
                }, {
                    value: '计算机办公应用',
                    label: '计算机办公应用'
                }],
            examtypeList: [
                {
                    label: '在线考核',
                    value: '在线考核'
                }
            ],
            addRule: {
                title: [{
                    required: true,
                    message: '请输入课程名称',
                    trigger: 'blur'
                }],
                teacher: [{
                    required: true,
                    message: '请输入主讲教师',
                    trigger: 'blur'
                }],
                type: [{
                    required: true,
                    message: '请选择课程类型',
                    trigger: 'blur'
                }],
                direction: [{
                    required: true,
                    message: '请选择课程方向',
                    trigger: 'blur'
                }],
                descript: [{
                    required: true,
                    message: '请输入对课程的描述',
                    trigger: 'blur'
                }],
                examtype: [{
                    required: true,
                    message: '请选择考核方式',
                    trigger: 'blur'
                }],
                imgurl: [{
                    required: true,
                    message: '请选择课程图片',
                    trigger: 'blur'
                }],
            },
         
        }
    },
    mounted: function () {
    },
    methods: {
        showPreviews(e) {
            this.addData.imgurl = e;
        },
        handleReset() {
            this.$refs.formInline.resetFields();
        },
        addConfirm() {
            var vm = this;
            vm.addData.imgurl =  vm.addData.imgurl.replace('C:\\fakepath\\', 'img/course/')
            vm.$refs.addData.validate((valid) => {
                if (valid) {
                    axios.post(this.$root._data.apiUrl+"manage/addcourse.php", qs.stringify({
                       title:vm.addData.title?vm.addData.title:'',
                       teacher:vm.addData.teacher?vm.addData.teacher:'',
                       type:vm.addData.type?vm.addData.type:'',
                       direction:vm.addData.direction?vm.addData.direction:'',
                       descript:vm.addData.descript,
                       examtype:vm.addData.examtype,
                       imgurl:vm.addData.imgurl
                    })).then(function (res) {
                        console.log(res.data)
                        if (res.data == 1) {
                            vm.$message({
                                message: '课程添加成功！',
                                type: 'success'
                            });
                            vm.$refs.addData.resetFields();
                            vm.$router.push({path:'/course/selectCourse.php'})
                        } else {
                            vm.$message({
                                message: '课程添加失败',
                                type: 'error'
                            });
                        }
                    }).catch(function (error) {
                        console.log(error);
                    })
                } else {
                    console.log('error submit!!');
                    return false
                }
            });

        }
    },
    components:{
        upload
    }
}
</script>
<style lang="sass" rel="stylesheet/scss">
 
</style>
