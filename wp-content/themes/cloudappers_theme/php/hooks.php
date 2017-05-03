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


add_action( 'admin_head', 'hide_editor' );

function hide_editor()
{
	global $pagenow;
	if (!('post.php' == $pagenow)) return;

	global $post;
//	// Get the Post ID.
//	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
//	if (!isset($post_id)) return;
}