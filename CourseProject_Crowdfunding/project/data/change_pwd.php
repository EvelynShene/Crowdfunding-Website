<?php
    require_once('../session.php');
    $uid = $_SESSION["loginname"];
    require_once('User.php');
    // echo "lalal";
// echo json_encode($uid);
    if(isset($_POST['pwd'])){
        $pwd =$_POST['pwd'];
        // $pwd = md5($pwd);

        // $uid = $_SESSION['loginname'];
        // echo json_encode($uid);
        $res = $user->change_pass($pwd, $uid);
        $return['valid'] = false;
        if($res){
            $return['valid'] = true;
            $return['msg'] = 'Password Change Successfully!';
        }
        echo json_encode($return);

    }//end isset
    $user->Disconnect();
?>
