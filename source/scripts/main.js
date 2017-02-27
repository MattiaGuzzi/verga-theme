/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function ($) {

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Sage = {
        // All pages
        'common': {
            init: function () {
                // JavaScript to be fired on all pages
                openMenu();
                closeMenu();
                closeSubMenu();
                openSubMenu();
                ajaxPostPerPage();
                initCarousel();
                checkAut();
                mainMenu();
            },
            finalize: function () {
                // JavaScript to be fired on all pages, after page specific JS is fired
            }
        },
        // Home page
        'home': {
            init: function () {
                // JavaScript to be fired on the home page
            },
            finalize: function () {
                // JavaScript to be fired on the home page, after the init JS
            }
        },
        // About us page, note the change from about-us to about_us.
        'about_us': {
            init: function () {
                // JavaScript to be fired on the about us page
            }
        }
    };

    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function (func, funcname, args) {
            var fire;
            var namespace = Sage;
            funcname = (funcname === undefined) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if (fire) {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function () {
            // Fire common init JS
            UTIL.fire('common');

            // Fire page-specific init JS, and then finalize JS
            $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
                UTIL.fire(classnm);
                UTIL.fire(classnm, 'finalize');
            });

            // Fire common finalize JS
            UTIL.fire('common', 'finalize');
        }
    };

    function openMenu() {
        $('.menu__item--catalogo').on('click', function (event) {
            event.stopPropagation();
            event.preventDefault();
            $('.main-menu').addClass('opened');
        })
    }

    function closeMenu() {
        $('.main-menu__header--button-close').on('click', function (event) {
            event.stopPropagation();
            event.preventDefault();
            $('.main-menu').removeClass('opened');
        })
    }

    function subMenu() {
        $('.mainmenu__left--list').on('click', function (event) {
            event.stopPropagation();
            event.preventDefault();
            var $data = $(this).data('attribute');
            alert($data);
        })
    }

    function openSubMenu() {
        $('.order-block__categories').on('click', function (event) {
            event.stopPropagation();
            event.preventDefault();
            $('.sub-menu').addClass('opened');
        })
    }

    function closeSubMenu() {
        $('.sub-menu__header--button').on('click', function (event) {
            event.stopPropagation();
            event.preventDefault();
            $('.sub-menu').removeClass('opened');
        })
    }

    function postPerPage() {
        $('.order-block__ppp-item').on('click', function (event) {
            var href = window.location.href;
            var url = href.split("?", 1);
            var $data = $(this).data('ppp');
            var res = url + '?ppp='.concat($data);
            window.location.href = res;
        })
    }

    function ajaxPostPerPage() {
        $('.order-block__ppp-item').on('click', function () {
            var $data = $(this).data('ppp');
            $('#blur').show();
            $.ajax({
                url: window.location.href,
                dataType: "html",
                data: '?ppp=' + $data,
                success: function (data) {
                    data = $(data);
                    var $products = data.find('.product');
                    $('.products').html($products);
                    $('.products').append('<div id="blur"></div>');
                    $('#blur').hide();
                },
                error: function(e)
                {
                    alert('Errore di connessione, si prega di riprovare: ' + e);
                }

            });
        })
    }

    function mainMenu(){
        $('.main-menu__left--list').hover(function() {
            alert("in");
            var data = $(this).data('attribute');
            find($('.main-menu__right--list[data-attribute="'+data+'"]')).show();
        }, function () {
            alert("out");
            var data = $(this).data('attribute');
            find($('.main-menu__right--list[data-attribute="'+data+'"]')).hide();
        });
    }

    function checkAut() {
        $('.check').on('click', function () {
            $(this).toggleClass('inactive');
            var check = ($(this).hasClass('inactive')) ? false : true;
            $('input[name="autorizzazione[]"]').prop('checked', check);
        });


        /* $('.check-text-si').on('click', function(event) {
         $('.check-text-no').removeClass('active');
         $(this).addClass('active');
         $('input[name="autorizzazione[]"]').prop('checked', true);
         });
         $('.check-text-no').on('click', function(event) {
         $(this).addClass('active');
         $('.check-text-si').removeClass('active');
         $('input[name="autorizzazione[]"]').prop('checked', false);
         })

         $(".wpcf7-form").on("submit", function (event) {
         if ($('input[name="autorizzazione[]"]').is(':checked')) {
         $(".label_aut").css("color", "#737373");
         } else {
         $(".label_aut").css("color", "#D0043C");
         }
         });*/
    }

    function initCarousel() {
        /*  $('.carousel_up-sells').owlCarousel({
         loop:true,
         margin:10,
         nav:true,
         responsive:{
         0:{
         items:1
         },
         600:{
         items:3
         },
         1000:{
         items:5
         }
         }
         })*/
    }

    // Load Events
    $(document).ready(UTIL.loadEvents);


})(jQuery); // Fully reference jQuery after this point.
