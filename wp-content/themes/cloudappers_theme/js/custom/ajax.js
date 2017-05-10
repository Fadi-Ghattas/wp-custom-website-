jQuery(function ($)
{
	var send_ajax = 1;

	$('#JobModal').on('init.field.fv', function (e, data) {
		var $parent = data.element.parents('.form-group'),
			$icon = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');
		$icon.on('click.clearing', function () {
			if ($icon.hasClass('glyphicon-remove')) {
				data.fv.resetField(data.element);
			}
		});
	}).formValidation({
		framework: 'bootstrap',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			'full_name': {
				icon: false,
				validators: {
					notEmpty: {
						message: 'Your Full Name is required.'
					}
				}
			},
			'email': {
				icon: false,
				validators: {
					notEmpty: {
						message: 'Your Email is required.'
					}, emailAddress: {
						message: ' '
					}, regexp: {
						regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
						message: 'This email address is not valid please try again.'
					}
				}
			},
			'phone': {
				icon: false,
				validators: {
					notEmpty: {
						message: 'Your Phone Number is required.'
					}
				}
			},
			'location': {
				icon: false,
				validators: {
					notEmpty: {
						message: 'Location is required.'
					}
				}
			},
			'years_of_experience': {
				icon: false,
				validators: {
					notEmpty: {
						message: 'Your Years of Experience is required.'
					}
				}
			},
			'expected_salary': {
				icon: false,
				validators: {
					notEmpty: {
						message: 'Your Expected Salary is required.'
					}
				}
			},
			'cv_file': {
				icon: false,
				validators: {
					notEmpty: {
						message: 'Your CV is required.'
					},
					file: {
						maxSize: 10 * 1024 * 1024,
						message: 'The CV file must not exceed 10MB',
					},
				}
			},
		}
	}).on('err.validator.fv', function (e, data) {
		if (data.field === 'email') {
			data.element
				.data('fv.messages')
				.find('.help-block[data-fv-for="' + data.field + '"]').hide()
				.filter('[data-fv-validator="' + data.validator + '"]').show();
		}
	}).on('success.form.fv', function (e) {
		e.preventDefault();
		if (send_ajax) {

			var formData = new FormData();
			formData.append('action', 'ajaxApplyForJob');
			formData.append('full_name', $('#JobModal #full_name').val());
			formData.append('email', $('#JobModal #email').val());
			formData.append('phone', $('#JobModal #phone').val());
			formData.append('location', $('#JobModal #location').val());
			formData.append('years_of_experience', $('#JobModal #years_of_experience').val());
			formData.append('expected_salary', $('#JobModal #expected_salary').val());
			formData.append('cv_info_one', $('#JobModal #cv_info_one').text());
			formData.append('cv_file', $('#JobModal #cv_file')[0].files[0]);

			$.ajax({
				beforeSend: function (xhr) {
					send_ajax = 0;
				},
				method: "POST",
				url: script_const.ajaxurl,
				cache: false,
				contentType: false,
				processData: false,
				data: formData,
				success: function (response) {
				},
				error: function (jqXHR, textStatus, errorThrown) {
				},
				complete: function () {
					send_ajax = 1;
				}
			});
		}
	});

});