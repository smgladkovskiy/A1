<?php defined('SYSPATH') OR die('No direct access allowed.');

class A1_Driver_Mango extends A1 implements A1_Driver_Interface {

	public function dba_load_user_by_token($user_id, $token) {
		$user = Mango::factory($this->_config['user_model'], array(
			'_id'   => $user_id,
			'token' => $token
		))->load();

		//TODO: do the right thing here
		return null;
	}

	public function dba_load_user_by_username($username) {
		$user = Mango::factory($this->_config['user_model'],array(
				$this->_config['columns']['username'] => $username,
				'account_id'                          => Request::$account->_id
		))->load();

		//TODO: do the right thing here
		return null;
	}

        public function dba_set_user_token($user, $token) {
		//TOOD: copied from sprig, fix
		//$user->{$this->_config['columns']['token']} = $token;
        }

        public function dba_set_user_last_login($user, $time) {
		//TOOD: copied from sprig, fix
		//$user->{$this->_config['columns']['last_login']} = $time;
        }

        public function dba_increment_user_logins($user) {
		//TOOD: copied from sprig, fix
		//$user->{$this->_config['columns']['logins']}++;
        }

        public function dba_save_user($user) {
                $user->update();
        }

        public function dba_validate_user_password($user, $password) {
		//TOOD: copied from sprig, fix
		//return ($user->{$this->_config['columns']['password']} == $password);
		return false;
        }
} // End A1_Mango
