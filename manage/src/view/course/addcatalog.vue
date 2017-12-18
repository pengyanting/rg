<template>
    <el-row>
        <!--课程-->
        <el-row :gutter="20">
            <el-col :span="17"
                    :offset="4">
                <el-form :model="addData"
                         :rules="addRule"
                         ref="addData"
                         :label-width="'100px'">
                    <el-form-item label="一级目录"
                                  prop="title">
                        <el-input v-model="addData.title"
                                  auto-complete="off"
                                  placeholder="一级目录"></el-input>
                    </el-form-item>
                    <el-form-item label="二级目录"
                                  prop="content">
                        <el-input v-model="addData.content"
                                  auto-complete="off"
                                  placeholder="二级目录"></el-input>
                    </el-form-item>
                    <el-form-item label="视频地址"
                                  prop="videourl">
                        <el-input v-model="addData.videourl"
                                  auto-complete="off"
                                  placeholder="视频地址"></el-input>
                    </el-form-item>
                    <el-form-item label="课程名称"
                                  prop="course">
                        <el-select v-model="addData.course"
                                   placeholder="请选择课程">
                            <el-option v-for="item in courseList"
                                       :label="item.title"
                                       :value="item.id+'-'+item.title">
                            </el-option>
                        </el-select>
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
                videourl: '',
                content: '',
                course: []
            },
            courseList: [],
            addRule: {
                title: [{
                    required: true,
                    message: '请输入一级目录名称',
                    trigger: 'blur'
                }],
                videourl: [{
                    required: true,
                    message: '请输入视频地址',
                    trigger: 'blur'
                }],
                content: [{
                    required: true,
                    message: '请输入二级目录名称',
                    trigger: 'blur'
                }]
            },

        }
    },
    mounted: function () {
        this.searchCourse();
    },
    methods: {
        searchCourse() {
            var vm = this;
            axios.post(this.$root._data.apiUrl +"manage/selectcourse.php",qs.stringify({
               sql:"select * from courses"
            })).then(function (res) {
                    if (res.data.length > 0) {
                        vm.courseList = res.data;
                    }
                }).catch(function (error) {
                    console.log(error)
                })
        },
        showPreviews(e) {
            this.addData.imgurl = e;
        },
        handleReset() {
            this.$refs.addData.resetFields();
        },
        addConfirm() {
            var vm = this;
            vm.$refs.addData.validate((valid) => {
                if (valid) {
                    axios.post(this.$root._data.apiUrl + "manage/addcatalog.php", qs.stringify({
                        title: vm.addData.title ? vm.addData.title : '',
                        videourl: vm.addData.videourl ? vm.addData.videourl : '',
                        content: vm.addData.content ? vm.addData.content : '',
                        courseid: vm.addData.course.split("-")[0],
                        coursetitle: vm.addData.course.split("-")[1],
                        time: this.getTime()
                    })).then(function (res) {
                        console.log(res.data)
                        if (res.data == 1) {
                            vm.$message({
                                message: '目录创建成功！',
                                type: 'success'
                            });
                            vm.$refs.addData.resetFields();
                            vm.$router.push({
                                path: '/course/selectCatalog.php'

                            })
                        } else {
                            vm.$message({
                                message: '目录创建失败',
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
        },
        getTime() {
            //获取当前时间
            var date = new Date();
            var seperator1 = "-";
            var seperator2 = ":";
            var month = date.getMonth() + 1;
            var strDate = date.getDate();
            if (month >= 1 && month <= 9) {
                month = "0" + month;
            }
            if (strDate >= 0 && strDate <= 9) {
                strDate = "0" + strDate;
            }
            var currentdate = date.getFullYear() + seperator1 + month +

                seperator1 + strDate;
            return currentdate;
        }
    },
    components: {
        upload
    }
}
</script>
<style lang="sass" rel="stylesheet/scss">
 
</style>
