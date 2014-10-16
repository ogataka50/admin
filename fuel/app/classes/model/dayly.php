<?php

class Model_Dayly extends Model
{
	const TABLE_NAME = 'dayly';

	public static function get_dayly_list($month=0)
	{
		$result = DB::select()
				->from(self::TABLE_NAME)
				->where('month', $month)
				->execute()
				->as_array();

		return $result;
	}

	public static function get_dayly_list_between($from=0, $to=0)
	{
		$result = DB::select()
				->from(self::TABLE_NAME)
				->where('date', '>=', $from)
				->where('date', '<=', $to)
				->execute()
				->as_array();

		return $result;
	}

}
