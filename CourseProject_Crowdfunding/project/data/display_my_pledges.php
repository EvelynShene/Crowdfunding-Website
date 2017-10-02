<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    require_once('Pledges.php');
    // require_once('Rate.php');

    $pledges = new Pledges();
    $pl = $pledges->get_all_pledges2($loginname);

    // $rate = new Rate();
    // $r = $rate->get_user_rates($loginname);

?>


<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
          <!-- <button onclick="backtofollows();" type="button" class="btn btn-box-tool" id="backtofollows"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button> -->
          <h3 class="box-title">My Pledges</h3>
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
                            <th width="12%"><center>Request ID</center></th>
                            <th width="12%"><center>Project ID</center></th>
                            <th><center>Project Name</center></th>
                            <th><center>Investment</center></th>
                            <th><center>Pledged Time</center></th>
                            <th width="12%"><center>Invest Status</center></th>
                            <th width="12%"><center>Project Status</center></th>
                            <th><center>Rate</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pl as $t): ?>
                            <tr align="center">
                                <td><?= $t['rid']; ?></td>
                                <td><?= $t['pid']; ?></td>
                                <td><?= $t['pname']; ?></td>
                                <td><?= $t['investment']; ?></td>
                                <td><?= $t['itime']; ?></td>
                                <td><?= $t['istatus']; ?></td>
                                <td><?= $t['pstatus']; ?></td>
                                <td>
                                <?php if($t['pstatus']=='completed') {
                                        if($t['star'] != null){ ?>
                                    <!-- <button type="button" class="btn btn-primary btn-xs ">Rate project</button> -->
                                    <?= $t['star']; ?>
                                <?php } else{ ?>
                                    <button type="button" class="btn btn-primary btn-xs toRate">Rate project</button>
                                <?php }} else{ ?>

                                <?php   } ?>
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

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-type').DataTable();
    });

</script>

<?php
// echo json_encode($types);
$pledges->Disconnect();
// $rate->Disconnect();

?>
