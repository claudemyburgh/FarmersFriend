

export const UPDATE_CATEGORIES_LIST = (state, response) =>{
    state.categories = response.data.data
}
