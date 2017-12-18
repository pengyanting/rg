<template>
    <div class="container"
         v-loading.fullscreen.lock="$store.state.common.load"
         element-loading-text="拼命加载中">
        <headTop></headTop>
        <div class="panel">
            <div class="panel-aside"
                 ref="panelAside">
                <h3 class="role"></i>欢迎系统管理员：{{username}}</h3>
                <el-tree :data="menuData"
                         :props="defaultMenuProps"
                         @node-click="handleNodeClick"></el-tree>
            </div>
            <div class="panel-main">
                <el-row>
                    <el-col :span="24">
                        <div class="panel-top">
                            <span class="iconfonts icon-index"
                                  style="float:left;margin-right: 10px"></span>
                            <h2>{{currentPathName}}</h2>
                        </div>
                    </el-col>
                    <el-col :span="24">
                        <router-view></router-view>
                    </el-col>
                </el-row>
            </div>
        </div>
    </div>
</template>
<script>
import HeadTop from '../components/HeadTop.vue'
import axios from 'axios'
import { read } from '../store/getters'
export default {
    data() {
        return {
            currentTabView: 'Home',
            visible: false,
            dialogFormVisible: false,
            currentPathName: '首页',
            username:'',
            menuData: [
                {
                    label: '用户管理',
                    children: [
                        {
                            label: '用户查询',
                            link: '/user/selectUser.php'
                        }],
                    authLevel: 1
                },
                {
                    label: '课程管理',
                    children: [{
                        label: '课程查询',
                        link: '/course/selectCourse.php'
                    }, {
                        label: '新建课程',
                        link: '/course/addCourse.php'
                    }, {
                        label: '新建目录',
                        link: '/course/addCatalog.php'
                    }, {
                        label: '目录列表',
                        link: '/course/selectCatalog.php'
                    }],
                    authLevel: 2
                }, {
                    label: '任务管理',
                    children: [{
                        label: '任务查询',
                        link: '/task/selectTask.php'
                    },{
                        label: '新建任务',
                        link: '/task/taskAdd.php'
                    },{
                        label: '试题列表',
                        link: '/task/testList.php'
                    },{
                        label: '新建试题',
                        link: '/task/addTest.php'
                    },{
                        label: '批阅任务',
                        link: '/task/check.php'
                    }],
                    authLevel: 3
                }, {
                    label: '消息管理',
                    children: [{
                        label: '消息查询',
                        link: '/message/selectMessage.php'
                    },{
                        label: '新建消息',
                        link: '/message/addMessage.php'
                    },{
                        label: '评论列表',
                        link: '/message/discusList.php'
                    }],
                    authLevel: 4
                }, {
                    label: '系统设置',
                    children: [{
                        label: '修改密码',
                        link: '/setting/updatePwd.php'
                    }],
                    authLevel: 5
                }
            ],
            defaultMenuProps: {
                children: 'children',
                label: 'label',
                link: 'link'
            },
            username: '',
        }
    },
    watch: {
        '$route'(to, from) {//监听路由改变
            this.currentPathName = to.name;
            localStorage.setItem("title", to.name);
        }
    },
    created() {
        this.$store.commit('setUserName', localStorage.username);
    },
    mounted() {
        const panelAside = this.$refs.panelAside;
        const windowH = document.documentElement.clientHeight-60;
        panelAside.style.height = windowH + "px";

        if (localStorage.getItem("title")) {
            this.currentPathName = localStorage.getItem("title");
        }
        this.username = localStorage.getItem('managername');
    },
    methods: {
        handleNodeClick(data, e, n) {
            if (data.link) {
                this.$router.push({ path: data.link });
            }
        },
        handleRemove(tab) {
            console.log(tab);
        },
        handleClick(tab) {
            console.log(tab);
        }
    },
    components: {
        HeadTop
    }
}
</script>
<style lang="sass" rel="stylesheet/scss">
    .container{
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 100%;
    }
    .panel{
        position: absolute;
        top: 60px;
        left: 0;
        /*bottom: 0;*/
        width: 100%;
        background: #324057;
    }
    .panel-aside{
        width: 230px;
        overflow:auto;
    }
    .panel-main{
        background: #fff;
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        left: 230px;
        padding: 20px;
    }
    .panel-aside{
        background: #324057;
        .role{
            color: #c0ccda;
            font-size: 14px;
            text-align: center;
            height: 60px;
            line-height: 60px;
            border-bottom: 1px solid #475669;
        }
    }
    .panel-top{
        margin-bottom: 15px;
        /*border-bottom:1px solid #ccc;*/
        padding:20px 0px;
        h2{
           margin:0px;
           position:relative;
            float: left;
            color: #666;
            font-size: 20px;
            font-family:"微软雅黑";
            font-weight: normal;

        }
        h2:after{
           /*position: absolute;*/
            /*left: 0;*/
            /*top: 15px;*/
            /*content: "";*/
            /*display: block;*/
            /*width: 5px;*/
            /*height: 30px;*/
            /*background: #20a0ff;*/
        }
    }
    .el-tree{
        border: none;
        background: #324057;
        color: #fff;
        .el-tree-node__content{
            height: 50px;
            line-height: 50px;
            .el-tree-node__expand-icon{
                margin-left: 25px;
            }
        }
        .el-tree-node__content:hover{
            background: #475669;
        }
    }
</style>