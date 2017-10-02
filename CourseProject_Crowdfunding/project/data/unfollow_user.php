<?php
    require_once('../session.php');
    $loginname1 = $_SESSION["loginname"];
    $loginname2 = $_POST["loginname2"];
    require_once('Follows.php');


    $follows = new Follows();

    $res = $follows->unfollow($loginname1,$loginname2);
    $follows -> Disconnect();
    echo $res;
?>
