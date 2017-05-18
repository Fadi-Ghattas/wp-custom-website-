jQuery.lazyLoadXT.autoInit = false;
// jQuery.lazyLoadXT.bgAttr = 'data-image-src';

jQuery.lazyLoadXT.onshow = function () {
};

jQuery.lazyLoadXT.onload = function () {

	if (jQuery(this).hasClass('img-lazy')) {
		jQuery(this).removeClass('lazy-not-loaded');
		jQuery(this).removeClass('lazy-iso-not-loaded');
		jQuery(this).addClass('fadeIn');
		// jQuery(this).parent().children('.lazy-loader-effect').css('z-index', 0).delay(1500).queue(function() { jQuery(this).remove(); });
		jQuery(this).parent().children('.lazy-loader-effect').delay(1500).queue(function() { jQuery(this).remove(); });
		jQuery(this).parent().children('.loader').delay(1500).queue(function() { jQuery(this).remove(); });

		if(script_const.page_template == 'projects.php')
		{
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

    //About - words slideer
    $('.words-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        autoplay: true,
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



		if(script_const.page_template == 'projects.php')
		{
			var $isotope = $('.grid');

			$isotope.isotope({
				itemSelector: '.show-case-item',
				layoutMode: 'masonry',
				percentPosition: true,
				masonry: {
					columnWidth: '.grid-sizer'
				}
			});


			var filtered = false;
			$('ul.filters li a').on('click',function (e) {
				e.preventDefault();
				$('ul.filters li a').each(function (index){ $(this).removeClass('active'); });
				$(this).addClass('active');
				filtered = true;
				$isotope.isotope({ filter:  $(this).attr('data-type') });
				$isotope.on( 'layoutComplete', function( event, filteredItems ) {
					if(filtered) {
						ReLayout();
						filtered = false;
					}
				});
			});

			function ReLayout()
			{
				var col = 0;
				var defaultCol = 'col-xs-12 col-sm-6 col-md-4 col-lg-4 show-case-item zoom-effect ';
				var colPos = '';
				$('.show-case-item').each(function (index) {

					if($(this).css('display') != 'none')
					{
						if(col == 0) {
							 colPos = ' col-lg-left col-sm-left col-xs-left ';
						} else if(col == 1) {
							 colPos = ' col-lg-center col-sm-center col-xs-center ';
						} else if(col == 2) {
							 colPos = ' col-lg-right col-sm-right col-xs-right ';
						}

						$(this).attr('class', '');
						$(this).attr('class', defaultCol + $(this).attr('data-type')  + colPos);
						(col == 2 ? col = 0 : col++)
					}
				});
			}

		}

		if(script_const.page_template == 'team.php')
		{
		var $isotope = $('.grid');

		$isotope.isotope({
			itemSelector: '.team-member',
			layoutMode: 'masonry',
			percentPosition: true,
			masonry: {
				columnWidth: '.grid-sizer'
			}
		});

		var filtered = false;
		$('ul.filters li a').on('click',function (e) {
			e.preventDefault();
			$('ul.filters li a').each(function (index){ $(this).removeClass('active'); });
			$(this).addClass('active');
			filtered = true;
			console.log($(this).attr('data-type') );
			$isotope.isotope({ filter:  $(this).attr('data-type') });
		});
	}

		if($('.single-project').length)
		{

			$('section.project-slider .slider').slick({
				autoplay: true,
				infinite: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				dots: true,
			});
		}

});