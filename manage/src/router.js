import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from './view/Index.vue'
import Login from './view/Login.vue'
import Home from './view/Home.vue'
// 用户
import selectUser from './view/user/selectuser.vue'
// 课程
import selectCourse from './view/course/selectcourse.vue'
import addCourse from './view/course/addcourse.vue'
import addCatalog from './view/course/addcatalog.vue'
import selectCatalog from './view/course/selectcatalog.vue'
// 任务
import selectTask from './view/task/selecttask.vue'
import taskAdd from './view/task/addtask.vue'
import testList from './view/task/testlist.vue'
import addTest from './view/task/addtest.vue'
import check from './view/task/check.vue'
// 消息
import selectMessage from './view/message/selectmessage.vue'
import addMessage from './view/message/addmessage.vue'
import discusList from './view/message/discuslist.vue'
// 设置
import updatePwd from './view/setting/updatepwd.vue'
Vue.use(VueRouter)
const routes = [{   
  path: '',
  component: Index,
  children: [{
    name: '首页',
    path: '',
    component: Home
  }, {
    name: '用户查询',
    path: '/user/selectUser.php',
    component: selectUser
  }, {
    name: '课程查询',
    path: '/course/selectCourse.php',
    component: selectCourse
  }, {
    name: '新建课程',
    path: '/course/addCourse.php',
    component: addCourse
  }, {
    name: '新建目录',
    path: '/course/addCatalog.php',
    component: addCatalog
  }, {
    name: '目录列表',
    path: '/course/selectCatalog.php',
    component: selectCatalog
  }, {
    name: '任务查询',
    path: '/task/selectTask.php',
    component: selectTask
  }, {
    name: '新建任务',
    path: '/task/taskAdd.php',
    component: taskAdd
  }, {
    name: '批阅任务',
    path: '/task/check.php',
    component: check
  }, {
    name: '试题列表',
    path: '/task/testList.php',
    component: testList
  }, {
    name: '新建试题',
    path: '/task/addTest.php',
    component: addTest
  }, {
    name: '消息查询',
    path: '/message/selectMessage.php',
    component: selectMessage
  }, {
    name: '新建消息',
    path: '/message/addMessage.php',
    component: addMessage
  }, {
    name: '评论列表',
    path: '/message/discusList.php',
    component: discusList
  }, {
    name: '修改密码',
    path: '/setting/updatePwd.php',
    component: updatePwd
  }]
},
{
  path: '/login.php',
  component: Login,
  meta: {
    noAuto: true
  }
}]

// 创建 router 实例，然后传 `routes` 配置
const router = new VueRouter({
  routes
})

// 需要身份验证,检查是否登录
router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.noAuto)) {
    if (to.path === '/login.php' && localStorage.managername) {
      next({
        path: '/'
      })
    } else {
      next()
    }
  } else {
    if (!localStorage.managername) {
      next({
        path: '/login.php',
        query: { redirect: to.fullPath }
      })
    } else {
      next() //  确保一定要调用 next()
    }
  }
})

export default router