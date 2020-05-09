

export const SET_VALIDATION_ERRORS = (state, errors) => {
    state.errors = errors
}

export const CLEAR_VALIDATION_ERRORS = (state, {}) => {
    state.errors = []
}
