<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 4/5/2016
 * Time: 1:36 AM
 */
function sendAdminNewJobRequestEmail($data)
{
	$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
	$setting = acf_get_group_fields($setting->ID);

	if (!empty($setting['jobs_emails'])) {
		foreach ($setting['jobs_emails'] as $email) {
			$to = $email['job_email'];
			$From = 'From: ' . $data['post_title'] . ' <' . $data['cv_email'] . '>';
			$subject = 'Cloudappes | You\'ve received a new job request';

			$body = file_get_contents(get_stylesheet_directory() . '/email-templates/admin-new-job-request.html');
			$body = str_replace('{home_url}', home_url(), $body);
			$body = str_replace('{logo_url}', esc_url(get_template_directory_uri()) . '/img/CA-full-logo.png', $body);

			$body = str_replace('{post_title}', $data['post_title'], $body);
			$body = str_replace('{cv_email}', $data['cv_email'], $body);
			$body = str_replace('{cv_phone}', $data['cv_phone'], $body);
			$body = str_replace('{cv_location}', $data['cv_location'], $body);
			$body = str_replace('{cv_state}', $data['cv_state'], $body);
			$body = str_replace('{cv_applied_for_position}', $data['cv_applied_for_position'], $body);
			$body = str_replace('{cv_years_of_experience}', $data['cv_years_of_experience'], $body);
			$body = str_replace('{cv_expected_salary}', $data['cv_expected_salary'], $body);
			$body = str_replace('{cv_info_one}', $data['cv_info_one'], $body);
			$body = str_replace('{cv_link}', home_url('/wp-admin/post.php?post=' . $data['cv_id'] . '&action=edit'), $body);
			$body = str_replace('{date}', date('Y'), $body);

			$headers = ['Content-Type: text/html; charset=UTF-8', $From];

			if (!wp_mail($to, $subject, $body, $headers))
				return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function sendGetInTouchAdminEmail($data)
{
	$setting = get_page_by_path('cloudappers-setting', OBJECT, 'page');
	$setting = acf_get_group_fields($setting->ID);

	if (!empty($setting['admins_emails'])) {
		foreach ($setting['admins_emails'] as $email) {
			$to = $email['admin_email'];
			$From = 'From: ' . $data['name'] . ' <' . $data['email'] . '>';
			$subject = 'Cloudappes | Some one want to get in touch with Cloudappers';

			$body = file_get_contents(get_stylesheet_directory() . '/email-templates/get-in-touch.html');
			$body = str_replace('{home_url}', home_url(), $body);
			$body = str_replace('{logo_url}', esc_url(get_template_directory_uri()) . '/img/CA-full-logo.png', $body);

			$body = str_replace('{name}', $data['name'], $body);
			$body = str_replace('{email}', $data['email'], $body);
			$body = str_replace('{note}', $data['note'], $body);
			$body = str_replace('{date}', date('Y'), $body);

			$headers = ['Content-Type: text/html; charset=UTF-8', $From];

			if (!wp_mail($to, $subject, $body, $headers))
				return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}