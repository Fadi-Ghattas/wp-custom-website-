<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 4/5/2016
 * Time: 1:36 AM
 */

//http://pods.io/docs/code/pods/find/
function find_pod($pod_name, $limit = -1, $page = 1, $where_query = '', $meta_query = '', $order_by = '')
{

	$pod = pods($pod_name);

	$params = [
		'limit' => $limit,
		'page' => $page,
		'where' => $where_query,
		'orderby' => $order_by,
		'meta_query' => $meta_query,
	];
	//print_x($pod->find($params)->sql);
	$pod->find($params);
	return $pod;
}

function add_pod($pod_name, $pod_data)
{
	$new_pods = pods($pod_name);
	return $new_pods->add($pod_data);
}

function save_pod($pod_id, $pod_name, $pod_data)
{
	$pod = pods($pod_name, $pod_id);
	return $pod->save($pod_data);
}

function delete_pod($pod_name, $pod_id)
{
	$pod = pods($pod_name, $pod_id);
	return $pod->delete();
}

function get_pod_terms($pod_name, $where = '')
{
	$terms = [];
	$pod = find_pod($pod_name, -1, 1, $where);

	while ($pod->fetch()) {
		$term = [];
		$term['id'] = $pod->raw('id');
		$term['text'] = $pod->raw('name');
		$terms [] = $term;
	}
	return $terms;
}

function save_pod_terms($pod_name, $terms)
{
	$terms_ids = [];
	$terms = explode(',', $terms);

	foreach ($terms as $term) {
		if (!intval($term))
			$term = add_pod($pod_name, ['post_title' => $term]);
		$terms_ids [] = $term;
	}

	return $terms_ids;
}

function get_sql_query($sql_query, $output = OBJECT)
{
	global $wpdb;
	$result = $wpdb->get_results($sql_query, $output);
	return $result;
}

/**
 * Function get_pod_data
 *
 * convert pod to array
 * ex:
 * get_pod_data('carousel', [
 * 'name',
 * [
 * 'name' => 'slide_image',
 * 'image' => 1,
 * 'size' => 'slider',
 * ],
 * ])
 *
 * @param  (string) (pod_name) the name of the pod you want to convert to array
 * @param  (array) (pod_fields) the names of the pod fields you want to be retrive
 *                           params (string) field name - this get the filed as raw
 *                           or
 *                           params (array) ['name' => 'name is required',
 *                           'type' => 'type is optional is not set then it will be raw',
 *                           'image' => 'image is optional this option used if the pod filed is image',
 *                           'size' => 'size is required when the image is set' ]
 * @param  (array) (pods_filters) the pod query filters.
 *
 * @return (array) (data)
 */
function get_pod_data($pod_name, $pod_fields, $pods_filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => ''])
{
	$data = [];
	$pods = find_pod($pod_name, $pods_filters['limit'], $pods_filters['page'], $pods_filters['where'], '' ,$pods_filters['order_by']);
	//$data['sql'] = $pods->sql;
	while ($pods->fetch()) {
		$pod = [];
		foreach ($pod_fields as $field) {
			if (is_array($field)) {
				if (isset($field['image'])) {
					if(isset($field['size']) && $field['size'] == 'post_thumbnail')
						$pod[$field['name']] = get_the_post_thumbnail_url($pods->raw('id'), 'post_thumbnail');
					else if (isset($field['size']))
						$pod[$field['name']] = get_pod_image_url($pods->raw($field['name']), $field['size']);
					else
						$pod[$field['name']] = get_pod_image_url($pods->raw($field['name']), NULL);
				} else if (isset($field['gallery'])) {
					if (isset($field['size']))
						$pod[$field['name']] = get_pod_image_url($pods->raw($field['name']), $field['size']);
					else
						$pod[$field['name']] = get_pod_image_url($pods->raw($field['name']), NULL);
				} else if (isset($field['relationship'])) { //TODO fix the multi relationships add foreach
					$pod[$field['relationship']['pod']] = get_pod_data($field['relationship']['pod'],
						$field['relationship']['pod_fields'],
						['limit' => -1,
							'page' => 1,
							'where_query' => $field['relationship']['related_field_name'] . '.ID = ' . $pods->raw('id'),
							'order_by' => '',
						]);
				} else if(isset($field['acf'])) {
					$pod[$field['name']] = get_field($field['name'], $pods->raw('id'));
				} else if ($field['acf_image']) {
					$pod[$field['name']] = isset($field['size']) ? get_acf_image($field['name'], $pods->raw('id'), $field['size']) : get_acf_image($field['name'], $pods->raw('id'));
				}
				else {
					$pod[$field['name']] = $pods->$field['type']($field['name']);
				}
			} else {
				$pod[$field] = $pods->raw($field);
			}
		}
		$data [] = $pod;
	}

	return $data;
}

