<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    $rid = $_POST["rid"];
    $invest = $_POST["invest"];

    require_once('Pledges.php');

    $addi = $pledges->add_pledge($loginname,$rid,$invest);

    if($addi){
        //echo
        $return['addi'] = true;
        $check = $pledges->get_invest_statu($loginname,$rid);
        if($check['istatus'] == 'success'){
            $return['needchange']=true;
            $changeis = $pledges->change_all_istatus($rid);
            if($changeis){
                $addi['changed']=true;
            }
        }
    }

    echo json_encode($return)

?>
