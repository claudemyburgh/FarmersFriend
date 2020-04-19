

export const SET_NOTIFICATION = (state, payload) => {
    state.notify = payload
}

export const CLOSE_NOTIFICATION = (state) => {
    state.notify = {show: false}
}
