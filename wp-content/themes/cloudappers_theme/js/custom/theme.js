jQuery(function ($) {
	$('#take-me-in').on('click', function (e) {
		$('#JobModal').modal('show');
	});

    $('#take-me-there').on('click', function (e) {
        $('#map-popup').modal('show');
    });


});