<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    require_once('History.php');
    $history = new History();
    $hist = $history->get_history_info($loginname);

?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">History Records</h3>
    </div>
    <!-- <br/> -->
    <div style="padding:10px 6px 6px;">
    <table width="100%" id="histable" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th><center>Action</center></th>
                <th><center>Time</center></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($hist as $h): ?>
                <tr align="center">
                <?php if($h['tag']=="p"){?>
                    <td><button type="button" title=<?php echo "\"{$h['actid']}\""?> class="btn btn-link rpid myhistory"><?= $h['history_info']; ?></button></td>
                <?php } ?>
                <?php if($h['tag']=="r"){?>
                    <td><button type="button" title=<?php echo "\"{$h['actid']}\""?> class="btn btn-link rrid myhistory"><?= $h['history_info']; ?></button></td>
                <?php } ?>
                <?php if($h['tag']=="c"){?>
                    <td><button type="button" title=<?php echo "\"{$h['actid']}\""?> class="btn btn-link rcpid myhistory"><?= $h['history_info']; ?></button></td>
                <?php } ?>
                    <td><?= $h['acttime']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#histable').DataTable({
            "ordering": false,
        });
    });
</script>
<?php
    $history->Disconnect();
?>
