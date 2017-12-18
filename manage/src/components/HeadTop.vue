<template>
    <div class="header">
        <el-col :span="24">
            <el-col :span="20">
                <div class="grid-content bg-purple">
                    <h2 @click="back"><span style="color:#20A0FF;font-size: 30px;margin-right:10px;">智能云课堂</span>后台管理系统</h2>
                </div>
            </el-col>
            <el-col :span="4">
                <div class="grid-content bg-purple">
                    <el-button type="primary" size="" class="iconfont icon-tuichu btn" @click="logout">退出</el-button>
                    <!--<div class="login-setting">-->
                        <!--<span  class="left">-->
                            <!--<el-tooltip class="item" effect="dark" content="退出登录" placement="bottom">-->
                                <!--<i class="iconfont icon-tuichu" style="cursor: pointer;"></i>-->
                            <!--</el-tooltip>-->
                        <!--</span>-->
                        <!--<span class="user" style="float:left">退出</span>-->
                    <!--</div>-->
                </div>
            </el-col>
        </el-col>
    </div>
</template>
<script>
    import axios from 'axios'
    export default {
        data () {
            return {
                username: this.$store.state.login.username
            }
        },
        methods: {
            logout (){
                //模拟登出
                localStorage.setItem('managername','');
                localStorage.setItem('title','首页');
                this.$router.replace({ path: '/login' })
            },
            back () {
                this.$router.replace({ path: '/' })
            }
        }
    }
</script>
<style lang="sass">
    .header{
        background: #1f2d3d;
        height: 60px;
        h2{
            color: #fff;
            margin-top: 13px;
            margin-left: 20px;
            cursor:pointer;
            font-family: "微软雅黑";
            font-weight: normal;
            font-size: 20px;
        }
    }
    .login-setting{
        margin-top: 12px;
        margin-left: 130px;
        line-height:35px;
        color: #fff;
        .user{
            display: inline-block;
            margin-right:5px;
        }
    }
    .grid-content .btn{
        float: right;
        margin-right: 20px;
        margin-top: 13px;
    }
</style>