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
			$From = 'From: ' . $data['full_name'] . ' <' . $data['email_address'] . '>';
			$subject = 'Cloudappes | You\'ve received a new job request';

			$body = file_get_contents(get_stylesheet_directory() . '/email-templates/admin-new-job-request.html');
			$body = str_replace('{home_url}', home_url(), $body);
			$body = str_replace('{logo_url}', esc_url(get_template_directory_uri()) . '/img/CA-full-logo.png', $body);

			$body = str_replace('{full_name}', $data['post_title'], $body);
			$body = str_replace('{email_address}', $data['cv_email'], $body);
			$body = str_replace('{cv_phone}', $data['cv_phone'], $body);
			$body = str_replace('{cv_location}', $data['cv_location'], $body);
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