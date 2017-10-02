<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    $c = $_POST["category"];
    $interestact = $_POST['interestact'];

    require_once('Category.php');
    $category = new Category();

    if($interestact == "add"){
        // echo $interestact;
        // echo $category;
        $result = $category->insert_interest_category($loginname, $c);
    }
    else if($interestact == "remove"){
        // echo $interestact;
        $result = $category->remove_interested_category($loginname, $c);
    }

    echo $result;

?>
