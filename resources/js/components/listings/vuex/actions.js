import axios from 'axios'


export const create_listing = ({commit, dispatch}, {area, listing}) => {
    commit('CLEAR_ERROR')
    commit('PROCESSING_STATUS', true)
    commit('notify/SET_NOTIFICATION', { show: false}, {root: true})
    return axios.post(`api/${area.slug}/listings`, listing).then( (response ) => {
        commit('notify/SET_NOTIFICATION', {
            name: 'success',
            class: 'notify--success',
            message: 'Your listing is successfully created.',
            show: true
        }, {root: true})
        // commit('CLEAR_LISTING')
        commit('PROCESSING_STATUS', false)
        commit('notify/SET_NOTIFICATION', { show: false}, {root: true})
        setTimeout( () => {
            window.location.href = `/${area.slug}/listings/${response.data.data.key}/edit`
        }, 200)

    }).catch( (error) => {
        commit('notify/SET_NOTIFICATION', {
            name: 'success',
            class: 'notify--danger',
            message: error.response.data.message,
            show: true
        }, {root: true})
        commit('VALIDATE_ERROR', error.response.data.errors)
        commit('PROCESSING_STATUS', false)
    })
}


export const update_listing = ({ commit }, data) => {

    commit('CLEAR_ERROR')
    commit('PROCESSING_STATUS', true)
    commit('notify/SET_NOTIFICATION', { show: false}, {root: true})
    return axios.patch(`api/${data.area.slug}/listings/${data.listing.key}`, data.listing).then( (response ) => {

        commit('notify/SET_NOTIFICATION', {
            name: 'success',
            class: 'notify--success',
            message: 'Your listing is successfully Updated.',
            show: true
        }, {root: true})
        commit('PROCESSING_STATUS', false)
        setTimeout( () => {
            commit('notify/SET_NOTIFICATION', { show: false}, {root: true})
        }, 3500)

    }).catch( (error) => {
        commit('notify/SET_NOTIFICATION', {
            name: 'success',
            class: 'notify--danger',
            message: error.response.data.message,
            show: true
        }, {root: true})
        commit('VALIDATE_ERROR', error.response.data.errors)
        commit('PROCESSING_STATUS', false)
        setTimeout( () => {
            commit('notify/SET_NOTIFICATION', { show: false}, {root: true})
        }, 3500)

    })
}

export const get_listings = async ({commit}, {url}) => {
    let response = await axios.get(url)
    commit('PUSH_LISTINGS', response.data.data)
    return response
}

export const set_listing = ({commit}, data) => {
    commit('PUSH_LISTING', data)
}


