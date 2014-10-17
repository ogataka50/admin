<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2014 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Admin extends Controller
{

	/**
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$from	= date('Y-m');
		$to		= date('Y-m', strtotime(date('Y-m'). '+1 month'));

		$from_year	= date('Y');
		$from_month	= date('m');
		$from_day	= 1;
		$to_year	= date('Y', strtotime(date('Y-m'). '+1 month'));
		$to_month	= date('m', strtotime(date('Y-m'). '+1 month'));
		$to_day		= 1;

		$dayly_list		= Model_Dayly::get_dayly_list_between($from, $to);
		//Debug::dump($from);


		$tmpl['from']			= $from;
		$tmpl['to']				= $to;
		$tmpl['from_year']		= $from_year;
		$tmpl['from_month']		= $from_month;
		$tmpl['from_day']		= $from_day;
		$tmpl['to_year']		= $to_year;
		$tmpl['to_month']		= $to_month;
		$tmpl['to_day']			= $to_day;
		$tmpl['dayly_list']		= $dayly_list;
		return Response::forge(View::forge('admin/index', $tmpl));
	}

	public function action_api_dayly()
	{
		Log::debug(var_export($_POST, true));
		
		$from = Input::post('from_year') . '-' . sprintf("%02d", Input::post('from_month')) . '-' . sprintf("%02d", Input::post('from_day'));
		$to = Input::post('to_year') . '-' . sprintf("%02d", Input::post('to_month')) . '-' . sprintf("%02d", Input::post('to_day'));

		Log::debug($from);
		Log::debug($to);
		$dayly_list		= Model_Dayly::get_dayly_list_between($from, $to);
		//Debug::dump($dayly_list);

		$dayly_list = json_encode($dayly_list);
		echo $dayly_list;
	}

}
