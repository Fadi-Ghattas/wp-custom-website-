<?php
/*
Plugin Name: WP Check No JavaScript or Cookie
Plugin URI: http://www.tipsandtricks-hq.com/development-center
Description: This plugin will display a warning message to your visitors if their browser's Javascript or Cookie is disabled.
Version: 1.2
Author: Tips and Tricks HQ
Author URI: http://www.tipsandtricks-hq.com/
License: GPL
*/

function wp_check_js_and_cookie_style()
{
?>
<style type="text/css">
.wpNoJsCookieAlert{border: 1px solid #FF0000;color: #FF0000;padding: 0.5em;text-align: center;margin: auto;width: 900px;}
#wp_nojs_warning{background:#FFFECF;position:fixed;left:0;top:0;padding:10px 10px 10px 0px;width:100%;border-bottom: 1px solid #E8E7C3;}
#wp_nocookie_warning{background:#FFFECF;position:fixed;left:0;top:0;padding:10px 10px 10px 0px;width:100%;border-bottom: 1px solid #E8E7C3;}
</style>
<?php
}

function wp_check_js_and_cookie_conditions() {
	$output = "";	
	$output .= '<noscript><div id="wp_nojs_warning"><p class="wpNoJsCookieAlert">NOTE: Many features on this website require JavaScript. You can enable JavaScript via your browser\'s preference settings.</p></div></noscript>';
	?>
	<script type="text/javascript">
	var cookieEnabled=(navigator.cookieEnabled)? true : false;   
	if (typeof navigator.cookieEnabled=="undefined" && !cookieEnabled){ 
		document.cookie="testcookie";
	    cookieEnabled=(document.cookie.indexOf("testcookie")!=-1)? true : false;
	}
	if(!cookieEnabled){
		document.write('<div id="wp_nocookie_warning"><p class="wpNoJsCookieAlert">NOTE: Many features on this website require Cookie. You can enable Cookie via your browser\'s preference settings.</p></div>');
	}
	</script>    
	<?php
	echo $output;
}

add_action('wp_head', 'wp_check_js_and_cookie_style');//add CSS to header
add_action('wp_footer', 'wp_check_js_and_cookie_conditions');//add JS check to the footer
?>