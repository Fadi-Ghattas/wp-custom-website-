<?php

/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/23/17
 * Time: 12:19 PM
 */
class SweetWord
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
				'name' => 'sweet_word_image',
			],
			[
				'acf' => 1,
				'name' => 'sweet_word',
			],
			[
				'acf' => 1,
				'name' => 'sweet_word_by',
			],
			[
				'acf' => 1,
				'name' => 'sweet_word_by_info',
			],
		];

		$filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => 't.menu_order, t.post_date DESC'];

		$sweetWords = SweetWordModel::search((new ServiceModel())->pod_name, $fields, $filters);

		return $sweetWords;
	}
}