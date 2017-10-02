<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    $rid = $_POST["rid"];

    require_once('Pledges.php');
    require_once('User.php');

    $pledges = new Pledges();
    $isp = $pledges->ispledged($loginname,$rid);

    $pledges->Disconnect();
    $ccn = $user->get_ccn($loginname);
    if(empty($ccn['ccn'])){
        $isp['ccn'] = "0";
    }
    else{
        $isp['ccn'] = "1";
        $isp['ccninfo']=$ccn['ccn'];
    }


    echo json_encode($isp);

?>
