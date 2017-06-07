<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 4/5/2016
 * Time: 1:36 AM
 */

function ajaxApplyForJob()
{
	$response['error'] = 1;
	$response['message_color'] = '#a94442';

	if(!validHttpAction($_POST, ['full_name', 'email', 'phone', 'location', 'years_of_experience', 'expected_salary']) && !validHttpAction($_FILES, ['cv_file']))
	{
		$response['message'] = 'Something went wrong please try again later.';
		$response['error_code'] = 1;
		sendResponse($response);
	}

	$uploaded = upload_file($_FILES, $_POST['full_name'], 'CVS');

	if(empty($uploaded[0]['attach_id'])) {
		$response['message'] = 'Something went wrong please try again later.';
		$response['error_code'] = 2;
		sendResponse($response);
	}

	$user_data = [
		'post_title' => trim($_POST['full_name']),
		'cv_email' => trim($_POST['email']),
		'cv_phone' => trim($_POST['phone']),
		'cv_location' => trim($_POST['location']),
		'cv_years_of_experience' => trim($_POST['years_of_experience']),
		'cv_expected_salary' => trim($_POST['expected_salary']),
		'cv_info_one' => trim($_POST['cv_info_one']),
		'cv_file' => trim($uploaded[0]['attach_id']),
		'cv_state' => trim($_POST['cv_state']),
		'cv_applied_for_position' => trim($_POST['cv_applied_for_position'])
	];

	$isAdded = add_pod((new CVModel())->pod_name, $user_data);

	if(!$isAdded) {
		$response['message'] = 'Something went wrong please try again later.';
		$response['error_code'] = 3;
		sendResponse($response);
	}

	$user_data['cv_id'] = $isAdded;
	sendAdminNewJobRequestEmail($user_data);

	$response['error'] = 0;
	$response['message_color'] = '#3c763d';
	$response['message'] = 'Thank you for applying.';
	sendResponse($response);
}

add_action("wp_ajax_ajaxApplyForJob", "ajaxApplyForJob");
add_action("wp_ajax_nopriv_ajaxApplyForJob", "ajaxApplyForJob");


function ajaxGetInTouch()
{
	$response['error'] = 1;
	$response['message_color'] = '#a94442';

	if(!validHttpAction($_POST, ['name', 'email', 'note']))
	{
		$response['message'] = 'Something went wrong please try again later.';
		$response['error_code'] = 1;
		sendResponse($response);
	}

	if(!sendGetInTouchAdminEmail($_POST)){
		$response['message'] = 'Something went wrong please try again later.';
		$response['error_code'] = 2;
		sendResponse($response);
	}

	$response['error'] = 0;
	$response['message_color'] = '#3c763d';
	$response['message'] = 'Thank you for contact us.';
	sendResponse($response);
}

add_action("wp_ajax_ajaxGetInTouch", "ajaxGetInTouch");
add_action("wp_ajax_nopriv_ajaxGetInTouch", "ajaxGetInTouch");


function sendResponse($response)
{
	header('Content-Type: application/json');
	echo json_encode($response);
	wp_die();
}