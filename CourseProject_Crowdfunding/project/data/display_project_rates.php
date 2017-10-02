<?php
    // require_once('../session.php');
    // $loginname = $_SESSION["loginname"];
    $pid = $_POST["pid"];
    require_once('Rate.php');
    $rate = new Rate();

    $rs = $rate->get_project_rates($pid);
?>

<!-- <div class="modal fade" id="modal-display"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close rclose" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Rate Details</h4>
            </div>
            <div class="modal-body">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <!-- <th>sponsor</th> -->
                        <th><center>Sponsor</center></th>
                        <th><center>Star</center></th>
                    </tr>
                </thead>
            <tbody>
                <?php foreach($rs as $t): ?>
                        <tr align="center">
                            <td align="center"><?= $t['sponsor']; ?>
                                </td>
                            <td><?= $t['star']; ?>
                            <!-- <span type="number" class="rating prate" min=0 max=5 step=1 stars= readonly="true"> -->
                           <!--  <span name="rate" value=<?php //echo "\"{$t['star']}\""?> class="rating rating-loading prate" data-min="0" data-max="5" data-step="1" data-readonly="true">

                            </span> -->
                            </td>
                        </tr>
                <?php endforeach; ?>
            </tbody></table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default rclose" data-dismiss="modal">OK
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
<!-- </div> -->
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('.prate').rating();
        $('#input-6').rating();
        // $('.prate').rating({readonly:true, step:1});
        // $('div').raty({ readOnly: true, score: 3 });
    });
</script> -->

<?php
    $rate->Disconnect();
?>
