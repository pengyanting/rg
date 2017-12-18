<template>
    <el-row :gutter="20">
        <el-col :span="8">
            <div class="grid-content bg-purple">
                <el-card class="box-card">
                    <div slot="header"
                         class="clearfix">
                        <span class="cardTitle">登录信息</span>
                    </div>
                    <div class="text item"><span>登录名</span>{{username}}</div>
                    <div class="text item"><span>用户名</span>{{username}}</div>
                    <div class="text item"><span>登录时间</span>{{time}}</div>
                    <div class="btnBox">
                        <el-button class=""
                                   type="primary"
                                   @click="logout">重新登录</el-button>
                    </div>
                </el-card>
            </div>
        </el-col>
        <!--密码-->
        <el-dialog title="修改密码"
                   v-model="updatePwdShow"
                   size="tiny">
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
            </el-form>
            <div slot="footer"
                 class="dialog-footer">
                <el-button @click.native="updatePwdShow = false">取 消</el-button>
                <el-button type="primary"
                           @click.native="updateConfirm">确 定</el-button>
            </div>
        </el-dialog>
    </el-row>
</template>
<script type="text/ecmascript-6">
import axios from 'axios'
import qs from 'querystring'
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
            updatePwdShow: false,  //重置密码
            pass: {
                old: '',
                new: '',
                pass: ''
            },
            username: '',
            time: '',
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
    mounted() {
        //页面挂在完成之后加载首页内容
        this.username = localStorage.getItem('managername');
        this.time=this.getTime();
    },
    methods: {
        logout() {//退出登录
            localStorage.setItem('username', '')
            this.$router.replace({ path: '/login' })
        },
        updatePwd() {//重置密码
            this.updatePwdShow = true;
        },
        updateConfirm() {
            var vm = this;
            vm.$refs.pass.validate(valid => {
                if (valid) {
                    vm.updatePwdShow = false;
                    axios.post(this.$root._data.apiUrl + "/upPwd.php", qs.stringify({
                        password: vm.pass,
                        id: this.$store.state.common.managerId
                    })).then(res => {
                        if (res.data == 1) {
                            this.message({
                                message: '修改成功，请重新登录',
                                type: 'success'
                            })
                            vm.$router.push({ path: '/login.php' });
                        }
                    }).catch(error => {
                        console.log(error);
                    })
                }
            })
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
    }
}
</script>
<style lang="sass" rel="stylesheet/scss">
   .box-card .item{
       line-height:30px;
       font-size: 16px;
       font-family: "微软雅黑";
       color: #333;
       letter-spacing: 2px;
       span{
           display: inline-block;
           width: 90px;
       }
   }
   .box-card{
       margin-top: 10px;
   }
   .el-card__header{
       padding: 9px 10px;
       background: #fafafa;
   }
    .cardTitle{
        line-height: 36px;
        font-family: "微软雅黑";
        font-size: 18px;
        color: #1f1f1f;
    }
    .box-card{
        .btnBox{
            margin-top: 10px;
        }
    }
</style>