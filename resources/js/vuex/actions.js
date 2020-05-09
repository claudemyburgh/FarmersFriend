

export const setValidationErrors = ({commit}, error) => {
    commit('SET_VALIDATION_ERRORS', error.errors)
    // console.log(error)
    commit('notify/SET_NOTIFICATION', {
        name: 'success',
        class: 'notify--danger',
        message: error.message,
        show: true
    }, {root: true})
}

