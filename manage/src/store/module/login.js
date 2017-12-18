
const state = {
  username: '', 
  menuData: ''
}

const actions = {
  setUserName({ commit }) {
    commit('setUserName')
  }, 
  setMenuData({ commit }, menuData) {
    commit('setMenuData', menuData)
  }
}
const mutations = {
  setUserName(state, username) {
    state.username = username
  }, 
  setMenuData(state, menuData) {
    state.menuData = menuData
  }
}

export default {
  state, 
  actions, 
  mutations
}