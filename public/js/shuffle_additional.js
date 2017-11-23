var shuffleme = (function( $ ) {
    'use strict';
    // None of these need to be executed synchronously


    var $grid = $('#grid'), //locate what we want to sort
        $filterOptions = $('.portfolio-sorting li'),  //locate the filter categories
        $sizer = $grid.find('.shuffle_sizer'),    //sizer stores the size of the items

        init = function() {

            // None of these need to be executed synchronously
            setTimeout(function() {
                listen();
                setupFilters();
                setupSearching();
            }, 100);

            // instantiate the plugin
            $grid.shuffle({
                itemSelector: '[class*="col-"]',
                sizer: $sizer
            });
        },



    setupSearching = function() {
        // Advanced filtering
        $('.js-shuffle-search').on('keyup change', function() {
            var val = this.value.toLowerCase();
            $grid.shuffle('shuffle', function($el, shuffle) {
                // Only search elements in the current group
                if (shuffle.group !== 'all' && $.inArray(shuffle.group, $el.data('groups')) === -1) {
                    return false;
                }
                var text = $.trim( $el.find('.picture-item__title').text() ).toLowerCase();
                return text.indexOf(val) !== -1;

            });

        });

    },


    // Set up button clicks
        setupFilters = function() {
            var $btns = $filterOptions.children();
            $btns.on('click', function(e) {
                e.preventDefault();
                var $this = $(this),
                    isActive = $this.hasClass( 'active' ),
                    group = isActive ? 'all' : $this.data('group');

                // Hide current label, show current label in title
                if ( !isActive ) {
                    $('.portfolio-sorting li a').removeClass('active');
                }

                $this.toggleClass('active');

                // Filter elements
                $grid.shuffle( 'shuffle', group );
            });

            $btns = null;
        },

    // Re layout shuffle when images load. This is only needed
    // below 768 pixels because the .picture-item height is auto and therefore
    // the height of the picture-item is dependent on the image
    // I recommend using imagesloaded to determine when an image is loaded
    // but that doesn't support IE7
        listen = function() {
            var debouncedLayout = $.throttle( 300, function() {
                $grid.shuffle('update');
            });

            // Get all images inside shuffle
            $grid.find('img').each(function() {
                var proxyImage;

                // Image already loaded
                if ( this.complete && this.naturalWidth !== undefined ) {
                    return;
                }

                // If none of the checks above matched, simulate loading on detached element.
                proxyImage = new Image();
                $( proxyImage ).on('load', function() {
                    $(this).off('load');
                    debouncedLayout();
                });

                proxyImage.src = this.src;
            });

            // Because this method doesn't seem to be perfect.
            setTimeout(function() {
                debouncedLayout();
            }, 500);
        };

    return {
        init: init
    };
}( jQuery ));




$(document).ready(function()
{
    shuffleme.init(); //filter portfolio
});