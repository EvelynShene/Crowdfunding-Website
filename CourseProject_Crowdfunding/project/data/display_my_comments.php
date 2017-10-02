<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    require_once('Comments.php');

    $comments = new Comments();
    $cs = $comments->get_all_comments($loginname);
?>

<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
          <!-- <button onclick="backtofollows();" type="button" class="btn btn-box-tool" id="backtofollows"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button> -->
          <h3 class="box-title">My Comments</h3>
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
                            <th width="10%"><center>Project ID</center></th>
                            <th><center>Project Name</center></th>
                            <th><center>Comments</center></th>
                            <th width="12%"><center>Post Time</center></th>
                            <th width="12%"><center>Project Status</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cs as $t): ?>
                            <tr align="center">
                                <td><?= $t['pid']; ?></td>
                                <td><?= $t['pname']; ?></td>
                                <td><?= $t['opinion']; ?></td>
                                <td><?= $t['cposttime']; ?></td>
                                <td><?= $t['pstatus']; ?></td>
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

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-type').DataTable();
    });

</script>

<?php
    $comments->Disconnect();
?>
