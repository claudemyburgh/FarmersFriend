import axios from 'axios'

export const create_listing = ({commit, dispatch}, {area, listing}) => {
    commit('CLEAR_VALIDATION_ERRORS', {},{root: true})
    commit('PROCESSING_STATUS', true)
    commit('notify/SET_NOTIFICATION', { show: false}, {root: true})
    return axios.post(`api/${area.slug}/listings`, listing).then( (response) => {
        commit('notify/SET_NOTIFICATION', {
            name: 'success',
            class: 'notify--success',
            message: 'Your listing is successfully created.',
            show: true
        }, {root: true})
        commit('PROCESSING_STATUS', false)
        window.location.href = `/${area.slug}/dashboard/listings/${response.data.data.key}/edit`
        return Promise.resolve(response)
    }).catch( (error) => {
        commit('PROCESSING_STATUS', false)
        return Promise.reject(error)
    })
}


export const update_listing = ({ commit }, data) => {
    commit('CLEAR_VALIDATION_ERRORS',{}, {root: true})
    commit('PROCESSING_STATUS', true)
    commit('notify/SET_NOTIFICATION', { show: false}, {root: true})

    return axios.patch(`api/${data.area.slug}/listings/${data.listing.key}`, data.listing)
        .then( (response) => {
            commit('notify/SET_NOTIFICATION', {
                name: 'success',
                class: 'notify--success',
                message: 'Your listing is successfully Updated.',
                show: true
            }, {root: true})
            commit('PROCESSING_STATUS', false)
            return Promise.resolve(response)
        }).catch( (error) => {
            commit('PROCESSING_STATUS', false)
            return Promise.reject(error)
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


