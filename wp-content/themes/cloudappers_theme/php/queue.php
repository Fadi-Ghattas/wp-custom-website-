<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 4/5/2016
 * Time: 1:36 AM
 */

function project_scripts()
{
	//CSS
//	wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize/normalize.min.css', [], '1.0');
	wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/css/bootstrap/bootstrap/bootstrap.min.css', [], '1.0');
	//wp_enqueue_style('wowcss', get_template_directory_uri() . '/css/wow/animate.min.css', [], '1.0');
	wp_enqueue_style('formValidationcss', get_template_directory_uri() . '/css/bootstrap/bootstrap/formValidation.min.css', [], '1.0');
	wp_enqueue_style('fontawesomecss', get_template_directory_uri() . '/css/font-awesome/font-awesome.min.css', [], '1.0');
	wp_enqueue_style('hovercss', get_template_directory_uri() . '/css/hover/hover-min.css', [], '1.0');
//	wp_enqueue_style('sweetalert2', get_template_directory_uri() . '/css/sweetalert2/sweetalert2.min.css', [], '3.4');
	wp_enqueue_style('slick-css', get_template_directory_uri() . '/css/slick-slider/slick.css', [], '3.4');
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/css/slick-slider/slick-theme.css', [], '3.4');
	wp_enqueue_style('layout', get_template_directory_uri() . '/css/custom/default-style.css', [], '1.1');

	//JQUERY
	wp_enqueue_script('jquery-min', get_template_directory_uri() . '/js/jquery/jquery-2.2.2.min.js', [], '2.2.2', FALSE);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', ['jquery-min'], '1', TRUE);
	wp_enqueue_script('formValidation', get_template_directory_uri() . '/js/bootstrap/formValidation.min.js', ['bootstrap'], '1', TRUE);
	wp_enqueue_script('bootstrapValidation', get_template_directory_uri() . '/js/bootstrap/bootstrapValidation.min.js', ['formValidation'], '1', TRUE);
	wp_enqueue_script('reCaptcha2', get_template_directory_uri() . '/js/bootstrap/reCaptcha2.min.js', ['formValidation'], '1', TRUE);
	wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick-slider/slick.min.js', array('jquery-min'), '1', true);
	wp_enqueue_script('parallax', get_template_directory_uri() . '/js/parallax/parallax.min.js', ['jquery-min'], '1', FALSE);
	//wp_enqueue_script('cookie', get_template_directory_uri() . '/js/jquery.cookie/jquery.cookie.js', array('jquery-min'), '1', true);
	//wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow/wow.js', array('jquery-min'), '1', true);
	//wp_enqueue_script('sweet', get_template_directory_uri() . '/js/sweetalert2/sweetalert2.min.js', array('jquery-min'), '1', true);

	wp_enqueue_script('helpers_js', get_template_directory_uri() . '/js/custom/helpers.js', ['jquery-min'], '1.0', FALSE);
	wp_enqueue_script('ajax_js', get_template_directory_uri() . '/js/custom/ajax.js', ['jquery-min'], '1.0', FALSE);
	wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/custom/theme.js', ['jquery-min'], '1.0', FALSE);
	wp_localize_script('project_script_const', 'script_const', ['ajaxurl' => admin_url('admin-ajax.php')]);
}

add_action('wp_enqueue_scripts', 'project_scripts');

function project_admin_scripts()
{
	global $typenow;
//      if ($typenow=="projects") {
//
//      }
}

add_action('admin_enqueue_scripts', 'project_admin_scripts');