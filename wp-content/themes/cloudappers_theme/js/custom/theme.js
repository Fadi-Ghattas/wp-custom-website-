jQuery(function ($) {



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

});