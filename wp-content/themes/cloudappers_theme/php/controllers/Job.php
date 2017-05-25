<?php

/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/25/17
 * Time: 1:47 PM
 */
class Job
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
				'name' => 'job_location',
			],
			[
				'acf' => 1,
				'name' => 'job_description',
			],
		];

		$filters = ['limit' => -1, 'page' => 1, 'where' => 'job_is_active.meta_value = 1', 'order_by' => 't.menu_order, t.post_date DESC'];


		$jobs = JobModel::search((new JobModel())->pod_name, $fields, $filters);

		return $jobs;
	}
}