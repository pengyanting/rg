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
                    <el-form-item label="题目"
                                  prop="title">
                        <el-input v-model="addData.title"
                                  auto-complete="off"
                                  placeholder="试题名称"></el-input>
                    </el-form-item>
                    <el-form-item label="试题类型："
                                  prop="type">
                        <el-radio-group v-model="addData.type">
                            <el-radio label="客观题">客观题</el-radio>
                            <el-radio label="主观题">主观题</el-radio>
                        </el-radio-group>
                    </el-form-item>
                    <el-form-item label="答案"
                                  prop="answer">
                        <el-input v-model="addData.answer"
                                  auto-complete="off"
                                  placeholder="答案"></el-input>
                    </el-form-item>
    
                    <el-form-item label="选项一"
                                  prop="sel1">
                        <el-input v-model="addData.sel1"
                                  auto-complete="off"
                                  placeholder="选项一"></el-input>
                    </el-form-item>
                    <el-form-item label="选项二"
                                  prop="sel2">
                        <el-input v-model="addData.sel2"
                                  auto-complete="off"
                                  placeholder="选项二"></el-input>
                    </el-form-item>
                    <el-form-item label="选项三"
                                  prop="sel3">
                        <el-input v-model="addData.sel3"
                                  auto-complete="off"
                                  placeholder="选项三"></el-input>
                    </el-form-item>
                    <el-form-item label="选项四"
                                  prop="sel4">
                        <el-input v-model="addData.sel4"
                                  auto-complete="off"
                                  placeholder="选项四"></el-input>
                    </el-form-item>
                    <el-form-item label="任务名称"
                                  prop="task">
                        <el-select v-model="addData.task"
                                   placeholder="请选择任务名称">
                            <el-option v-for="item in taskList"
                                       :label="item.title"
                                       :value="item.id+'-'+item.title+'-'+item.num">
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
                answer: '',
                sel1: '',
                sel2: '',
                sel3: '',
                sel4: '',
                task: '',
                type: '客观题'
            },
            taskList: [],
            addRule: {
                title: [{
                    required: true,
                    message: '请输入题目',
                    trigger: 'blur'
                }],
                answer: [{
                    required: true,
                    message: '请输入答案',
                    trigger: 'blur'
                }],
                task: [{
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
            axios.post(this.$root._data.apiUrl + "manage/selecttasklist.php",qs.stringify({
                sql:'select * from tasklist'
            })).then(function (res) {
                    console.log(res.data)
                    if (res.data.length > 0) {
                        vm.taskList = res.data;
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
                    axios.post(this.$root._data.apiUrl + "manage/addtest.php", qs.stringify({
                        title: vm.addData.title ? vm.addData.title : '',
                        answer: vm.addData.answer ? vm.addData.answer : '',
                        sel1: vm.addData.sel2 ? vm.addData.sel1 : '',
                        sel2: vm.addData.sel3 ? vm.addData.sel2 : '',
                        sel3: vm.addData.sel4 ? vm.addData.sel3 : '',
                        sel4: vm.addData.sel4 ? vm.addData.sel4 : '',
                        taskid: vm.addData.task.split("-")[0],
                        time: this.getTime(),
                        tasktitle: vm.addData.task.split("-")[1],
                        type:vm.addData.type,
                        num:parseInt(vm.addData.task.split("-")[2])+1
                    })).then(function (res) {
                        console.log(res.data)
                        if (res.data == 1) {
                            vm.$message({
                                message: '试题创建成功！',
                                type: 'success'
                            });
                            vm.$refs.addData.resetFields();
                            vm.$router.push({ path: '/task/testList.php' })
                        } else {
                            vm.$message({
                                message: '试题创建失败',
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
