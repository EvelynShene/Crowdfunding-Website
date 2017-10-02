<?php
    require_once('User.php');
    // echo $_POST['loginname'];
    if(isset($_POST['loginname']) && isset($_POST['password']) && isset($_POST['nickname'])){
        $ln = $_POST['loginname'];
        $pwd = $_POST['password'];
        $nn = $_POST['nickname'];

// check if loginname unique
        $uq = $user->get_usrinfo($ln);
        if($uq > 0){
            $return['valid'] = false;
            //$return['info'] = "Loginname is used!";
        }else{
            $result = $user->register($ln,$pwd,$nn);
            $return['valid'] = false;
            if($result == true){
                $return['valid'] = true;
                // $return['info'] = "Register Success!";
                $return['url'] = "home.php";
                $_SESSION['loginname'] = $ln;
                $_SESSION['username'] = $nn;
            }
            // echo json_encode($return);
        }
        echo json_encode($return);
        // echo json_encode($result);
    }

?>
