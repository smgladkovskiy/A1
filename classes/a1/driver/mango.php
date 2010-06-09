<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * A1 Mango Driver
 *
 * @author avis <SMGladkovskiy@gmail.com>
 * @package A1 drivers
 */
class A1_Driver_Mango extends A1 implements A1_Driver_Interface {

	/**
	 * Loading user by token and id
	 *
	 * @param integer $user_id
	 * @param string $token
	 * @return object / NULL
	 */
	public function load_token($user_id, $token)
	{
		$user = Mango::factory($this->_config['user_model'], array(
			$this->_config['columns']['pk']    => $user_id,
			$this->_config['columns']['token'] => $token
		))->load();

		// @TODO: do the right thing here
		return NULL;
	}

	/**
	 * Loading user by name
	 *
	 * @param string $username
	 * @return object / NULL
	 */
	public function load_user($username)
	{
		$user = Mango::factory($this->_config['user_model'],array(
				$this->_config['columns']['username'] => $username,
				'account_id'                          => Request::$account->_id
		))->load();

		// @TODO: do the right thing here
		return NULL;
	}

	/**
	 * Setting user token
	 *
	 * @param object $user
	 * @param string $token
	 */
	public function set_user_token($user, $token)
	{
		// @TODO: copied from sprig, fix
		//$user->{$this->_config['columns']['token']} = $token;
	}

	/**
	 * Setting last user login
	 *
	 * @param object $user
	 * @param integer $time
	 */
	public function set_user_last_login($user, $time)
	{
		// @TODO: copied from sprig, fix
		//$user->{$this->_config['columns']['last_login']} = $time;
	}

	/**
	 * Incrementing user logins
	 *
	 * @param object $user
	 * @return void
	 */
	public function increment_user_logins($user)
	{
		// @TODO: copied from sprig, fix
		//$user->{$this->_config['columns']['logins']}++;
	}

	/**
	 * Saving user
	 *
	 * @param object $user
	 * @return void
	 */
	public function save_user($user)
	{
		$user->update();
	}

	/**
	 * Validating user password
	 *
	 * @param object $user
	 * @param string $password
	 * @return boolean
	 */
	public function validate_user($user, $password)
	{
		// @TODO: copied from sprig, fix
		//return ($user->{$this->_config['columns']['password']} == $password);
		return FALSE;
	}
} // End A1_Driver_Mango
