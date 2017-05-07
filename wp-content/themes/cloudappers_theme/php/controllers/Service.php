<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/03/17
 * Time: 10:54 AM
 */

class Service
{

	public static function view()
	{

	}

	public static function viewAll($data = [])
	{
		$fields = [
			'id',
			'post_title',
			[
				'acf' => 1,
				'name' => 'service_icon',
			],
			[
				'acf' => 1,
				'name' => 'service_description',
			],
			[
				'acf' => 1,
				'name' => 'service_card_title',
			],
			[
				'acf' => 1,
				'name' => 'service_card_description',
			],
		];

		$filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => 't.menu_order, t.post_date, service_is_featured.meta_value DESC'];

		$services = ServiceModel::search( (new ServiceModel)->pod_name, $fields, $filters);

		return $services;
	}
}