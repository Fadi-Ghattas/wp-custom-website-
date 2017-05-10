<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 4/5/2016
 * Time: 1:36 AM
 */

function get_image_url($post_id, $size = 'thumbnail')
{
	return wp_get_attachment_image_src($post_id, $size)[0];
}

function get_google_analytics()
{
	$debug = (strpos(home_url(), 'localhost') || strpos(home_url(), 'wickedapps.net') !== FALSE ? 1 : 0);
	if (!$debug) {
		?>
		<!--google_analytics script-->
		<?php
	}
}

function format_decode_json($json)
{
	$json = str_replace('<p>', '', $json);
	$json = str_replace('</p>', '', $json);
	$json = str_replace('&#8220;', '"', $json);
	$json = str_replace('&#8221;', '"', $json);
	$json = str_replace('&#8243;', '"', $json);
	return json_decode(trim($json));
}

function randomGen($min, $max, $quantity)
{
	$numbers = range($min, $max);
	shuffle($numbers);
	return array_slice($numbers, 0, $quantity);
}

function getBrowser()
{
	$u_agent = $_SERVER['HTTP_USER_AGENT'];
	$bname = 'Unknown';
	$platform = 'Unknown';
	$version = "";

	//First get the platform?
	if (preg_match('/linux/i', $u_agent)) {
		$platform = 'linux';
	} elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
		$platform = 'mac';
	} elseif (preg_match('/windows|win32/i', $u_agent)) {
		$platform = 'windows';
	}

	// Next get the name of the useragent yes seperately and for good reason
	if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
		$bname = 'Internet Explorer';
		$ub = "MSIE";
	} elseif (preg_match('/Firefox/i', $u_agent)) {
		$bname = 'Mozilla Firefox';
		$ub = "Firefox";
	} elseif (preg_match('/Chrome/i', $u_agent)) {
		$bname = 'Google Chrome';
		$ub = "Chrome";
	} elseif (preg_match('/Safari/i', $u_agent)) {
		$bname = 'Apple Safari';
		$ub = "Safari";
	} elseif (preg_match('/Opera/i', $u_agent)) {
		$bname = 'Opera';
		$ub = "Opera";
	} elseif (preg_match('/Netscape/i', $u_agent)) {
		$bname = 'Netscape';
		$ub = "Netscape";
	}

	// finally get the correct version number
	$known = ['Version', $ub, 'other'];
	$pattern = '#(?<browser>' . join('|', $known) .
		')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $u_agent, $matches)) {
		// we have no matching number just continue
	}

	// see how many we have
	$i = count($matches['browser']);
	if ($i != 1) {
		//we will have two since we are not using 'other' argument yet
		//see if version is before or after the name
		if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
			$version = $matches['version'][0];
		} else {
			$version = $matches['version'][1];
		}
	} else {
		$version = $matches['version'][0];
	}

	// check if we have a number
	if ($version == NULL || $version == "") {
		$version = "?";
	}

	return [
		'userAgent' => $u_agent,
		'name' => $bname,
		'version' => $version,
		'platform' => $platform,
		'pattern' => $pattern,
	];
}

function print_x($array)
{
	print "<pre>";
	print_r($array);
	print "</pre>";
}

function print_log($message, $type, $log_file_name)
{
	error_log("[" . date('Y-m-d H:i:s') . "] " . $type . "\r\n" . $message . "\r\n\r\n", 3, get_stylesheet_directory() . '/logs/' . $log_file_name . '.txt');
}

function getWordPressDateTime()
{
	return current_time('mysql');
}

/**
 * Truncates the given string at the specified length.
 *
 * @param string $str   The input string.
 * @param int    $width The number of chars at which the string will be truncated.
 *
 * @return string
 */
function truncate($str, $width)
{
	return strtok(wordwrap($str, $width, "...\n"), "\n");
}

function removeHtml($string)
{
	return strip_tags($string);
}

function dateformat($date, $isSingle = 1)
{
	if ($isSingle) {
		return date('F ', strtotime($date)) . '<span>' . date('d,  ', strtotime($date)) . '&nbsp;</span><span>' . date('Y', strtotime($date)) . '</span> // <span>' . date('g:i ', strtotime($date)) . '</span>' . date('A', strtotime($date));
	} else {
		return '<span>' . date('M ', strtotime($date[0])) . '</span><span>' . date('d ', strtotime($date[0])) . '&nbsp;</span><span> - &nbsp;</span><span>' . date('M ', strtotime($date[1])) . '</span><span>' . date('d ', strtotime($date[1])) . '&nbsp;</span>';
	}
}

function getCountries()
{
	$countries = find_pod('country');
	$html = '<select id="country" name="country" class="countries-options">';
	while ($countries->fetch()) {
		$html .= '<option value="' . $countries->raw('iso_code') . '">' . $countries->raw('name') . '</option>';
	}
	$html .= '</select>';
	return $html;
}

/**
 * get_random_images function.
 *
 * @description Get Random Images url from file /imgs/rand/ for displayed in pages
 *
 * @param       : void
 *
 * @return image_url_string
 */
function get_random_image()
{
	$dir = dir(dirname(dirname(__FILE__)) . '/img/overlay/');
	$count = 1;
	$pattern = "/(gif|jpg|jpeg|png|svg)/";
	while ($file = $dir->read()) {
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		if (preg_match($pattern, $ext)) {
			$imagearray[$count] = $file;
			$count++;
		}
	}
	$random = mt_rand(1, $count - 1);
	$the_images = home_url() . '/wp-content/themes/inked_theme/img/overlay/' . $imagearray[$random];
	return $the_images;
}

