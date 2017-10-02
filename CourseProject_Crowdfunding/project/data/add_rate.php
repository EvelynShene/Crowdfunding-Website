<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    $pid = $_POST["pid"];
    $star = $_POST["star"];

    require_once('Rate.php');
    $rate = new Rate();

    $rs = $rate->add_projrate($loginname,$pid,$star);

    $rate->Disconnect();

    echo $rs;

?>
