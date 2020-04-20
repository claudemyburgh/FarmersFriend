
try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

const luna =  require('luna-sass/Framework/js/luna.js');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

import Masonry from 'masonry-layout'


(function($, window, document){

    'use strict';

    var masonry = document.querySelector('.masonry');



    $(document).Luna();


    if (masonry) {
        setTimeout(() => {
            var msnry = new Masonry( masonry, {
                itemSelector: '.masonry__item',
                // columnWidth: 200
            });

        }, 500)
    }


    // function success(pos) {
    //     console.log(pos)
    // }
    //
    // function errorCallback(pos) {
    //     console.log(pos)
    // }
    //
    // window.navigator.geolocation.getCurrentPosition(success, errorCallback)


})(jQuery, window, document);

