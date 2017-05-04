<?php

/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 1/10/2017
 * Time: 3:20 PM
 */
class queries
{

	public static function getAllPods($podType, $fields = [], $filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => ''])
	{
		return get_pod_data($podType, $fields, $filters);
	}

	public static function getSinglePod($pod_name, $pod_id, $pod_fields)
	{
		return get_single_pod_data($pod_name, $pod_id, $pod_fields);
	}
}