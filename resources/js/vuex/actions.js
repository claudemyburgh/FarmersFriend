

export const setValidationErrors = ({commit}, errors) => {
    commit('SET_VALIDATION_ERRORS', errors)
    commit('notify/SET_NOTIFICATION', {
        name: 'success',
        class: 'notify--danger',
        message: errors.response.data.message,
        show: true
    }, {root: true})
}

