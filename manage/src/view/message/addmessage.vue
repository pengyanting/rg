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
                    <el-form-item label="消息名称"
                                  prop="title">
                        <el-input v-model="addData.title"
                                  auto-complete="off"
                                  placeholder="消息名称"></el-input>
                    </el-form-item>
                    <el-form-item label="消息类型"
                                  prop="type">
                        <el-select v-model="addData.type"
                                   placeholder="请选择消息类型">
                            <el-option v-for="item in typeList"
                                       :label="item.label"
                                       :value="item.value">
                            </el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item label="消息内容"
                                  prop="content">
                        <textarea v-model='addData.content'
                                  placeholder="消息内容"></textarea>
                    </el-form-item>
                    <el-form-item label="发送对象"
                                  prop="user">
                        <el-select v-model="addData.user"
                                   placeholder="请选择发送对象"
                                   multiple>
                            <el-option v-for="item in userList"
                                       :label="item.username"
                                       :value="item.id+'-'+item.username">
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
                content: '',
                user: []
            },
            typeList: [
                {
                    value: '课程消息',
                    label: '课程消息'
                }, {
                    value: '系统消息',
                    label: '系统消息'
                }, {
                    value: '其他消息',
                    label: '其他消息'
                }],
            userList: [],
            addRule: {
                title: [{
                    required: true,
                    message: '请输入消息名称',
                    trigger: 'blur'
                }],
                type: [{
                    required: true,
                    message: '请选择消息类型',
                    trigger: 'blur'
                }],
                content: [{
                    required: true,
                    message: '请输入消息内容',
                    trigger: 'blur'
                }]
            },

        }
    },
    mounted: function () {
        this.searchUser();
    },
    methods: {
        searchUser() {
            var vm = this;
            axios.post(this.$root._data.apiUrl +"manage/selectuser.php",qs.stringify({
              sql:"select * from users"
            })).then(function (res) {
                    console.log(res.data)
                    if (res.data.length > 0) {
                        vm.userList = res.data;
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
            console.log(this.addData.user)
            var idArr=[];
            var nameArr=[];
            var user=this.addData.user;
            for(var i=0;i<user.length;i++){
                idArr.push(user[i].split("-")[0])
                nameArr.push(user[i].split("-")[1])
            }
            vm.$refs.addData.validate((valid) => {
                if (valid) {
                    axios.post(this.$root._data.apiUrl +"manage/addmessage.php", qs.stringify({
                            title: vm.addData.title ? vm.addData.title : '',
                            type: vm.addData.type ? vm.addData.type : '',
                            content: vm.addData.content ? vm.addData.content:'',
                            userid: idArr.toString(),
                            username: nameArr.toString(),
                            time: this.getTime()
                        })).then(function (res) {
                            console.log(res.data)
                            if (res.data == 1) {
                                vm.$message({
                                    message: '消息创建成功！',
                                    type: 'success'
                                });
                                vm.$refs.addData.resetFields();
                                vm.$router.push({
                                    path: '/message/selectMessage.php'

                                })
                            } else {
                                vm.$message({
                                    message: '消息创建失败',
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
