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
                    <el-form-item label="任务名称"
                                  prop="title">
                        <el-input v-model="addData.title"
                                  auto-complete="off"
                                  placeholder="任务名称"></el-input>
                    </el-form-item>
                    <el-form-item label="任务类型"
                                  prop="type">
                        <el-select v-model="addData.type"
                                   placeholder="请选择任务类型">
                            <el-option v-for="item in typeList"
                                       :label="item.label"
                                       :value="item.value">
                            </el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item label="任务描述"
                                  prop="descript">
                        <textarea v-model='addData.descript'
                                  placeholder="任务描述"></textarea>
                    </el-form-item>
                    <el-form-item label="课程名称"
                                  prop="courseid">
                        <el-select v-model="addData.courseid"
                                   placeholder="请选择课程名称">
                            <el-option v-for="item in courseList"
                                       :label="item.title"
                                       :value="item.id+'+'+item.title">
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
                type: '',
                direction: '',
                status: '',
                courseid: ''
            },
            typeList: [
                {
                    value: '随堂测试',
                    label: '随堂测试'
                }, {
                    value: '结课训练',
                    label: '结课训练'
                }],
            courseList: [],
            addRule: {
                title: [{
                    required: true,
                    message: '请输入任务名称',
                    trigger: 'blur'
                }],
                type: [{
                    required: true,
                    message: '请选择任务类型',
                    trigger: 'blur'
                }],
                status: [{
                    required: true,
                    message: '请选择任务状态',
                    trigger: 'blur'
                }],
                descript: [{
                    required: true,
                    message: '请输入对课程的描述',
                    trigger: 'blur'
                }],
                courseid: [{
                    required: true,
                    message: '请选择课程',
                    trigger: 'blur'
                }],
            },

        }
    },
    mounted: function () {
        this.searchCourse();
    },
    methods: {
        searchCourse() {
            var vm = this;
            axios.post(this.$root._data.apiUrl + "manage/selectcourse.php",qs.stringify({
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
                    axios.post(this.$root._data.apiUrl + "manage/addtask.php", qs.stringify({
                        title: vm.addData.title ? vm.addData.title : '',
                        type: vm.addData.type ? vm.addData.type : '',
                        descript: vm.addData.descript,
                        courseid: vm.addData.courseid.split("+")[0],
                        time:this.getTime(),
                        coursetitle:vm.addData.courseid.split("+")[1]
                    })).then(function (res) {
                        console.log(res.data)
                        if (res.data == 1) {
                            vm.$message({
                                message: '任务创建成功！',
                                type: 'success'
                            });
                            vm.$refs.addData.resetFields();
                            vm.$router.push({ path: '/task/selectTask.php' })
                        } else {
                            vm.$message({
                                message: '任务创建失败',
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
            var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate;
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
