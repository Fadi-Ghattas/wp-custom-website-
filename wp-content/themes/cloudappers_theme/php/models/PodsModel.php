<?php

/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 4/5/2017
 * Time: 1:42 PM
 */
class PodsModel
{
	public static function search($podType, $fields = [], $filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => ''])
	{
		return get_pod_data($podType, $fields, $filters);
	}

	public static function findOne($podName, $podID, $podFields)
	{
		return get_single_pod_data($podName, $podID, $podFields);
	}
}