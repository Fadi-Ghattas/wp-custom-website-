<?php

/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/08/17
 * Time: 5:42 PM
 */
class Team
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
				'name' => 'team_member_quote',
			],
			[
				'acf' => 1,
				'name' => 'team_member_profile_image',
			],
			[
				'acf' => 1,
				'name' => 'team_member_position',
				'type' => 'position',
				'relationship' => 1,
				'fields' => [
					'post_title',
				],
			],
		];

		$filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => 't.menu_order, t.post_date, team_member_featured.meta_value DESC'];

		if (isset($data['page'])) {
			if ($data['page'] == 'home') {
				$filters = ['limit' => intval($data['limit']), 'page' => 1, 'where' => 'team_member_featured.meta_value = 1', 'order_by' => 't.menu_order, t.post_date, team_member_featured.meta_value DESC'];
			}
		}

		$team = TeamModel::search((new TeamModel())->pod_name, $fields, $filters);

		return $team;
	}

}