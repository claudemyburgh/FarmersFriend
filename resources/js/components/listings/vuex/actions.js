import axios from 'axios'


export const create_listing = async ({commit, dispatch}, {area, listing}) => {
    commit('CLEAR_ERROR')
    commit('PROCESSING_STATUS', true)
    commit('notify/SET_NOTIFICATION', { show: false}, {root: true})
    try {
        const response = await axios.post(`api/${area.slug}/listings`, listing)
        commit('notify/SET_NOTIFICATION', {
            name: 'success',
            class: 'notify--success',
            message: 'Your listing is successfully created.',
            show: true
        }, {root: true})
        commit('PROCESSING_STATUS', false)
        commit('notify/SET_NOTIFICATION', { show: false}, {root: true})
        window.location.href = `/${area.slug}/dashboard/listings/${response.data.data.key}/edit`
        return response.status
    } catch (error) {

        commit('notify/SET_NOTIFICATION', {
            name: 'success',
            class: 'notify--danger',
            message: error.response.data.message,
            show: true
        }, {root: true})
        commit('VALIDATE_ERROR', error.response.data.errors)
        commit('PROCESSING_STATUS', false)

    }
}


export const update_listing = async ({ commit }, data) => {
    commit('CLEAR_ERROR')
    commit('PROCESSING_STATUS', true)
    commit('notify/SET_NOTIFICATION', { show: false}, {root: true})
    try{
        let response =  await axios.patch(`api/${data.area.slug}/listings/${data.listing.key}`, data.listing)
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
        return response
    } catch (error) {
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
    }
}

export const get_listings = async ({commit}, {url}) => {
    let response = await axios.get(url)
    commit('PUSH_LISTINGS', response.data.data)
    return response
}

export const set_listing = ({commit}, data) => {
    commit('PUSH_LISTING', data)
}


