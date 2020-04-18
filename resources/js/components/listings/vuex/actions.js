import axios from 'axios'

export const createListing = ({commit, dispatch}, {area, listing}) => {
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
        commit('CLEAR_LISTING')
        commit('PROCESSING_STATUS', false)
        dispatch('redirect_to_edit', {
            area,
            listing
        })
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

export const getListings = async ({commit}, {url}) => {
    let response = await axios.get(url)
    commit('PUSH_LISTINGS', response.data.data)
    return response
}

export const redirect_to_edit = ({}, {area, listing}) => {
    window.location = `/${area.slug}/listings/${listing}/edit`
    console.log(listing)
}
