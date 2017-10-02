<?php
    $pid = $_POST["pid"];
    //$titlekey = $_POST["titlekey"];
    //$isc = $_POST["c"];
    require_once('Project.php');

    $project = new Project();

    $ps = $project->complete_project($pid);

    $project->Disconnect();
?>
