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
    //Modify page titles
    // if ($('.home').length) {
    //     document.title = 'CloudAppers / Websites / Mobile Apps / UX & UI Design / Digital Startup Consultancy / Dubai UAE';
    // }
    // if ($('.page-template-about').length) {
    //     document.title = 'CloudAppers / LET US show you what we can do for you / ABOUT US';
    // }
    // if ($('.page-template-projects').length) {
    //     document.title = 'CloudAppers /  let us SHOW YOU  what we can do for you / PORTFOLIO';
    // }
    // if ($('.page-template-services').length) {
    //     document.title = 'CloudAppers / let us show you WHAT WE CAN do for you / SERVICES';
    // }
    // if ($('.page-template-contact-us').length) {
    //     document.title = 'CloudAppers / let us show you what we can do FOR YOU / CONTACT US';
    // }


    //update tooltip
    $('#menu-main-menu li:first-child a').prop('title', 'ABOUT US');
    $('#menu-main-menu li:nth-child(2) a').prop('title', 'PORTFOLIO');
    $('#menu-main-menu li:nth-child(3) a').prop('title', 'SERVICES');
    $('#menu-main-menu li:nth-child(4) a').prop('title', 'CONTACT US');

    //focus events for input
    jQuery('input,select,textarea,#cv_file').on('click focus', function () {
        jQuery(this).parents('.form-group').find('label').addClass('focus')
    })
    jQuery('#take-me-in').click(function () {
        jQuery('input,select,textarea').on('focus', function () {
            jQuery(this).parents('.form-group').find('label').addClass('focus')
        })
    });

    //brows cv onclick on field
    $('.up-cv .file-caption').on('click', function () {
        $('#cv_file').click();
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
        centerMode: true,
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
                    centerMode: false
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
    var lastScrollTop = 0;
    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScrollTop){
            jQuery('.navbar-inverse').removeClass('move');
            jQuery('.navbar-1-collapse').collapse('hide');
            jQuery('.top-header').removeClass('opened');
        } else {
            if(st > 60) {
                jQuery('.navbar-inverse').addClass('move');
            }
            else {
                jQuery('.navbar-inverse').removeClass('move');
            }
        }
        lastScrollTop = st;
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
        // layout Isotope after each image loads
        $isotope.imagesLoaded().progress(function () {
            $isotope.isotope({
                itemSelector: '.show-case-item',
                layoutMode: 'masonry',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer',
                    gutterWidth: 30
                },
            });
        });

        $('ul.filters li').on('click focus hover active touchstart', function (event) {
            if ($(window).width() < 768)
            $('html,body').animate({scrollTop: $('.all-projects ').offset().top},1000);
            // event.stopPropagation();
            event.preventDefault();
            $('ul.filters li').removeClass('active');
            $(this).addClass('active');
            $isotope.isotope({filter: $(this).children('a').attr('data-type')});
        });

        $('ul.filters li a').on('click focus hover active touchstart', function (event) {
            if ($(window).width() < 768)
            $('html,body').animate({scrollTop: $('.all-projects ').offset().top },1000);
            // event.stopPropagation();
            event.preventDefault();
            $('ul.filters li').removeClass('active');
            $(this).parent().addClass('active');
            $isotope.isotope({filter: $(this).attr('data-type')});
        });


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

        $('ul.filters li').on('click focus hover active', function (event) {
            // event.stopPropagation();
            event.preventDefault();
            $('ul.filters li').removeClass('active');
            $(this).addClass('active');
            $isotope.isotope({filter: $(this).children('a').attr('data-type')});
        });

        $('ul.filters li a').on('click focus hover active', function (event) {
            // event.stopPropagation();
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
            event.preventDefault();
            var next_ele = $(this).parents("body").find(".move-section");
            var $nextElement = next_ele.filter(":gt(" + (next_ele.index(this)) + ")").first();
            var MenuView = 0;
            if ($(window).width() > 767) {
                MenuView = parseInt($('.top-header').height());
            }
            if ($nextElement.length == 1) {
                $('html, body').stop(true).animate({
                    scrollTop: ($nextElement.offset().top - MenuView)
                }, 1000);
            } else if ($('section.client-say').length == 1) {
                $('html, body').stop(true).animate({
                    scrollTop: ($('section.client-say').offset().top - MenuView)
                }, 1000);
            } else if ($('section.project-url').length == 1) {
                $('html, body').stop(true).animate({
                    scrollTop: ($('section.project-url').offset().top - MenuView)
                }, 1000);
            } else if ($('section.prefooter').length == 1) {
                $('html, body').stop(true).animate({
                    scrollTop: ($('section.prefooter').offset().top - MenuView)
                }, 1000);
            }
            else {
                $('html, body').stop(true).animate({
                    scrollTop: ($('body').offset().top)
                }, 1000);
            }
            return false;
        });
    }

    $(window).on('load', function () {

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");
        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  // If Internet Explorer, return version number
        {
            //remove parallax
            $('.parallax-window').css('background-image', 'url(' + $('.parallax-window').attr('data-image-src') + ')').css('background-size', 'cover').css('height', '100vh');
            $('.main-wrapper').css('margin-top', '0px');
            //$('section.ca-page-header .container').css('transform', 'translate(0px, 0px)');
            $('.parallax-mirror').remove();
        }

    });


    //services section effect
    $(window).on('scroll resize load', function () {
        services();
    });

    function services() {
        if ($('.home:not(.about)').length) {
            var widthOfFirstElement = $('.home .what-we-do .row > div:first-child').width();
            var positionRight = $('.home .what-we-do .row > div:first-child').position().left;


            var lastElement = $('.home .what-we-do .row > div:last-child');
            var widthOfLastElement = lastElement.width();
            var positionLeft = lastElement.position().left;
            var windowWidth = $(window).width();

            $('.home .what-we-do .row > div:first-child .liner-effect').css("margin-left", -1 * positionRight);
            $('.home .what-we-do .row > div:first-child .liner-effect').css("padding-left", positionRight + widthOfFirstElement);
            $('.home .what-we-do .row > div:last-child .liner-effect').css("width", windowWidth - (positionLeft + widthOfLastElement) + widthOfLastElement);
        }
    }

    //scroll to services
    if ($('.page-template-services').length && (window.location.hash).length ) {

        if ($(window).width() > 1199) {
            $('html,body').animate({
                scrollTop: $('#all-services').offset().top - 30},2000);
        }

        else if ($(window).width() > 991 && $(window).width() < 1200) {
            $('html,body').animate({
                scrollTop: $('#all-services').offset().top - 75},1500);

        }

        else if ($(window).width() > 767 && $(window).width() < 992) {
            $('html,body').animate({
                scrollTop: $('#all-services').offset().top - 125},1500);
        }
    }

    // $('.parallax-window').parallax({imageSrc: 'http://localhost/cloudappers/wp-content/uploads/2017/05/show_you_page_header_image-1.jpg', androidFix:false});

    if ($('.page-template-projects').length) {

        // var stickyHeaderTop = $('.all-projects.some-of-show-cases').offset().top;
        // var stickyHeaderBottom = $('.all-projects.some-of-show-cases').position().top + $('.all-projects.some-of-show-cases').outerHeight(true);
        // var scrollBottom = $(window).scrollTop() + $(window).height();
        $(document).on("scroll", function () {
            if ($(window).scrollTop() >= $(".all-projects.some-of-show-cases").offset().top) {
                $(".filters-wrapper").addClass("fixed_filter");
            }
            else {
                $(".filters-wrapper").removeClass("fixed_filter");
            }

            if($(window).scrollTop() >= $(".prefooter").offset().top - 500) {
                $(".filters-wrapper").removeClass("fixed_filter");
            }

        });
    }


});