<?php
    require_once('../session.php');
    require_once('Requests.php');
    require_once('Project.php');

    $pid =$_POST['pid'];  
    $min_amount =$_POST['min_amount'];
    $max_amount =$_POST['max_amount'];
    $endtime =$_POST['endtime'];
    $planned_compl_time =$_POST['planned_compl_time'];
    $res = $requests->post_request($pid, $min_amount, $max_amount, $endtime, $planned_compl_time);
    if($res){
            $cp = $project->change_pstatus($pid);
    }
    echo json_encode($res);
    $requests->Disconnect();
    $project->Disconnect();
?>
