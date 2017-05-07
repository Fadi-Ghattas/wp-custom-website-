jQuery.lazyLoadXT.autoInit = false;
// jQuery.lazyLoadXT.bgAttr = 'data-image-src';

jQuery.lazyLoadXT.onshow = function () {
	// if (jQuery(this).hasClass('parallax-lazy-background'))
	// {
	// 	jQuery(this).parallax({imageSrc: jQuery(this).attr('data-image-src')});
	// }
};


jQuery.lazyLoadXT.onload = function () {

	// if (jQuery(this).hasClass('parallax-lazy-background'))
	// {
	// 	jQuery(this).parallax({imageSrc: jQuery(this).attr('data-image-src')});
	// 	// jQuery(this).removeAttr('style');
	// }

	if (jQuery(this).hasClass('img-lazy')) {
		jQuery(this).removeClass('lazy-not-loaded');
		jQuery(this).addClass('fadeIn');
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



	// $('.parallax-lazy-background').each(function (index) {
	// 	if (checkVisible($(this))) {
	// 	$(this).lazyLoadXT({show: false});
	// 	}
	// });

	$(window).on('scroll resize load', function () {

		$('.lazy-background').lazyLoadXT({show: false});

		// $('.parallax-lazy-background').each(function (index) {
		// 	$(this).parallax({imageSrc: $(this).attr('data-image-src')});
		// 	// if (checkVisible($(this))) {
		// 	// 	$(this).lazyLoadXT({show: false});
		// 	// }
		// });

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

});

