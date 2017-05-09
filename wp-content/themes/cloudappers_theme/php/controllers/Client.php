<?php

/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 4/5/2017
 * Time: 1:37 PM
 */
class Client
{
	public static function view()
	{

	}

	public static function viewAll($data = [])
	{
		$fields = [
			[
				'acf' => '1',
				'name' => 'client_is_featured',
			],
			[
				'acf' => '1',
				'name' => 'client_logo',
			],
			[
				'acf' => '1',
				'name' => 'client_website_url',
			],
		];

		$filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => 't.menu_order, t.post_date, client_is_featured.meta_value DESC'];

		if (isset($data['page'])) {
			if ($data['page'] == 'home') {
				$filters = ['limit' => intval($data['limit']), 'page' => 1, 'where' => 'client_is_featured.meta_value = 1', 'order_by' => 't.menu_order, t.post_date, client_is_featured.meta_value DESC'];
			}
		}

		$clients = ClientModel::search( (new ClientModel())->pod_name, $fields, $filters);

		return $clients;
	}
}