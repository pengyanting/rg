// import 'babel-polyfill'
import Vue from 'vue'
import 'element-ui/lib/theme-default/index.css'
import './assets/scss/common.scss'
import './assets/iconfont/iconfont.css'
import router from './router'
import store from './store/store'
import App from './view/App.vue'
const ElementUI = require('element-ui')
Vue.use(ElementUI) 
 // 公共数据
const data = {
  // 接口地址
  apiUrl: 'http://47.94.86.219/rg/php/',
  imgUrl: '/src/assets/images/img.gif'
}

 // 初始化根实例
new Vue({
  router,
  store,
  data() {
    return data
  },
  render: h => h(App)
}).$mount('#app')

