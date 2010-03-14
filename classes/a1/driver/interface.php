<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * A1 Driver Interface
 *
 * @package A1 drivers
 */
interface A1_Driver_Interface {

	/* methods for classes that extend A1 as database drivers */
	public function dba_load_user_by_token($user_id, $token);
	public function dba_load_user_by_username($username);
	public function dba_set_user_token($user, $token);
	public function dba_set_user_last_login($user, $time);
	public function dba_increment_user_logins($user);
	public function dba_save_user($user);
	public function dba_validate_user_password($user, $password);
}