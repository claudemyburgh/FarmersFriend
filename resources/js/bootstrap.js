import Tobii from "tobii";

import css from 'tobii/dist/css/tobii.css'

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

// import Splide from '@splidejs/splide';

import Flickity from 'flickity'

require('flickity-fullscreen')
// require('flickity-imagesloaded')

import Masonry from 'masonry-layout'

(function($, window, document){

    'use strict';

    var masonry = document.querySelector('.masonry');

    $(document).Luna();

    var elem = document.querySelector('.main-carousel');

    if  (elem) {
        var flkty = new Flickity( elem, {
            // options
            cellAlign: 'left',
            contain: true,
            // lazyLoad: 1,
            imagesLoaded: true
        });
    }

    var tobii = new Tobii({
        selector: '.lightbox',
        captions: false,
        captionsSelector: 'img',
        captionAttribute: 'alt',
        nav: 'auto',
        navText: ['<svg role="img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"><polyline points="14 18 8 12 14 6 14 6"></polyline></svg>', '<svg role="img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"><polyline points="10 6 16 12 10 18 10 18"></polyline></svg>'],
        navLabel: ['Previous', 'Next'],
        close: true,
        closeText: '<svg role="img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"><path d="M6.34314575 6.34314575L17.6568542 17.6568542M6.34314575 17.6568542L17.6568542 6.34314575"></path></svg>',
        closeLabel: 'Close',
        loadingIndicatorLabel: 'Image loading',
        counter: true,
        keyboard: true,
        zoom: true,
        zoomText: '<svg role="img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><polyline points="21 16 21 21 16 21"/><polyline points="8 21 3 21 3 16"/><polyline points="16 3 21 3 21 8"/><polyline points="3 8 3 3 8 3"/></svg>',
        docClose: true,
        swipeClose: true,
        scroll: true,
        draggable: true,
        threshold: 100,
        autoplayVideo: false
    })





    if (masonry) {
        setTimeout(() => {
            var msnry = new Masonry( masonry, {
                itemSelector: '.masonry__item',
                // columnWidth: 200
            });

        }, 800)
    }




})(jQuery, window, document);

