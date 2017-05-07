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
}