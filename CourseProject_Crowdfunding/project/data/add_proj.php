<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    require_once('User.php');

    $pname =$_POST['pname'];  
    $descrip =$_POST['descrip'];
    $catg =$_POST['catg'];
    $res = $user->add_proj($pname, $loginname, $descrip, $catg);
    $return['valid'] = false;
        if($res){
            $return['valid'] = true;
            $return['msg'] = 'Add a project successfully!';
        }
    echo json_encode($return);
    $user->Disconnect();
?>
