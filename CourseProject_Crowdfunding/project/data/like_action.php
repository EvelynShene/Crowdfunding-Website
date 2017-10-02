<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    $pid = $_POST["pid"];
    $likeact = $_POST['likeact'];

    require_once('Likes.php');
    $likes = new Likes();

    if($likeact == "add"){
        // echo $interestact;
        // echo $category;
        $result = $likes->insert_interest_project($loginname, $pid);
    }
    else if($likeact == "remove"){
        // echo $interestact;
        $result = $likes->remove_interested_project($loginname, $pid);
    }

    echo $result;

?>
