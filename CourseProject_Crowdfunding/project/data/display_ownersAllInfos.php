<?php
    // require_once('../session.php');
    // $loginname = $_SESSION["loginname"];
    $owner = $_POST["owner"];

    require_once('Project.php');
    require_once('Requests.php');
    require_once('User.php');
    require_once('Category.php');

    $project = new Project();
    $requests = new Requests();
    $user = new User();
    $category = new Category();

    $projs = $project->get_owner_project($owner);
    $rs = $requests->get_owner_requests($owner);
    $usrinfo = $user->get_usrinfo($owner);
    $interestc = $category->get_interested_categories($owner);
?>

<!-- <div class="modal fade" id="modal-display"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close rclose" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Owner Information</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <h3 class="panel-title">Basic Information</h3>
                    </div>
                    <table width="100%" class="table table-bordered table-hover table-striped">
                        <tbody>
                            <tr>
                                <td><b>Login Name</b></td>
                                <td><?= $usrinfo['loginname']; ?></td>
                                <td><b>Nickname</b></td>
                                <td><?= $usrinfo['name']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Hometown</b></td>
                                <td><?= $usrinfo['hometown']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Interested Categories</b></td>
                                <td colspan="3"><?php foreach($interestc as $t): ?>
                                    <?= $t['category']; ?> ; &nbsp;&nbsp;
                                <?php endforeach; ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <h3 class="panel-title">His/Her Projects</h3>
                    </div>
                    <table width="100%" id="Ownerprojects" class="table table-bordered table-hover table-striped">
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
                            <?php foreach($projs as $s): ?>
                                <tr align="center">
                                    <td><?= $s['pid']; ?></td>
                                    <td><?= $s['pname']; ?></td>
                                    <td><?= $s['description']; ?></td>
                                    <td><?= $s['pstatus']; ?></td>
                                    <td><?= $s['category']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
                 <div class="panel panel-primary">
                    <div class="panel-heading">
                            <h3 class="panel-title">His/Her Requests</h3>
                    </div>
                    <table width="100%" id="Ownerrequests" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th><center>PID</center></th>
                                <th><center>RID</center></th>
                                <th><center>Request Status</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rs as $r): ?>
                                <tr align="center">
                                    <td><?= $r['pid']; ?></td>
                                    <td><?= $r['rid']; ?></td>
                                    <td><?= $r['rstatus']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default rclose" data-dismiss="modal">OK
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
<!-- </div> -->

<?php
    $project->Disconnect();
    $requests->Disconnect();
    $user->Disconnect();
    $category->Disconnect();
?>
