import axios from 'axios'

export const set_categories = async ({commit}) => {

    return axios.get(`api/categories`, { cache: true }).then((response) => {
        commit('UPDATE_CATEGORIES_LIST', response)
    })

};


