import axios from 'axios'

export const setAreas = ({commit}) => {
    return axios.get(`api/areas`).then((response) => {
        commit('UPDATE_AREA_LIST', response)
        commit('LOADING_STATUS', true)
    })
};


