<?php defined('SYSPATH') OR die('No direct access allowed.');

class A1_Driver_Sprig extends A1 implements A1_Driver_Interface {

	public function dba_load_user_by_token($user_id, $token) {
		$user = Sprig::factory($this->_config['user_model'], array(
					$this->_config['columns']['token'] => $token,
					$this->pk => $user_id));
		$user->load();

		if($user->loaded()) {
			return $user;
		} else {
			return null;
		}
	}

	public function dba_load_user_by_username($username) {
		$user = Sprig::factory($this->_config['user_model'], array(
					$this->_config['columns']['username'] => $username));
		$user->load();

		if($user->loaded()) {
			return $user;
		} else {
			return null;
		}
	}

	public function dba_set_user_token($user, $token) {
		$user->{$this->_config['columns']['token']} = $token;
	}

	public function dba_set_user_last_login($user, $time) {
		$user->{$this->_config['columns']['last_login']} = $time;
	}

	public function dba_increment_user_logins($user) {
		$user->{$this->_config['columns']['logins']}++;
	}

	public function dba_save_user($user) {
		$user->update();
	}

	public function dba_validate_user_password($user, $password) {
		return ($user->{$this->_config['columns']['password']} == $password);
	}

} // End A1_Sprig
