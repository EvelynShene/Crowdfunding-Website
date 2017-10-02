<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    require_once('User.php');

    $name =$_POST['name'];
    $hometown =$_POST['hometown'];
    $ccn =$_POST['ccn'];
    $res = $user->edit_p($name, $hometown, $ccn, $loginname);
    $return['valid'] = false;
        if($res){
            $return['valid'] = true;
            $_SESSION['username'] = $name;
            $return['msg'] = 'Edit successfully!';
        }
    echo json_encode($return);
    $user->Disconnect();
?>
