import Vue from 'vue'
import Vuex from 'vuex'
import login from './module/login'
import common from './module/common'
Vue.use(Vuex)
const debug = process.env.NODE_ENV !== 'production'
export default new Vuex.Store({
  modules: {
    login,
    common
  },
  strict: debug
})
