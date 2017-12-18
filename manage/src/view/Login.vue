<template>
    <div class="login">
        <el-row :gutter="20" style="margin:0">
            <el-col :span="6" :offset="9">
                <h1 class="title">软件类课程智能云课堂</h1>
                <div class="box">
                <h1 style="margin: 0;text-align: center;font-size: 24px;margin-bottom: 20px;font-family: '微软雅黑';font-weight: normal;color: #666;">后台登录</h1>
                    <el-form :model="loginForm" :rules="loginRule" ref="loginForm" class="login-ruleForm">
                        <el-form-item prop="loginName" class="icon-input">
                            <el-input placeholder="用户名" v-model="loginForm.loginName"></el-input>
                            <span class="iconfonts icon-user"></span>
                        </el-form-item>
                        <el-form-item prop="passWord" class="icon-input">
                            <el-input type="password" placeholder="密码" v-model="loginForm.passWord"></el-input>
                            <span class="iconfonts icon-pass"></span>
                        </el-form-item>
                        <el-form-item >
                            <el-checkbox v-model="checked">记住密码</el-checkbox>
                            <span class="reset" @click="handleReset">重置</span>
                        </el-form-item>
                        <el-form-item class="login-btn">
                            <el-button type="primary" @click.native.prevent="handleSubmit">登录</el-button>
                        </el-form-item>
                    </el-form>
                </div>
            </el-col>
        </el-row>
    </div>
</template>
<script>
    import axios from 'axios'
    var qs = require('querystring');
    import {save} from '../store/getters'

    export default {
        data () {
            return {
                checked: false,
                loginForm: {
                    loginName: '',
                    passWord: '',
                    authcode: ''
                },
                menuData:[],
                loginRule: {
                    loginName: [{
                        required: true,
                        message: '请输入用户名',
                        trigger: 'change'
                    }],
                    passWord: [{
                        required: true,
                        message: '请输入密码',
                        trigger: 'change'
                    }]
                }
            }
        },
        methods: {
            handleSubmit (ev) {
                var vm=this;
                this.$refs.loginForm.validate((valid) => {
                    if (valid) {
                        var vm=this;
                       axios.post(this.$root._data.apiUrl+'login.php',qs.stringify({
                           userName:vm.loginForm.loginName,
                           password:vm.loginForm.passWord
                       })).then(res=>{
                           console.log(res.data)
                           if(res.data){
                               localStorage.setItem('managername', this.loginForm.loginName);
                               localStorage.setItem('managerid', res.data[0].id);
                               this.$store.commit('setUserName', localStorage.managername);
                               this.$store.commit('MANAGER_ID', res.data[0].id);
                               vm.$router.push({ path: '/' });
                           }else{
                               this.$message({
                                   message: '登录失败，请检查用户名或密码是否正确',
                                   type: 'error'
                               });
                           }
                       })
                    } else {
                        console.log('error submit!!');
                        return false
                    }
                });
            },
            handleReset () {
                this.$refs.loginForm.resetFields();
            }
        }
    }
</script>
<style lang="sass" rel="stylesheet/scss">

    .login{
        background:url(/src/assets/images/bg.png) no-repeat center;
        background-size:cover;
        height:100%;
        .title{
            font-family: "微软雅黑";
            font-weight: normal;
            color: #666;
            margin-top: 120px;
        }
        .box{
            width: 400px;
            height:350px;
            background: #fff;
            border-top: 2px solid #00b0e8;
            padding: 45px 50px;
            box-sizing: border-box;
        }
        .reset{
            float:right;
            color: #20a0ff;
            letter-spacing: 3px;
            cursor: pointer;
        }
        .login-btn{
            .el-button--primary{
                width: 100%;
                font-family: "微软雅黑";
            }
        }
        .icon-input{
            .el-input__inner{
                padding-left:30px;
            }
        }
        .login-ruleForm{
            .el-input-group__append{
                img{
                    display: block;
                }
            }
        }
    }

</style>