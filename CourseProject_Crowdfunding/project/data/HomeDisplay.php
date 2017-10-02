<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    // $owner = $_POST["owner"];

    require_once('Project.php');
    require_once('Requests.php');
    require_once('Pledges.php');
    require_once('Comments.php');

    $project = new Project();
    $requests = new Requests();
    $pledges = new Pledges();
    $comments = new Comments();

    $projs = $project->get_home_project($loginname);
    $rs = $requests->get_home_requests($loginname);
    $pl = $pledges->get_home_pledges($loginname);
    $c = $comments->get_home_comments($loginname);

?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Home</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
        <div class="box-body">
        <!-- panel1: My Projects -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button style="float:right;" type="button" class="btn btn-primary btn-xs myallprojects">Detail&nbsp<span class="glyphicon glyphicon-hand-right"></span></button>
                    <button style="float:right;" type="button" class="btn btn-primary btn-xs addprojects">Add projects <span class="glyphicon glyphicon-hand-right"></span></button>
                    <h3 class="panel-title">My Projects</h3>
                </div>
                <table width="100%" id="Myprojects" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="10%"><center>PID</center></th>
                            <th><center>Project Name</center></th>
                            <th><center>Project Description</center></th>
                            <th width="12%"><center>Status</center></th>
                            <th><center>Category</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($projs[0])){
                                foreach($projs as $s): ?>
                            <tr align="center">
                                <td><?= $s['pid']; ?></td>
                                 <td><?= $s['pname']; ?></td>
                                <td><?= $s['description']; ?></td>
                                <td><?= $s['pstatus']; ?></td>
                                <td><?= $s['category']; ?></td>
                            </tr>
                        <?php endforeach; } else{?>
                            <tr align="center"><td colspan="5">No data available in table!</td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <!-- panel2: My Requests -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button style="float: right;" type="button" class="btn btn-primary btn-xs myallrequests">Detail&nbsp<span class="glyphicon glyphicon-hand-right"></span></button>
                    <h3 class="panel-title">My Requests</h3>
                </div>
                <table width="100%" id="Myrequests" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="10%"><center>RID</center></th>
                            <th width="10%"><center>PID</center></th>
                            <th><center>Project Name</center></th>
                            <th><center>Project Description</center></th>
                            <th><center>Category</center></th>
                            <th width="12%"><center>Request Status</center></th>
                            <th width="12%"><center>Project Status</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($rs[0])){
                             foreach($rs as $t): ?>
                            <tr align="center">
                                <td><?= $t['rid']; ?></td>
                                <td><?= $t['pid']; ?></td>
                                <td><?= $t['pname']; ?></td>
                                <td><?= $t['description']; ?></td>
                                <td><?= $t['category']; ?></td>
                                <td><?= $t['rstatus']; ?></td>
                                <td><?= $t['pstatus']; ?></td>
                            </tr>
                        <?php endforeach; } else{?>
                            <tr align="center"><td colspan="7">No data available in table!</td></tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        <!-- panel3: My Pledges -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button style="float: right;" type="button" class="btn btn-primary btn-xs myallpledges">Detail&nbsp<span class="glyphicon glyphicon-hand-right"></span></button>
                    <h3 class="panel-title">My Pledges</h3>
                </div>
                <table width="100%" id="Mypledges" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="10%"><center>Request ID</center></th>
                            <th width="10%"><center>Project ID</center></th>
                            <th><center>Project Name</center></th>
                            <th><center>Investment</center></th>
                            <th><center>Pledged Time</center></th>
                            <th width="12%"><center>Project Status</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($pl[0])){
                             foreach($pl as $t): ?>
                            <tr align="center">
                                <td><?= $t['rid']; ?></td>
                                <td><?= $t['pid']; ?></td>
                                <td><?= $t['pname']; ?></td>
                                <td><?= $t['investment']; ?></td>
                                <td><?= $t['itime'] ?></td>
                                <td><?= $t['pstatus']; ?></td>
                            </tr>
                        <?php endforeach; } else{?>
                            <tr align="center"><td colspan="6">No data available in table!</td></tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        <!-- panel4: My Comments -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button style="float: right;" type="button" class="btn btn-primary btn-xs myallcomments">Detail&nbsp<span class="glyphicon glyphicon-hand-right"></span></button>
                    <h3 class="panel-title">My Comments</h3>
                </div>
                <table width="100%" id="Mycomments" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="10%"><center>Project ID</center></th>
                            <th><center>Project Name</center></th>
                            <th><center>Comments</center></th>
                            <th><center>Post Time</center></th>
                            <th width="12%"><center>Project Status</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($c[0])){
                             foreach($c as $t): ?>
                            <tr align="center">
                                <td><?= $t['pid']; ?></td>
                                <td><?= $t['pname']; ?></td>
                                <td><?= $t['opinion']; ?></td>
                                <td><?= $t['cposttime']; ?></td>
                                <td><?= $t['pstatus']; ?></td>
                            </tr>
                        <?php endforeach; } else{?>
                            <tr align="center"><td colspan="5">No data available in table!</td></tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>

        </div><!-- /.box-body -->
    <div class="box-footer">
              <!-- Footer -->
    </div><!-- /.box-footer-->
</div><!-- /.box -->

<?php
    $project->Disconnect();
    $requests->Disconnect();
    $pledges->Disconnect();
    $comments->Disconnect();
    // $category->Disconnect();
?>
