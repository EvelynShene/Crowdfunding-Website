<?php
require_once('User.php');
if(isset($_POST['un']) && isset($_POST['pw']) ){
	$username = $_POST['un'];
	$password = $_POST['pw'];
	// $password = md5($password);

	$result = $user->login($username, $password);
	$return['valid'] = false;
	if($result > 0){
		$return['valid'] = true;
		$return['url'] = "home.php";
		$_SESSION['loginname'] = $result['loginname'];
		$_SESSION['username'] = $result['name'];
		$c = false;
		setcookie('c',$c);
	}
	echo json_encode($return);

}//end isset
