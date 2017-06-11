jQuery.lazyLoadXT.autoInit = false;
// jQuery.lazyLoadXT.bgAttr = 'data-image-src';

// jQuery.lazyLoadXT.onshow = function () {
// };

jQuery.lazyLoadXT.onload = function () {

    if (jQuery(this).hasClass('img-lazy')) {

        jQuery(this).removeClass('lazy-not-loaded');
        jQuery(this).removeClass('lazy-iso-not-loaded');
        jQuery(this).addClass('fadeIn');

        jQuery(this).parent().children('.lazy-loader-effect').delay(1500).queue(function () {
            jQuery(this).remove();
        });
        jQuery(this).parent().parent().children('.lazy-loader-effect').delay(1500).queue(function () {
            jQuery(this).remove();
        });

        jQuery(this).parent().children('.loader').delay(1500).queue(function () {
            jQuery(this).remove();
        });
        jQuery(this).parent().parent().children('.loader').delay(1500).queue(function () {
            jQuery(this).remove();
        });

        if (script_const.page_template == 'projects.php') {
            var jQueryisotope = $('.grid');

            jQueryisotope.isotope({
                itemSelector: '.show-case-item',
                layoutMode: 'masonry',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        }
    }
};

jQuery(function ($) {

    //focus events for input
    jQuery('input,select,textarea,#cv_file').on('click focus', function() {
        jQuery(this).parents('.form-group').find('label').addClass('focus')
    })
    jQuery('#take-me-in').click(function() {
        jQuery('input,select,textarea').on('focus', function() {
            jQuery(this).parents('.form-group').find('label').addClass('focus')
        })
    });

    function checkVisible(elm, threshold, mode) {
        threshold = threshold || 0;
        mode = mode || 'visible';

        var rect = elm[0].getBoundingClientRect();
        var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
        var above = rect.bottom - threshold < 0;
        var below = rect.top - viewHeight + threshold >= 0;

        return mode === 'above' ? above : (mode === 'below' ? below : !above && !below);
    }

    $(window).on('scroll resize load', function () {

        $('.img-lazy').each(function (index) {
            if (checkVisible($(this))) {
                $(this).lazyLoadXT({show: false});
            }
        });

    });

    //Home slider
    $('.home-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false
    });


    //About - History slider
    $('.slider-nav').slick({
        infinite: false,
        slidesToShow: 10,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        dots: false,
        focusOnSelect: true,
        centerMode: false,
        variableWidth: true,
        asNavFor: '.history-slider',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    centerMode: true
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    centerMode: true
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true
                }
            }
        ]
    });

    $('.history-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        autoplay: false,
        centerMode:true,
        variableWidth: true,
        asNavFor: '.slider-nav',
        customPaging: function (slider, i) {
            var desc = $(slider.$slides[i]).data('desc');
            return '<a href="javascript:void(0)"><span>' + desc + '</span><div class="pulse1"></div></div></a>';
        },
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    variableWidth: false,
                    centerMode:false
                }
            }
        ]
    });

    //About - fix pager
    $('.history-slider .slick-dots').wrap("<div class='pager-wrap'></div>");

    //About - words slider
    $('.words-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        autoplay: false,
    });

    //Menu resize
    $(document).on("scroll", function () {
        if ($(document).scrollTop() > 100) {
            $(".top-header").addClass("small");
        } else {
            $(".top-header").removeClass("small")
        }
    });


    //Menu button effect
    document.querySelector("#nav-toggle")
        .addEventListener("click", function () {
            this.classList.toggle("active");
        });

    //Change Menu background
    $('#nav-toggle').on('click', function () {
        $(".top-header").toggleClass("opened");
    });


    if (script_const.page_template == 'projects.php') {
        var $isotope = $('.grid');

        $isotope.isotope({
            itemSelector: '.show-case-item',
            layoutMode: 'masonry',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });

        // filtered = true;

        // $isotope.on('layoutComplete', function (event, filteredItems) {
        //     if (filtered) {
        //         //ReLayout();
        //         filtered = false;
        //     }
        // });

        var filtered = false;
        $('ul.filters li').on('click focus hover active touchstart', function (event) {
            event.stopPropagation();
            event.preventDefault();
            $('ul.filters li').removeClass('active');
            $(this).addClass('active');
            filtered = true;
            $isotope.isotope({filter: $(this).children('a').attr('data-type')});
            // $isotope.on('layoutComplete', function (event, filteredItems) {
            //     if (filtered) {
            //         ReLayout();
            //         filtered = false;
            //     }
            // });
        });

        $('ul.filters li a').on('click focus hover active touchstart', function (event) {
            event.stopPropagation();
            event.preventDefault();
            $('ul.filters li').removeClass('active');
            $(this).parent().addClass('active');
            filtered = true;
            $isotope.isotope({filter: $(this).attr('data-type')});
            // $isotope.on('layoutComplete', function (event, filteredItems) {
            //     if (filtered) {
            //         ReLayout();
            //         filtered = false;
            //     }
            // });
        });

        function ReLayout() {
            var col = 0;
            var defaultCol = 'col-xs-12 col-sm-6 col-md-4 col-lg-4 show-case-item zoom-effect ';
            var colPos = '';
            $('.show-case-item').each(function (index) {

                if ($(this).css('display') != 'none') {
                    if (col == 0) {
                        colPos = ' col-lg-left col-sm-left col-xs-left ';
                    } else if (col == 1) {
                        colPos = ' col-lg-center col-sm-center col-xs-center ';
                    } else if (col == 2) {
                        colPos = ' col-lg-right col-sm-right col-xs-right ';
                    }

                    $(this).attr('class', '');
                    $(this).attr('class', defaultCol + $(this).attr('data-type') + colPos);
                    (col == 2 ? col = 0 : col++)
                }
            });
        }

    }

    if (script_const.page_template == 'team.php') {
        var $isotope = $('.grid');

        $isotope.isotope({
            itemSelector: '.team-member',
            layoutMode: 'masonry',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });

        $('ul.filters li').on('click focus hover active touchstart', function (event) {
            event.stopPropagation();
            event.preventDefault();
            $('ul.filters li').removeClass('active');
            $(this).addClass('active');
            $isotope.isotope({filter: $(this).children('a').attr('data-type')});
        });

        $('ul.filters li a').on('click focus hover active touchstart', function (event) {
            event.stopPropagation();
            event.preventDefault();
            $('ul.filters li').removeClass('active');
            $(this).parent().addClass('active');
            $isotope.isotope({filter: $(this).attr('data-type')});
        });
    }

    if ($('.single-project').length) {

        $('section.project-slider .slider').slick({
            autoplay: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
        });

        $('.move-section').on('click', function (event) {
            var next = (parseInt($(this).attr('data-index')) + 1);
            var $nextElement = $('.move-section[data-index="' + next + '"]');
            if ($nextElement.length) {
                if($nextElement.length > 1 ) {
                    $('.move-section[data-index="' + next + '"]').each(function(index) {
                        if( $(this).is(':visible')){
                            $nextElement = $(this);
                        }
                    });
                }
                $('html, body').stop(true).animate({
                    scrollTop: ($nextElement.offset().top - parseInt($('.top-header').height())) + 5
                }, 1000);
                return false;
            } else {
                $('html, body').stop(true).animate({
                    scrollTop: ($('section.client-say').offset().top - parseInt($('.top-header').height())) + 5
                }, 1000);
                return false;
            }
        });
    }

    // $(".parallax-slider").on("load", function() {
    //     //$(window).trigger("resize").trigger("scroll");
    //     // Other code...
    //     //console.log('here');
    // });

    //jQuery('.parallax-window').parallax({imageSrc: jQuery('.parallax-window').attr('data-image-src')});
});