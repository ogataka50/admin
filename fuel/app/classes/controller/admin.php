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
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$month		= date('Ym');
		$month_list	= Model_Monthly::get_monthly_list($month);

		$target_month	= 7;
		$dayly_list		= Model_Dayly::get_dayly_list($target_month);
		//Debug::dump($dayly_list);

		$tmpl['month']			= $month;
		$tmpl['month_list']		= $month_list;
		$tmpl['target_month']	= $target_month;
		$tmpl['dayly_list']		= $dayly_list;
		return Response::forge(View::forge('admin/index', $tmpl));
	}
}
