<?php
    $loginname2 = $_POST["loginname2"];
    require_once('Pledges.php');
    $pledges = new Pledges();
    $types = $pledges->get_all_pledges($loginname2);
?>


<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
          <button onclick="backtofollows();" type="button" class="btn btn-box-tool" id="backtofollows"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
          <h3 class="box-title">What he/she sponsors</h3>
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
                            <th><center>Investment</center></th>
                            <th><center>Invest Status</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($types as $t): ?>
                            <tr align="center">
                                <td><?= $t['sponsor']; ?></td>
                                <td><?= $t['pname']; ?></td>
                                <td><?= $t['investment']; ?></td>
                                <td><?= $t['istatus']; ?></td>
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
$pledges->Disconnect();

?>
