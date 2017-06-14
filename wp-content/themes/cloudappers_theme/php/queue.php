<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 4/5/2016
 * Time: 1:36 AM
 */

function project_scripts()
{
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_deregister_script('jquery-core');
		wp_deregister_script('jquery-migrate');
		wp_deregister_script('wp-embed');
	}

	//CSS
	wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/css/bootstrap/bootstrap/bootstrap.min.css', [], '2.0');
	wp_enqueue_style('formValidationcss', get_template_directory_uri() . '/css/bootstrap/bootstrap/formValidation.min.css', [], '1.0');
	wp_enqueue_style('fontawesomecss', get_template_directory_uri() . '/css/font-awesome/font-awesome.min.css', [], '1.0');
	wp_enqueue_style('slick-css', get_template_directory_uri() . '/css/slick-slider/slick.css', [], '3.4');
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/css/slick-slider/slick-theme.css', [], '3.6');
//	if(is_home() || in_array(basename(get_page_template()), ['contact-us.php'])) {
	wp_enqueue_style('bootstrap-fileinput-css', get_template_directory_uri() . '/css/bootstrap/bootstrap-fileinput/css/fileinput.min.css', [], '1');
//	}
	wp_enqueue_style('layout', get_template_directory_uri() . '/css/custom/default-style.css', [], '5.96');

	//JQUERY
	$script_const = [
		'ajaxurl' => admin_url('admin-ajax.php'),
		'ReCaptcha_SiteKey' => '6LdqzCAUAAAAADJJyW_TCrlAdCSGlxqWkZBoU4P9',
		'error_message' => 'Something went wrong please try again later.',
		'error_message_color' => '#a94442',
		'page_template' => basename(get_page_template()),
	];

	if (is_home() || in_array(basename(get_page_template()), ['contact-us.php'])) {
		$homePagePost = get_page_by_path('home', OBJECT, 'page');
		$pageOptions = acf_get_group_fields($homePagePost->ID);
		$script_const['map_pins_url'] = esc_url($pageOptions['home_page_map_pins'][0]['home_page_map_pin_image']['url']);
		$script_const['pin_latitude'] = $pageOptions['home_page_map_pins'][0]['home_page_map_pin_latitude'];
		$script_const['pin_altitude'] = $pageOptions['home_page_map_pins'][0]['home_page_map_pin_altitude'];
	}

	wp_enqueue_script('jquery-min', get_template_directory_uri() . '/js/jquery/jquery-2.2.2.min.js', [], '2.2.2', FALSE);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', ['jquery-min'], '2', FALSE);
	wp_enqueue_script('lazyloadxt', get_template_directory_uri() . '/js/lazy-load-xt/jquery.lazyloadxt.min.js', ['jquery-min'], '1', FALSE);
	wp_enqueue_script('lazyloadxt-bootstrap', get_template_directory_uri() . '/js/lazy-load-xt/jquery.lazyloadxt.bootstrap.min.js', ['jquery-min', 'lazyloadxt'], '1', FALSE);
	wp_enqueue_script('lazyloadxt-background', get_template_directory_uri() . '/js/lazy-load-xt/jquery.lazyloadxt.bg.min.js', ['jquery-min', 'lazyloadxt'], '1', FALSE);
	wp_enqueue_script('formValidation', get_template_directory_uri() . '/js/bootstrap/formValidation.min.js', ['bootstrap'], '1', TRUE);
	wp_enqueue_script('bootstrapValidation', get_template_directory_uri() . '/js/bootstrap/bootstrapValidation.min.js', ['formValidation'], '1', TRUE);
	wp_enqueue_script('reCaptcha2', get_template_directory_uri() . '/js/bootstrap/reCaptcha2.min.js', ['formValidation'], '1', TRUE);
	wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick-slider/slick.min.js', ['jquery-min'], '1', FALSE);
	wp_enqueue_script('parallax', get_template_directory_uri() . '/js/parallax/parallax.min.js', ['jquery-min'], '1', FALSE);

	if (is_home() || in_array(basename(get_page_template()), ['contact-us.php'])) {
		wp_enqueue_script('google_map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDWs0rsi44WbJwTxkHdutuiLXXyQZ8pd68&callback', ['jquery-min'], '1', TRUE);
		wp_enqueue_script('google_map_js', get_template_directory_uri() . '/js/custom/google_map.js', ['jquery-min', 'google_map'], '2.0', TRUE);
	}

//	if(is_home() || in_array(basename(get_page_template()), ['contact-us.php'])) {
	wp_enqueue_script('bootstrap-fileinput-js', get_template_directory_uri() . '/js/bootstrap/bootstrap-fileinput/js/fileinput.min.js', ['jquery-min', 'bootstrap'], '1', FALSE);
//	}
//	if (in_array(basename(get_page_template()), ['projects.php','team.php'])) {
	wp_enqueue_script('bootstrap-isotope-js', get_template_directory_uri() . '/js/isotope/isotope.pkgd.min.js', ['jquery-min'], '1', FALSE);
	wp_enqueue_script('imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded/imagesloaded.pkgd.min.js', ['jquery-min'], '1', FALSE);
//	}

	//wp_enqueue_script('helpers_js', get_template_directory_uri() . '/js/custom/helpers.js', ['jquery-min'], '1.0', FALSE);
	wp_enqueue_script('css_js', get_template_directory_uri() . '/js/custom/css.js', ['jquery-min'], '2.1', FALSE);
	wp_enqueue_script('ajax_js', get_template_directory_uri() . '/js/custom/ajax.js', ['jquery-min'], '1.50', TRUE);
	wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/custom/theme.js', ['jquery-min'], '1.19', TRUE);

	wp_localize_script('theme_js', 'script_const', $script_const);
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