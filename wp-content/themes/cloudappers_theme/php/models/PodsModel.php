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
		return queries::getAllPods($podType, $fields, $filters);
	}

	public static function findOne($podName, $podID, $pod_fields)
	{
		return  queries::getSinglePod($podName, $podID, $pod_fields);
	}
}