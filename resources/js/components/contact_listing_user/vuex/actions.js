import axios from 'axios'

export const sendMessage = async ({state, commit} , {listing, form}) => {
    commit('RESET_ERRORS')
    commit('SET_PROCESSING', true)

    try {
        let response = await axios.post(`api/${listing}/user/message`, form)
        commit('notify/SET_NOTIFICATION', {
            name: 'success',
            class: 'notify--success',
            message: 'Email was delivered successfully.',
            show: true
        }, {root: true})
        commit('SET_PROCESSING', false)
        commit('RESET_FORM')
        return response
    } catch (error) {
        commit('SET_PROCESSING', false)
        commit('VALIDATE_ERROR', error.response.data)
        commit('notify/SET_NOTIFICATION', {
            name: 'Error',
            class: 'notify--danger',
            message: error.response.data.message,
            show: true
        }, {root: true})
    }

}
