import axios from 'axios'

export const set_areas = ({commit}) => {
    return axios.get(`api/areas`, { cache: true }).then((response) => {
        commit('UPDATE_AREA_LIST', response)
        commit('LOADING_STATUS', true)
    })
};

export const set_province = ({commit}) => {

}


