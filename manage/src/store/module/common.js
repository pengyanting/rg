import * as types from '../types'

const state = {
  load: false, 
  editorFlagAdd: true, 
  editorFlagEdit: true, 
  sendType: true, 
  showDetail: false,   // 消息发布新版功能区查看详情(新增)
  showDetailEdit: false,    // 消息发布新版功能区查看详情(编辑)
  showExperience: false, // 消息发布新版功能区立即体验(新增)
  showExperienceEdit: false,  // 消息发布新版功能区立即体验(编辑)
  jumpService: true, 
  disVersionEdit: false, 
  disExperienceEdit: false, 
  disVersionAdd: false, 
  disExperienceAdd: false,
  managerId: ''
}
const actions = {
  [types.LOAD]({ commit }, load) {
    commit([types.LOAD].toString(), load)
  }, 
  [types.EDITOR_FLAG_ADD]({ commit }, editorFlagAdd) {
    commit([types.EDITOR_FLAG_ADD].toString(), editorFlagAdd)
  }, 
  [types.EDITOR_FLAG_EDIT]({ commit }, editorFlaEdit) {
    commit([types.EDITOR_FLAG_EDIT].toString(), editorFlaEdit)
  }, 
  [types.SEND_TYPE]({ commit }, playout) {
    if (playout === 2) {
      commit([types.SEND_TYPE].toString(), false)
    } else {
      commit([types.SEND_TYPE].toString(), true)
    }
  }, 
  [types.SHOW_DETAIL]({ commit }, showDetail) {
    if (showDetail) {
      commit([types.SHOW_DETAIL].toString(), false)
    } else {
      commit([types.SHOW_DETAIL].toString(), true)
    }
  }, 
  [types.SHOW_DETAIL_EDIT]({ commit }, showDetailEdit) {
    if (showDetailEdit) {
      commit([types.SHOW_DETAIL_EDIT].toString(), false)
    } else {
      commit([types.SHOW_DETAIL_EDIT].toString(), true)
    }
  }, 
  [types.SHOW_EXPERIENCE]({ commit }, showExperience) {
    if (showExperience) {
      commit([types.SHOW_EXPERIENCE].toString(), false)
    } else {
      commit([types.SHOW_EXPERIENCE].toString(), true)
    }
  }, 
  [types.SHOW_EXPERIENCE_EDIT]({ commit }, showExperienceEdit) {
    if (showExperienceEdit) {
      commit([types.SHOW_EXPERIENCE_EDIT].toString(), false)
    } else {
      commit([types.SHOW_EXPERIENCE_EDIT].toString(), true)
    }
  }, 
  [types.JUMP_SERVICE]({ commit }, jumpService) {
    if (jumpService === 1) {
      commit([types.JUMP_SERVICE].toString(), true)
    } else {
      commit([types.JUMP_SERVICE].toString(), false)
    }
  }, 
  [types.VERSION]({ commit }, arg) {
    if (arg.type === 'edit') {
      commit([types.VERSION_EDIT].toString(), arg.list)
    } else {
      commit([types.VERSION_ADD].toString(), arg.list)
    }
  },
  [types.MANAGER_ID]({ commit }, managerId) {
    commit([types.MANAGER_ID].toString(), managerId)
  }
}
const mutations = {
  [types.LOAD](state, load) {
    state.load = load
  }, 
  [types.EDITOR_FLAG_ADD](state, editorFlagAdd) { // 确保消息发布中编辑器只生成一次
    state.editorFlagAdd = editorFlagAdd
  }, 
  [types.EDITOR_FLAG_EDIT](state, editorFlagEdit) { // 确保消息发布中编辑器只生成一次
    state.editorFlagEdit = editorFlagEdit
  }, 
  [types.SEND_TYPE](state, sendType) {
    state.sendType = sendType
  }, 
  [types.SHOW_DETAIL](state, showDetail) {
    state.showDetail = showDetail
  }, 
  [types.SHOW_DETAIL_EDIT](state, showDetailEdit) {
    state.showDetailEdit = showDetailEdit
  }, 
  [types.SHOW_EXPERIENCE](state, showExperience) {
    state.showExperience = showExperience
  }, 
  [types.SHOW_EXPERIENCE_EDIT](state, showExperienceEdit) {
    state.showExperienceEdit = showExperienceEdit
  }, 
  [types.JUMP_SERVICE](state, jumpService) {
    state.jumpService = jumpService
  }, 
  [types.VERSION_EDIT](state, list) {
    const length = list.length
    if (length === 0) {
      state.disExperienceEdit = false
      state.disVersionEdit = false
    }
    for (let i = 0; i < length; i++) {
      if (list[i] === '版本升级') {
        state.disExperienceEdit = true
        return
      } if (list[i] === '立即体验') {
        state.disVersionEdit = true
        return
      } else {
        state.disExperienceEdit = false
        state.disVersionEdit = false
      }
    }
  }, 
  [types.VERSION_ADD](state, list) {
    const length = list.length
    if (length === 0) {
      state.disExperienceAdd = false
      state.disVersionAdd = false
    }
    for (let i = 0; i < length; i++) {
      if (list[i] === '版本升级') {
        state.disExperienceAdd = true
        return
      } if (list[i] === '立即体验') {
        state.disVersionAdd = true
        return
      } else {
        state.disExperienceAdd = false
        state.disVersionAdd = false
      }
    }
  },
  [types.MANAGER_ID](state, managerId) {
    state.managerId = managerId
  }
}

export default {
  state, 
  actions, 
  mutations
}