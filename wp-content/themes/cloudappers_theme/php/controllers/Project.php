<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/08/17
 * Time: 1:07 PM
 */

class Project {

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
				'name' => 'project_card_title',
			],
			[
				'acf' => 1,
				'name' => 'project_card_sub_title',
			],
			[
				'acf' => 1,
				'name' => 'project_card_image',
			],
			[
				'acf' => 1,
				'name' => 'project_type',
				'type' => (new ProjectTypeModel())->pod_name,
				'relationship' => 1,
				'fields' => [
					'id',
					'post_title',
				],
			],
		];

		$filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => 't.menu_order, t.post_date, project_is_featured.meta_value ASC'];

		if (isset($data['page'])) {
			if ($data['page'] == 'home') {
				$filters = ['limit' => intval($data['limit']), 'page' => 1, 'where' => 'project_is_featured.meta_value = 1 AND project_is_super_featured.meta_value = 0', 'order_by' => 't.menu_order, t.post_date, project_is_featured.meta_value ASC'];
			}
		}

		$projects = ProjectModel::search((new ProjectModel())->pod_name, $fields, $filters);

		return $projects;
	}
}