
export const UPDATE_AREA_LIST = (state, response) => {
    state.areas = response.data.data
}

export const LOADING_STATUS = (state, data) => {
    state.loaded = data
}
