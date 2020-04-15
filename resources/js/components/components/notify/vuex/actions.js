
export const setNotify = ({commit}, {payload}) => {
    commit('SET_NOTIFICATION', payload)
}

export const closeNotify = ({commit}) => {
    commit('CLOSE_NOTIFICATION')
}
