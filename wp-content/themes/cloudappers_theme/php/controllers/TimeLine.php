<?php

/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/23/17
 * Time: 12:10 PM
 */
class TimeLine
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
				'name' => 'timeline_year',
			],
			[
				'acf' => 1,
				'name' => 'timeline_description',
			],
		];

		$filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => 't.menu_order, t.post_date DESC'];

		$timesLines = TimeLineModel::search((new TimeLineModel())->pod_name, $fields, $filters);

		return $timesLines;
	}
}