function changeDateTimeFormat($dateString, $fromFormat = 'Y-m-d H:i:s', $toFormat = 'Ymd')
{
	$myDateTime = DateTime::createFromFormat($fromFormat, $dateString);
	$newDateString = $myDateTime->format($toFormat);
	return $newDateString;
}

function checkUniqueValueInArray($arrayOfValues)
{
	$counts = array_count_values($arrayOfValues);
	foreach ($arrayOfValues as $value) {
		if ($counts[$value] > 1)
			return FALSE;
	}
	return TRUE;
}

function removeLastElementFromArray($array)
{
	return array_slice($array, 0, count($array) - 1);
}

function validHttpAction($action, $parameters)
{
	if (empty($action))
		return FALSE;
	foreach ($parameters as $parameter) {
		if (!isset($action[$parameter]))
			return FALSE;
		if (empty(trim($action[$parameter])) && trim($action[$parameter]) != 0)
			return FALSE;
	}
	return TRUE;
}

function getGravatarImage($email)
{
	return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '?d=mm&amp;s=210&amp;r=G&s=60';
}

function print_table($table)
{
	$table_string = '<table cellspacing="' . $table['table-options']['cellspacing'] . '" style="' . print_table_styles($table['table-options']['style']) . '">';

	$table_string .= '<tr>';
	$table_string .= '<td colspan="' . $table['table-title-options']['colspan'] . '" style="' . print_table_styles($table['table-title-options']['style']) . '">' . $table['table-title-options']['title-text'] . '</td>';
	$table_string .= '</tr>';

	//table headers
	$table_string .= '<tr>';
	foreach ($table['table-headers'] as $tableHeaders) {
		$table_string .= '<td style="' . print_table_styles($tableHeaders['style']) . '"><b>' . $tableHeaders['header-text'] . '</b></td>';
	}
	$table_string .= '</tr>';

	//table rows
	$tableRows = $table['table-data'];
	foreach ($tableRows as $tableIndex => $tableValue) {
		$table_string .= '<tr>';
		$row = 0;
		foreach ($tableValue as $index => $value) {
			$table_string .= '<td style="' . print_table_styles($table['table-rows'][$row]['style']) . '">' . $value . '</td>';
			$row++;
		}
		$table_string .= '</tr>';
	}

	$table_string .= '</table>';

	return $table_string;
}

function print_table_styles($styles)
{
	$css = '';
	foreach ($styles as $key => $value) {
		$css .= $key . ':' . $value . ';';
	}
	return $css;
}

function IDSArrayToString($IDS)
{
	$ids = '';
	foreach ($IDS as $id) {
		$ids .= $id . ',';
	}
	return trim($ids, ',');
}

function excerpt($limit)
{
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . ' <a style="color:#007cc5;" href="' . get_permalink() . '">...</a>';
	} else {
		$excerpt = implode(" ", $excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
	return $excerpt;
}

function post_excerpt($post_id, $limit)
{
	$content = preg_replace('/[\[{\(].*[\]}\)]/U', '', get_the_content($post_id));
	$excerpt = explode(' ', $content, $limit);
	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . ' <a style="color:#007cc5;" href="' . get_permalink($post_id) . '">mehr lesen...</a>';
	} else {
		$excerpt = implode(" ", $excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
	return $excerpt;
}

function limit_text_as_expert($post_id, $text, $limit, $link_color = '#5d5f74', $whit_link = 1)
{
	$excerpt = explode(' ', $text, $limit);
	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		if ($whit_link)
			$excerpt = implode(" ", $excerpt) . ' <a style="color:' . $link_color . ';" href="' . get_permalink($post_id) . '">...</a>';
		else
			$excerpt = implode(" ", $excerpt) . ' ...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}

	$excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
	return $excerpt;
}

function get_file_extension($file_type)
{
	switch ($file_type) {
		case "image/png":
			return '.png';
			break;
		case "image/jpeg":
			return '.jpg';
			break;
		case "image/bmp":
			return '.bmp';
			break;
		case "image/jpg":
			return '.jpg';
			break;
		case "application/pdf":
			return '.pdf';
			break;
		default:
			return FALSE;
			break;
	}
}

function upload_file($files, $upload_file_name)
{
	if (!empty($files)) {

		$files_uploaded = [];

		foreach ($files as $key => $file) {
			$upload_file_name = $upload_file_name . get_file_extension($file['type']);
			$upload_dir = wp_upload_dir();

			if (move_uploaded_file($file["tmp_name"], $upload_dir['path'] . "/" . $upload_file_name)) {
				$uploaded_file['file_name'] = $_POST['image_name'];
				$uploaded_file['upload_url'] = $upload_dir['url'] . "/" . $upload_file_name;

				$attachment = [
					'guid' => $uploaded_file['upload_url'],
					'post_mime_type' => $file['type'],
					'post_title' => $upload_file_name,
					'post_content' => '',
					'post_status' => 'inherit',
				];

				$uploaded_file['attach_id'] = wp_insert_attachment($attachment, $upload_dir['path'] . "/" . $upload_file_name);
				require_once(ABSPATH . 'wp-admin/includes/image.php');

				//Generate the metadata for the attachment, and update the database record.
				$attach_data = wp_generate_attachment_metadata($uploaded_file['attach_id'], $upload_dir['path'] . "/" . $upload_file_name);
				wp_update_attachment_metadata($uploaded_file['attach_id'], $attach_data);

				$files_uploaded[] = $uploaded_file;
			}

			return $files_uploaded;

		}
	}
	return FALSE;
}