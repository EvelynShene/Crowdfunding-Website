<?php
require_once('../database/Database.php');
require_once('../interface/iUser.php');
class User extends Database implements iUser {

	public function login($username, $password)
	{
		$sql = "SELECT *
				FROM user
				WHERE loginname = ?
				AND password = ?
				LIMIT 1";
		return $this->getRow($sql, [$username, $password]);
	}//end login

	public function register($ln,$pwd,$nn){
		$sql = "INSERT INTO user(loginname, password, name) VALUES(?,?,?)";
		return $this->insertRow($sql,[$ln,$pwd,$nn]);
	}

	public function change_pass($pwd, $uid)
	{
		$sql = "UPDATE user
				SET password = ?
				WHERE loginname = ?";
		return $this->updateRow($sql, [$pwd, $uid]);
	}//end change_pass

	public function edit_p($name, $hometown, $ccn, $loginname)
	{
		$sql = "UPDATE user
				SET name = ? , hometown = ? , ccn = ?
				WHERE loginname = ?";
		return $this->updateRow($sql, [$name, $hometown, $ccn, $loginname]);
	}

	public function add_proj($pname, $loginname, $descrip, $catg)
	{
		$sql = "INSERT INTO project VALUES('',?, ?, ?, ?, ?)";
		return $this->insertRow($sql, [$pname, $loginname, $descrip, $catg, 'idle']);
	}

	public function get_usrinfo($owner){
		$sql = "SELECT * FROM user WHERE loginname = ?";
		return $this->getRow($sql,[$owner]);
	}// end get_usrinfo

	public function get_ccn($loginname){
		$sql = "SELECT ccn FROM user WHERE loginname = ?";
		return $this->getRow($sql,[$loginname]);
	}

}//end class
$user = new User();
/* End of file User.php */
/* Location: .//D/xampp/htdocs/laundry/class/User.php */
