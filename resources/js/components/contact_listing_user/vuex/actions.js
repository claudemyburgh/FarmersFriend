import axios from 'axios'

export const sendMessage = ({state, commit} , {listing, form}) => {
    commit('CLEAR_VALIDATION_ERRORS',{}, {root: true})
    commit('SET_PROCESSING', true)

    return axios.post(`api/${listing}/user/message`, form).then( (response) => {
        commit('SET_PROCESSING', false)
        commit('notify/SET_NOTIFICATION', {
            name: 'success',
            class: 'notify--success',
            message: 'Your message was send.',
            show: true
        }, {root: true})
        return Promise.resolve(response);
    }).catch( (error) => {
        commit('SET_PROCESSING', false)
        return Promise.reject(error)
    })

}
