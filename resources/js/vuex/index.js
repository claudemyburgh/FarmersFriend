import Vue from 'vue'
import Vuex from 'vuex'

import listings from '../components/listings/vuex'
import area from '../components/listings/components/area/vuex'
import categories from '../components/listings/components/categories/vuex'
import notify from '../components/components/notify/vuex'
import notify_published from '../components/components/notify_published/vuex'
import contactUser from '../components/contact_listing_user/vuex'
import user from '../components/profile/vuex'

Vue.use(Vuex)

import state from './state.js'
import * as mutations from './mutations.js'
import * as actions from './actions.js'
import * as getters from './getters.js'

export default new Vuex.Store({
    // namespaced: true,
    state,
    mutations,
    actions,
    getters,
    modules: {
        user,
        listings,
        area,
        notify,
        notify_published,
        categories,
        contactUser
    }
})
