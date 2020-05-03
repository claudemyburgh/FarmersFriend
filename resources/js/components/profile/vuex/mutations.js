

export const PUSH_USER = (state, data) => {
    state.user = data
}

export const PUSH_ERRORS = (state, data) => {
    state.errors = data
}

export const CLEAR_ERRORS = (state) => {
    state.errors = []
}


export const PUSH_PROCESSING = (state, data) => {
    state.processing = data
}
