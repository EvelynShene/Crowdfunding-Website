<?php
    require_once('Comments.php');
    $loginname2 = $_POST["loginname2"];
    $comments = new Comments();
    $types = $comments->get_all_comments($loginname2);
?>

<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
          <button onclick="backtofollows();" type="button" class="btn btn-box-tool" id="backtofollows"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
          <h3 class="box-title">What he/she comments</h3>
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
                            <th><center>Followed</center></th>
                            <th><center>Project</center></th>
                            <th><center>Opinion</center></th>
                            <th><center>Post Time</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($types as $t): ?>
                            <tr align="center">
                                <td><?= $t['loginname']; ?></td>
                                <td><?= $t['pname']; ?></td>
                                <td><?= $t['opinion']; ?></td>
                                <td><?= $t['cposttime']; ?></td>
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
// echo json_encode($types);
$comments->Disconnect();

?>
