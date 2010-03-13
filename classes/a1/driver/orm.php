<?php defined('SYSPATH') OR die('No direct access allowed.');

class A1_Driver_ORM extends A1 implements A1_Driver_Interface {

	public function dba_load_user_by_token($user_id, $token) {
		$user = ORM::factory($this->_config['user_model'])
			->where($this->_config['columns']['token'],'=',$token)
			->find($user_id);
		if($user->loaded()) {
			return $user;
		} else {
			return null;
		}
	}

	public function dba_load_user_by_username($username) {
		$user = ORM::factory($this->_config['user_model'])
			->where($this->_config['columns']['username'],'=',$username)
			->find();
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
		$user->save();
	}

	public function dba_validate_user_password($user, $password) {
		$password_in_db = $user->{$this->_config['columns']['password']};
		$salt = $this->find_salt($password_in_db);
		
		if($this->hash_password($password, $salt) === $password_in_db)
		{       
				return true;
		}

		return false;
	}
} // End A1_ORM
