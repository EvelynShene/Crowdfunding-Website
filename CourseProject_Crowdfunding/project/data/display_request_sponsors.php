<?php
    $rid = $_POST["rid"];
    require_once('Requests.php');
    $requests = new Requests();

    $rs = $requests->get_request_sponsors($rid);
?>

<!-- <div class="modal fade" id="modal-display"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close rclose" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pledges Detail</h4>
            </div>
            <div class="modal-body">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <!-- <th>sponsor</th> -->
                        <th><center>Sponsor</center></th>
                        <th><center>Investment</center></th>
                        <th><center>Pledged Time</center></th>
                        <th><center>Pledge Status</center></th>
                    </tr>
                </thead>
            <tbody>
            <?php if(!empty($rs[0])){
                 foreach($rs as $t): ?>
                        <tr align="center">
                            <td><?= $t['sponsor']; ?></td>
                            <td><?= $t['investment']; ?></td>
                            <td><?= $t['itime']; ?></td>
                            <td><?= $t['istatus']; ?></td>
                        </tr>
                <?php endforeach; } else{?>
                    <tr align="center"><td colspan="4">No one pledge money to this project!</td></tr>
                <?php } ?>
            </tbody></table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default rclose" data-dismiss="modal">OK
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>

<?php
    $requests->Disconnect();
?>
