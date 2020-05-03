require('intersection-observer');
import Vue from 'vue'
import VueProgressBar from 'vue-progressbar'
import VueObserveVisibility from 'vue-observe-visibility'
import InstantSearch from 'vue-instantsearch'
import {cacheAdapterEnhancer, throttleAdapterEnhancer} from "axios-extensions";
import { options } from './defaults'
import store from './vuex'
import Moment from './Mixins/date-moment'
import Currency from './Mixins/currency'

/**
 * Axios
 */
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.adapter = throttleAdapterEnhancer(cacheAdapterEnhancer(axios.defaults.adapter,
    { enabledByDefault: false, cacheFlag: 'useCache'}))
// window.axios.defaults.baseURL = "http://farmersfriend.build";
window.axios.defaults.baseURL = "http://farmersfriend.co.za";
axios.defaults.withCredentials = true;





/**
 * Plugins
 */


/**
 *
 * @type {*|Dropzone}
 */
window.Dropzone = require('dropzone');
Dropzone.autoDiscover = false;

/**
 * Vue Use Plugins
 */
Vue.use(VueObserveVisibility)
Vue.use(VueProgressBar, options)
Vue.use(InstantSearch)

Vue.mixin(Moment)
Vue.mixin(Currency)


/**
 * Register vue components
 */
const files = require.context('./components/', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * CSRF for axios
 * @type {Element}
 */
window.token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.csrf = window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Helpers

 */


/**
 *
 * @type {Vue | CombinedVueInstance<Vue, object, object, object, Record<never, any>>}
 */
const app = new Vue({
    el: '#app',
    store: store,

});

require('./bootstrap');

