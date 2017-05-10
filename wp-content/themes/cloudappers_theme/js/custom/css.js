jQuery.lazyLoadXT.autoInit = false;
// jQuery.lazyLoadXT.bgAttr = 'data-image-src';

jQuery.lazyLoadXT.onshow = function () {
};

jQuery.lazyLoadXT.onload = function () {

	if (jQuery(this).hasClass('img-lazy')) {
		jQuery(this).removeClass('lazy-not-loaded');
		jQuery(this).addClass('fadeIn');
		// jQuery(this).parent().children('.lazy-loader-effect').css('z-index', 0).delay(1500).queue(function() { jQuery(this).remove(); });
		jQuery(this).parent().children('.lazy-loader-effect').delay(1500).queue(function() { jQuery(this).remove(); });
	}
};

jQuery(function ($) {

	function checkVisible(elm, threshold, mode) {
		threshold = threshold || 0;
		mode = mode || 'visible';

		var rect = elm[0].getBoundingClientRect();
		var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
		var above = rect.bottom - threshold < 0;
		var below = rect.top - viewHeight + threshold >= 0;

		return mode === 'above' ? above : (mode === 'below' ? below : !above && !below);
	}

	$('.lazy-background').lazyLoadXT({show: false});

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

    //Menu resize
    $(document).on("scroll", function () {
        if ($(document).scrollTop() > 100) {
            $(".top-header").addClass("small");
        } else {
            $(".top-header").removeClass("small")
        }
    });


	//Menu button effect
    document.querySelector( "#nav-toggle" )
        .addEventListener( "click", function() {
            this.classList.toggle( "active" );
        });

   //Change Menu background
    $('#nav-toggle').on('click', function(){
        $(".top-header").toggleClass("opened");
    });


});

