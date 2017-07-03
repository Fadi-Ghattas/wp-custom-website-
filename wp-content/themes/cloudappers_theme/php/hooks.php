<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 4/5/2016
 * Time: 1:36 AM
 */

function project_custom_setup()
{
	//adding images sizes
	add_theme_support('post-thumbnails');
//    add_image_size('project-slide', 1170, 992, true);

	//remove admin bar
	//add_filter('show_admin_bar', '__return_false');
}

//add_action( 'after_setup_theme', 'project_custom_setup' );

function project_custom_login_logo()
{
	echo '<style type="text/css">
	        body {
			    background: url('.get_stylesheet_directory_uri() . '/img/login-bg.png) cadetblue;
    		    background-size: cover;
			}
			
            h1 a {
                background-image: url(' . get_bloginfo('template_directory') . '/img/CA-full-logo-w.png) !important;
                width: 100% !important;
                background-size: 100% !important;
                height: 44px;
                margin: 0 auto 0px;
            }

              .login form input.button-primary
            {
                background: #4dc2eb;
                border-color: #4dc2eb;
                -webkit-box-shadow: 0 1px 0 #4dc2eb;
                box-shadow: 0 1px 0 #4dc2eb;
                color: #fff;
                text-decoration: none;
                text-shadow: 0 -1px 1px #4dc2eb,1px 0 1px #4dc2eb,0 1px 1px #4dc2eb,-1px 0 1px #4dc2eb;
            }

            .login form input.button-primary:hover,
            .login form input.button-primary:focus
             {
                background: #4dc2eb;
                color: #fff;
                border: 1px solid #4dc2eb;
                box-shadow: 0px 0px 6px 0px #4dc2eb;
                -webkit-box-shadow: 0px 0px 6px 0px #4dc2eb;
                -moz-box-shadow: 0px 0px 6px 0px #4dc2eb;
            }

            form#loginform {
                border: 1px solid #4dc2eb;
                border-radius: 16px;
                box-shadow: 0px 0px 15px 0px #4dc2eb;
                -webkit-box-shadow: 0px 0px 15px 0px #4dc2eb;
                -moz-box-shadow: 0px 0px 15px 0px #4dc2eb;
                opacity: 1;
            }
            
            .login #backtoblog a, .login #nav a {
             	   color: #fff;
             }
             
              a:focus {
                -webkit-box-shadow: none;
                box-shadow: none;
                outline:none;
            }
         </style>';
}

add_action('login_head', 'project_custom_login_logo');

add_action('init', 'remove_editor_init');

function my_login_logo_url_title() {
	return 'CLOUDAPPERS';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function custom_loginlogo_url($url) {

	return home_url();
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );

function remove_editor_init()
{
	// If not in the admin, return.
	if (!is_admin()) {
		return;
	}

	// Get the post ID on edit post with filter_input super global inspection.
	$current_post_id = filter_input(INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT);
	// Get the post ID on update post with filter_input super global inspection.
	$update_post_id = filter_input(INPUT_POST, 'post_ID', FILTER_SANITIZE_NUMBER_INT);

	// Check to see if the post ID is set, else return.
	if (isset($current_post_id)) {
		$post_id = absint($current_post_id);
	} else if (isset($update_post_id)) {
		$post_id = absint($update_post_id);
	} else {
		return;
	}

	// Don't do anything unless there is a post_id.
	if (isset($post_id)) {
		// Get the template of the current post.
		$template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
		$template_file = explode('/', $template_file);
		// Example of removing page editor for page-your-template.php template.
		$pages = ['services.php', 'home.php', 'clients.php', 'settings.php', 'contact-us.php', 'projects.php', 'about.php', 'team.php'];
		if (in_array($template_file[sizeof($template_file) - 1], $pages)) {
			remove_post_type_support('page', 'editor');
			// Other features can also be removed in addition to the editor. See: https://codex.wordpress.org/Function_Reference/remove_post_type_support.
		}
	}
}

function add_defer_attribute($tag, $handle)
{
	// add script handles to the array below
	$scripts_to_defer = ['google_map', 'google_map_js'];

	foreach ($scripts_to_defer as $defer_script) {
		if ($defer_script === $handle) {
			return str_replace(' src', ' defer="defer" src', $tag);
		}
	}
	return $tag;
}

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

function add_async_attribute($tag, $handle)
{
	// add script handles to the array below
	$scripts_to_async = ['google_map', 'google_map_js'];

	foreach ($scripts_to_async as $async_script) {
		if ($async_script === $handle) {
			return str_replace(' src', ' async="async" src', $tag);
		}
	}
	return $tag;
}

add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

// define the custom replacement callback
function get_custom_sep() {
	return  "/";
}

// define the action for register yoast_variable replacments
function register_custom_yoast_variables() {
	wpseo_register_var_replacement( '%%cloudappes_sep%%', 'get_custom_sep', 'advanced', 'Return the / sep.' );
}
// Add action
add_action('wpseo_register_extra_replacements', 'register_custom_yoast_variables', 10, 0);