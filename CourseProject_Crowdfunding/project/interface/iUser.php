<?php
interface iUser{
	public function login($username, $password);
    public function register($ln,$pwd,$nn);
	public function change_pass($pwd, $uid);
    public function edit_p($name, $hometown, $ccn, $loginname);
    public function add_proj($pname, $loginname, $descrip, $catg);
    public function get_ccn($loginname);
}//end iUser
