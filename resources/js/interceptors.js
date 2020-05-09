
import axios from 'axios'
import store from './vuex'


axios.interceptors.response.use( (response ) => {
        return response
    }, (error) => {

        if (error.response.status === 422) {
            store.dispatch('setValidationErrors', error.response.data.errors)
        }
        return Promise.reject(error)
    }
)
