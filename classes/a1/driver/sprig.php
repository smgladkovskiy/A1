<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * A1 Sprig Driver
 *
 * @author avis <SMGladkovskiy@gmail.com>
 * @package A1 drivers
 */
class A1_Driver_Sprig extends A1 implements A1_Driver_Interface {

	/**
	 * Loading user by token and id
	 *
	 * @param integer $user_id
	 * @param string $token
	 * @return object / NULL
	 */
	public function load_token($user_id, $token)
	{
		$user = Sprig::factory($this->_config['user_model'], array(
					$this->_config['columns']['token'] => $token,
					$this->_config['columns']['pk']    => $user_id));
		$user->load();

		if($user->loaded())
		{
			return $user;
		}
		else
		{
			return NULL;
		}
	}

	/**
	 * Loading user by name
	 *
	 * @param string $username
	 * @param string $password
	 * @return object / NULL
	 */
	public function load_user($username, $password)
	{
		$user = Sprig::factory($this->_config['user_model'], array(
					$this->_config['columns']['username'] => $username,
					$this->_config['columns']['password'] => $password));
		$user->load();

		if($user->loaded())
		{
			return $user;
		}
		else
		{
			return NULL;
		}
	}

	/**
	 * Setting user token
	 *
	 * @param object $user
	 * @param string $token
	 */
	public function set_user_token($user, $token)
	{
		$user->{$this->_config['columns']['token']} = $token;
	}

	/**
	 * Setting last user login
	 *
	 * @param object $user
	 * @param integer $time
	 */
	public function set_user_last_login($user, $time)
	{
		$user->{$this->_config['columns']['last_login']} = $time;
	}

	/**
	 * Incrementing user logins
	 *
	 * @param object $user
	 * @return void
	 */
	public function increment_user_logins($user)
	{
		$user->{$this->_config['columns']['logins']}++;
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
		if($user->loaded())
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

} // End A1_Driver_Sprig
