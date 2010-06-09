<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * A1 Driver Interface
 *
 * @package A1 drivers
 */
interface A1_Driver_Interface {

	/* methods for classes that extend A1 as database drivers */
	public function load_token($user_id, $token);
	public function load_user ($username, $password);
	public function set_user_token($user, $token);
	public function set_user_last_login($user, $time);
	public function increment_user_logins($user);
	public function save_user($user);
	public function validate_user($user, $password);
}