jQuery(function ($) {

	$('#take-me-in').on('click', function (e) {
		$('#JobModal').modal('show');
	});

    $('#take-me-there').on('click', function (e) {
        $('#map-popup').modal('show');
    });

	$('.apply-for-position').on('click', function (e) {
		$('#JobModal').modal('show');
		$('#JobModal #applied-position').text('').text(' for ' + $(this).attr('data-applied-position')).css('display','inline-block');
		$('#JobModal select#location').val($(this).attr('data-location'));
		$('#JobModal #cv_state').val($(this).attr('data-state'));
	});

});