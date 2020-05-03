
export const get_user = async ({commit}) => {

    try{
        let response = await axios.get(`/api/dashboard/profile`)
        commit('PUSH_USER', response.data.data)
        return response
    } catch (error) {
        console.log(error)
    }
}

export const set_user = async ({commit}, { user}) => {
    commit('CLEAR_ERRORS')
    commit('PUSH_PROCESSING', true)
    try {
        let response = await axios.post(`/api/dashboard/profile`, user)
        commit('PUSH_USER', user)
        commit('PUSH_PROCESSING', false)
        commit('notify/SET_NOTIFICATION', {
            name: 'success',
            class: 'notify--success',
            message: 'Updated Successfully',
            show: true
        }, {root: true})
        setTimeout( () => {
            commit('notify/SET_NOTIFICATION', { show: false}, {root: true})
        }, 3500)
        return response
    } catch (error) {
        commit('notify/SET_NOTIFICATION', {
            name: 'success',
            class: 'notify--danger',
            message: error.response.data.message,
            show: true
        }, {root: true})
        commit('PUSH_ERRORS', error.response.data.errors)
        commit('PUSH_PROCESSING', false)
        setTimeout( () => {
            commit('notify/SET_NOTIFICATION', { show: false}, {root: true})
        }, 3500)
    }
}

export const update_password =  async ({commit}, data) => {

    try {
        let response = await axios.post(`api/dashboard/profile/password`, data)
        alert('')
        return response
    } catch (e) {
        console.error(e)
    }
}
