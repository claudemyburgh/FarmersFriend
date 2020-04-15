import Vue from 'vue'
import Vuex from 'vuex'


import listings from '../components/listings/vuex'
import area from '../components/listings/components/area/vuex'
import categories from '../components/listings/components/categories/vuex'
import notify from '../components/components/notify/vuex'
import contactUser from '../components/contact_listing_user/vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        listings,
        area,
        notify,
        categories,
        contactUser
    }
})