/**
 * Function get_pod_image_url
 *
 * return the url of image saved as pod filed.
 *
 * @param  (pod) (pod) the raw pod for image.
 * @param  (string) (size) the size if wanted image to be returned.
 *
 * @return (string) (image url)
 */
function get_pod_image_url($pod, $size)
{
	if (is_array($pod) && !isset($pod['ID'])) {
		$gallery = [];
		foreach ($pod as $image) {
			$gallery [] = wp_get_attachment_image_src($image['ID'], $size)[0];
		}
		return $gallery;
	} else {
		return wp_get_attachment_image_src($pod['ID'], $size)[0];
	}
}

function get_single_pod_data($pod_name, $pod_id, $pod_fields)
{
	$singlePod = [];
	$pod = pods($pod_name, $pod_id);
	foreach ($pod_fields as $field) {
		if (is_array($field)) {
			if (isset($field['acf_images_gallery'])) {
				$singlePod[$field['name']] = isset($field['size']) ? get_acf_images_gallery($field['name'], $pod->raw('id'), $field['size']) : get_acf_images_gallery($field['name'], $pod->raw('id'));
			} else if ($field['acf_image']) {
				$singlePod[$field['name']] = isset($field['size']) ? get_acf_image($field['name'], $pod->raw('id'), $field['size']) : get_acf_image($field['name'], $pod->raw('id'));
			} else if(isset($field['acf']))
			{
				if(isset($field['relationship'])) {
					$relationshipPosts = get_field($field['name'], $pod_id);
					$singlePod[$field['name']] = [];
					if(!empty($relationshipPosts))
					{
						//single relationship
						if(intval($relationshipPosts))
						{
							$singlePod[$field['name']][] = get_single_pod_data($field['type'], $relationshipPosts, $field['fields']);
						} else { //multiple relationship
							foreach ($relationshipPosts as $relationshipPost) {
								$singlePod[$field['name']][] = get_single_pod_data($relationshipPost->post_type, $relationshipPost->ID, $field['fields']);
							}
						}
					}
				}
				else {
					$singlePod[$field['name']] = get_field($field['name'], $pod_id);
				}
			}
		} else {
			$singlePod[$field] = $pod->raw($field);
		}
	}

	return $singlePod;
}

function get_acf_images_gallery($filedName, $postID, $size = NULL)
{
	$gallery = [];
	$ACFImagesGallery = get_field($filedName, $postID);
	foreach ($ACFImagesGallery as $image) {
		if ($size) {
			$gallery [] = (isset($image['sizes'][$size]) ? $image['sizes'][$size] : $image['url']);
		} else {
			$gallery [] = $image['url'];
		}
	}

	return $gallery;
}

function get_acf_image($filedName, $postID, $size = NULL)
{
	$image = [];
	$ACFImage = get_field($filedName, $postID);
	if ($size) {
		$image = (isset($ACFImage['sizes'][$size]) ? $ACFImage['sizes'][$size] : $ACFImage['url']);
	} else {
		$image = $ACFImage['url'];
	}

	return $image;
}

function wp_insert($tableName, $data)
{
	global $wpdb;
	$wpdb->insert($tableName, $data);
	return $wpdb->insert_id;
}

function wp_update($tableName, $data, $where)
{
	global $wpdb;
	return $wpdb->update($tableName, $data, $where);
}

function acf_save($post_id, $acf_meta)
{
	foreach ($acf_meta as $metaIndex => $metaValue)
	{
		if(!update_field($metaIndex, $metaValue, $post_id))
			return FALSE;
	}
	return TRUE;
}

//acf_get_group_fields(get_the_ID())
function acf_get_group_fields($post_id)
{
	$field = get_fields($post_id);
	return $field;
}