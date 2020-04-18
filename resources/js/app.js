import Vue from 'vue'
import VueObserveVisibility from 'vue-observe-visibility'


/**
 * Axios
 */
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.baseURL = "http://farmersfriend.build";
// window.axios.defaults.baseURL = "http://farmersfriend.co.za";
axios.defaults.withCredentials = true;


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

/**
 * Register vue components
 */
const files = require.context('./', true, /\.vue$/i)
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

import store from './vuex'


/**
 *
 * @type {Vue | CombinedVueInstance<Vue, object, object, object, Record<never, any>>}
 */
const app = new Vue({
    el: '#app',
    store: store
});

require('./bootstrap');

