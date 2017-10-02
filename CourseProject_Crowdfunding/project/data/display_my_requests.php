<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    require_once('Requests.php');
    $requests = new Requests();
    $types = $requests->get_my_requests($loginname);
?>

<div class="box">
    <div class="box-header with-border">
          <h3 class="box-title">My Requests</h3>
              <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
    </div>
    <div class="box-body">
        <div id="table-type">
            <div class="table-responsive">
                <table id="myTable-request" title="myreq" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th><center>Request id</center></th>
                            <th><center>Project name</center></th>
                            <th><center>Owner</center></th>
                            <th><center>Status</center></th>
                            <th><center>Progress</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($types as $t): ?>
                            <tr align="center">
                                <td>
                                    <button type="button" id=<?php echo "\"{$t['rid']}\""?> class="btn btn-link requid"><?= $t['rid']; ?></button>
                                </td>
                                <td><?= $t['pname']; ?></td>
                                <td><?= $t['owner']; ?></td>
                                <?php if($t['rstatus'] == 'over'){?> <td style='color:red'><?= $t['rstatus']; ?></td><?php }
                                if($t['rstatus'] == 'pending'){?> <td style='color:green'><?= $t['rstatus']; ?></td><?php }?>
                                <td>
                                <?php $width = (($t['actual_amount']/$t['max_amount'])*100).'%'; ?>
                                <?php if($t['rstatus'] == 'over' and ($t['pstatus'] == 'processing' or $t['pstatus'] == 'completed') ){?> <span class="rsta" style="color:green">success</span><?php }
                                if($t['rstatus'] == 'over' and $t['pstatus'] == 'fail'){?> <span class="rsta" style="color:red">fail</span><?php }
                                if($t['rstatus'] == 'pending'){?><div class="progress" style="background-image:linear-gradient(to bottom, #d2d6de 0, #f5f5f5 100%)"> <div class="progress-bar" aria-valuemin="0" aria-valuemax="100" style="width:<?= $width; ?>"></div><?php }?>
                                </div></td>
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
        $('#myTable-request').DataTable();
    });

</script>

<?php
// echo json_encode($types);
$requests->Disconnect();

?>
