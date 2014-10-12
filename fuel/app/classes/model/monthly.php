<?php

class Model_Monthly extends Model
{
	const TABLE_NAME = 'monthly';

	public static function get_monthly_list($month=0)
	{
		$result = DB::select()
				->from(self::TABLE_NAME)
				->where('year_month', '<=', $month)
				->execute()
				->as_array();

		return $result;
	}
}
