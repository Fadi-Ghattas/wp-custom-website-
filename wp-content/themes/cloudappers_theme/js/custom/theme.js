jQuery(function ($) {

	$('#take-me-in').on('click', function (e) {
		$('#JobModal').modal('show');
	});

    $('#take-me-there').on('click', function (e) {
        $('#map-popup').modal('show');
    });

	$('.apply-for-position').on('click', function (e) {
		$('#JobModal').modal('show');
		$('#JobModal select#location').parent().children('label').addClass('focus');
		$('#JobModal #applied-position').text('').text(' for ' + $(this).attr('data-applied-position')).css('display','inline-block');
		$('#JobModal select#location').val($(this).attr('data-location'));
		$('#JobModal #cv_state').val($(this).attr('data-state'));
		$('#JobModal #applied_position').val($(this).attr('data-applied-position'));
	});


	//$('.modal').on('show.bs.modal', function (e) {
	//	$('body').bind('touchmove', function(e){e.preventDefault()});
	//	console.log('bind');
	//})
    //
	//$('.modal').on('hide.bs.modal', function (e) {
	//	$('body').unbind('touchmove');
	//	console.log('unbind');
	//})
	document.ontouchmove = function ( event ) {

		var isTouchMoveAllowed = true, target = event.target;

		while ( target !== null ) {
			if ( target.classList && target.classList.contains( 'modal-open' ) ) {
				isTouchMoveAllowed = false;
				break;
			}
			target = target.parentNode;
		}

		if ( !isTouchMoveAllowed ) {
			event.preventDefault();
		}

	};



	function removeIOSRubberEffect( element ) {

		element.addEventListener( "touchstart", function () {

			var top = element.scrollTop, totalScroll = element.scrollHeight, currentScroll = top + element.offsetHeight;

			if ( top === 0 ) {
				element.scrollTop = 1;
			} else if ( currentScroll === totalScroll ) {
				element.scrollTop = top - 1;
			}

		} );

	}

	removeIOSRubberEffect( document.querySelector( ".modal" ) );

});