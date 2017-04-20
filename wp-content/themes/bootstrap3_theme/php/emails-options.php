<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 4/5/2016
 * Time: 4:39 AM
 */

if ( !function_exists('add_action') ) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

if ( !class_exists('wp_mail_from') ) {
    class wp_mail_from {

        function wp_mail_from() {
            add_filter( 'wp_mail_from', array(&$this, 'fb_mail_from') );
            add_filter( 'wp_mail_from_name', array(&$this, 'fb_mail_from_name') );
        }

        // new name
        function fb_mail_from_name() {
//            $Settings = pods('menu_settings');
//            $name = $Settings->display('menu_email_name');
//            $name = esc_attr($name);
//            return $name;
        }

        // new email-adress
        function fb_mail_from() {
//            $Settings = pods('menu_settings');
//            $email = $Settings->display('menu_email');
//            $email = is_email($email);
//            return $email;
        }
    }
    //Usage $wp_mail_from = new wp_mail_from();
}
