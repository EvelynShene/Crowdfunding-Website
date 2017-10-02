<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    $pid = $_POST["pid"];
    $opinion = $_POST["opinion"];

    require_once('Comments.php');

    $comments = new Comments();
    $addc = $comments->add_comments($loginname,$pid,$opinion);
    $comments->Disconnect();
    echo $addc;
?>


