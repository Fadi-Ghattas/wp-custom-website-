<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 4/5/2016
 * Time: 1:36 AM
 */

function ajaxApplyForJob()
{
	$response['error'] = 0;

	if(!validHttpAction($_POST, ['full_name', 'email', 'phone', 'location', 'years_of_experience', 'expected_salary']))
	{
		$response['error'] = 1;
		$response['message'] = 'Something went wrong please try again later.';
		sendResponse($response);
	}

}

add_action("wp_ajax_ajaxApplyForJob", "ajaxApplyForJob");
add_action("wp_ajax_nopriv_ajaxApplyForJob", "ajaxApplyForJob");

function sendResponse($response)
{
	header('Content-Type: application/json');
	echo json_encode($response);
	wp_die();
}