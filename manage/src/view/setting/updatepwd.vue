<!--商户通对象维护-->
<template>
    <el-row>
        <!--查询-->
        <el-col :span="24"
                class="toolbar">
            <el-form :model="pass"
                     :label-width="'100px'"
                     ref="pass"
                     :rules="loginRule">
                <el-form-item label="原始密码："
                              prop="old">
                    <el-input v-model="pass.old"
                              auto-complete="off"
                              placeholder="请输入原始密码"></el-input>
                </el-form-item>
                <el-form-item label="新密码："
                              prop="new">
                    <el-input v-model="pass.new"
                              auto-complete="off"
                              type="password"
                              placeholder="请输入新密码"></el-input>
                </el-form-item>
                <el-form-item label="确认密码："
                              prop="pass">
                    <el-input v-model="pass.pass"
                              auto-complete="off"
                              type="password"
                              placeholder="请再次输入新密码"></el-input>
                </el-form-item>
                <el-button type="primary"
                           @click.native="updateConfirm">确定修改</el-button>
            </el-form>
        </el-col>
    </el-row>
</template>
<script>
import axios from "axios"
var qs = require('querystring');
export default {
    data() {
        var samePassword = (rule, value, callback) => {
            if (value != this.pass.new) {
                callback(new Error('两次输入的密码不一致！'))
            } else {
                callback();
            }
        }
        return {
            pass: {
                old: '',
                new: '',
                pass: ''
            },
            loginRule: {
                old: [
                    {
                        required: true,
                        message: '请输入原始密码',
                        trigger: 'blur'
                    }
                ],
                new: [
                    {
                        required: true,
                        message: '请输入新密码',
                        trigger: 'blur'
                    }
                ],
                pass: [
                    {
                        required: true,
                        message: '请再次输入新密码',
                        trigger: 'blur'
                    }, {
                        validator: samePassword
                    }
                ]
            }
        }
    },
    mounted: function () {
    },
    methods: {
        updateConfirm() {
            var vm = this;
            vm.$refs.pass.validate(valid => {
                if (valid) {
                    axios.post(this.$root._data.apiUrl + "/upPwd.php", qs.stringify({
                        password: vm.pass.new,
                        id: localStorage.getItem('managerid')
                    })).then(res => {
                        console.log(res)
                        if (res.data == '1') {
                            vm.$message({
                                message: '修改成功，请重新登录',
                                type: 'success'
                            })
                            localStorage.setItem('managername', '')
                            localStorage.setItem('title', '首页')
                            localStorage.setItem('managerid', '')
                            vm.$router.push({ path: '/login.php' });
                        } else {
                            vm.$message({
                                message: '修改失败',
                                type: 'error'
                            })
                        }
                    }).catch(error => {
                        vm.$message({
                            message: '修改失败',
                            type: 'error'
                        })
                    })
                }
            })
        },
    }
}
</script>
