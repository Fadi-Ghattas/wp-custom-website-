<?php

/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/29/17
 * Time: 2:26 PM
 */

class JobSalaryRange
{
	public static function view()
	{

	}

	public static function viewAll($data = [])
	{
		$fields = [
			'id',
			'post_title',
		];

		$filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => 't.menu_order, t.post_date DESC'];


		$jobsSalariesRanges = JobSalaryRangeModel::search((new JobSalaryRangeModel())->pod_name, $fields, $filters);

		return $jobsSalariesRanges;
	}
}