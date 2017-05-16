<?php

/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/16/17
 * Time: 3:49 PM
 */
class Position
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
				'name' => 'position_icon',
			],
			[
				'acf' => 1,
				'name' => 'position_icon_on_hover',
			],
			[
				'acf' => 1,
				'name' => 'position_font_color'
			],
		];

		$filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => 't.menu_order, t.post_date DESC'];

		$positions = PositionModel::search((new PositionModel())->pod_name, $fields, $filters);

		return $positions;
	}
}