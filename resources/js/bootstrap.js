var _ = require('lodash')
try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

const luna =  require('luna-sass/Framework/js/luna.js');

import Masonry from 'masonry-layout'

(function($, window, document){

    'use strict';

    var masonry = document.querySelector('.masonry');

    require('fslightbox');

    $(document).Luna();

    if (masonry) {
        setTimeout(() => {
            var msnry = new Masonry( masonry, {
                itemSelector: '.masonry__item',
                // columnWidth: 200
            });

        }, 800)
    }




})(jQuery, window, document);

