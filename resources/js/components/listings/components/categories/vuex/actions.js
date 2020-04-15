import axios from 'axios'

export const setCategories = async ({commit}) => {

    return axios.get(`api/categories`).then((response) => {
        commit('UPDATE_CATEGORIES_LIST', response)
    })

};


