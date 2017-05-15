<?php

/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/15/17
 * Time: 3:59 PM
 */
class ProjectType
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
				'name' => 'project_type_icon',
			],
			[
				'acf' => 1,
				'name' => 'project_type_icon_on_hover',
			],
		];

		$filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => 't.menu_order, t.post_date DESC'];

		$projectTypes = ProjectTypeModel::search((new ProjectTypeModel())->pod_name, $fields, $filters);

		return $projectTypes;
	}
}