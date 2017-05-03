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
    //add_image_size('template-small-size', 358, 222, true);

    //remove admin bar
    add_filter('show_admin_bar', '__return_false');
}

//add_action( 'after_setup_theme', 'project_custom_setup' );

function project_custom_login_logo()
{
    echo '<style type="text/css">
            h1 a { background-image: url(' . get_bloginfo('template_directory') . '/imgs/logo.png) !important; }
         </style>';
}

//add_action('login_head', 'project_custom_login_logo');


add_action( 'init', 'remove_editor_init' );

function remove_editor_init() {
	// If not in the admin, return.
	if ( ! is_admin() ) {
		return;
	}

	// Get the post ID on edit post with filter_input super global inspection.
	$current_post_id = filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT );
	// Get the post ID on update post with filter_input super global inspection.
	$update_post_id = filter_input( INPUT_POST, 'post_ID', FILTER_SANITIZE_NUMBER_INT );

	// Check to see if the post ID is set, else return.
	if ( isset( $current_post_id ) ) {
		$post_id = absint( $current_post_id );
	} else if ( isset( $update_post_id ) ) {
		$post_id = absint( $update_post_id );
	} else {
		return;
	}

	// Don't do anything unless there is a post_id.
	if ( isset( $post_id ) ) {
		// Get the template of the current post.
		$template_file = get_post_meta( $post_id, '_wp_page_template', true );
		echo $template_file;
		die();
		// Example of removing page editor for page-your-template.php template.
		if (  'services.php' === $template_file ) {
			remove_post_type_support( 'page', 'editor' );
			// Other features can also be removed in addition to the editor. See: https://codex.wordpress.org/Function_Reference/remove_post_type_support.
		}
	}
}