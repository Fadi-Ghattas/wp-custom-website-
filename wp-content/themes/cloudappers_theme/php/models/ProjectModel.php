<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/04/17
 * Time: 2:20 PM
 */
class ProjectModel extends PodsModel
{
	public $pod_name = 'project';

	public static function getProjectsAsShowCasesForPage($relatedProjects)
	{
		$projectShowCases = [];

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
		];

		for($i = 0; $i < 3; $i++)
		{
			$projectShowCases [] = ProjectModel::findOne((new ProjectModel())->pod_name, $relatedProjects[$i]->ID, $fields);
		}

		return $projectShowCases;
	}

	public static function getSuperFeaturedProject() {

		$fields = [
			'id',
			'post_title',
			[
				'acf' => 1,
				'name' => 'project_super_featured_background_image',
			],
			[
				'acf' => 1,
				'name' => 'project_super_featured_title',
			],
			[
				'acf' => 1,
				'name' => 'project_super_featured_subtitle',
			],
			[
				'acf' => 1,
				'name' => 'project_type',
				'type' => (new ProjectTypeModel())->pod_name,
				'relationship' => 1,
				'fields' => [
					'post_title',
				],
			],
		];

		$filters = ['limit' => 1, 'page' => 1, 'where' => 'project_is_super_featured.meta_value = 1', 'order_by' => 't.menu_order, t.post_date, project_is_super_featured.meta_value DESC'];

		return ProjectModel::search((new ProjectModel())->pod_name, $fields, $filters)[0];
	}
}