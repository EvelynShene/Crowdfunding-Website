<?php

    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    require_once('Follows.php');


     $follows = new Follows();
     $followed = $follows->get_all_followers($loginname);
     $others = $follows->get_unfollowed_users($loginname);

?>

<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
          <h3 class="box-title">Whom I follow</h3>
              <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
    </div>
    <div class="box-body">
        <div id="table-type">
            <div class="table-responsive">
                <table id="myTable-type" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th><center>Followed User</center></th>
                            <th><center>Pledges</center></th>
                            <th><center>Comments</center></th>
                            <th><center>Likes</center></th>
                            <th><center>Unfollow</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($followed as $t): ?>
                            <tr align="center">
                                <td><a style="cursor:pointer;" class="fusr"><?= $t['loginname2']; ?></a></td>
                                <td>
                                    <button type="button" id=<?php echo "\"{$t['loginname2']}\""?> class="btn btn-primary btn-xs pledge">Check
                                    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" id=<?php echo "\"{$t['loginname2']}\""?> class="btn btn-primary btn-xs comment">Check
                                    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" id=<?php echo "\"{$t['loginname2']}\""?> class="btn btn-primary btn-xs like">Check
                                    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs unfollowp" style="width: 78px">Unfollow&nbsp
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- /.table-responsive -->
        </div> <!-- /.table-type -->
    </div><!-- /.box-body -->
    <div class="box-footer">
              <!-- Footer -->
    </div><!-- /.box-footer-->
</div>

<div class="box">
    <div class="box-header with-border">
          <h3 class="box-title">Website Users</h3>
              <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
    </div>
    <div class="box-body">
        <div id="table-type">
            <div class="table-responsive">
                <table id="myTable-otherusers" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th><center>User Loginname</center></th>
                            <th><center>User Name</center></th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($others as $s): ?>
                            <tr align="center">
                                <td><a style="cursor:pointer;" class="othusr"><?= $s['loginname']; ?></a></td>
                                <td><?= $s['name']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs followp" style="width: 78px">Follow&nbsp
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div> <!-- /.table-responsive -->
        </div> <!-- /.table-type -->
    </div><!-- /.box-body -->
    <div class="box-footer">
              <!-- Footer -->
    </div><!-- /.box-footer-->
</div>
<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-type').DataTable();
        $('#myTable-otherusers').DataTable();
    });

</script>

<?php

$follows->Disconnect();

?>
