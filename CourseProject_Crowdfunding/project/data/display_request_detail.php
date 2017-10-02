<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    $rid = $_POST["rid"];
    $titlekey = $_POST["titlekey"];
    require_once('Requests.php');
    require_once('History.php');
    require_once('Presentation.php');

    $requests = new Requests();
    $requ = $requests->get_request_detail($rid);
    // add history
    $history_info = "You checked a request (".$rid.") about the project \"".$requ['pname']."\".";
    $tag = "r";
    $result = $history->save_history_info($loginname, $history_info, $rid, $tag);
    //show demos
    $presentation = new Presentation();
    $pres = $presentation->get_presentation($requ['pid']);
?>

<div class="panel panel-primary">
    <div class="panel-heading">

    <?php if($titlekey == "allreq"){ ?>
        <button onclick="backtorequests();" type="button" class="btn btn-box-tool" id="backtorequests"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
    <?php } else if($titlekey == "myreq"){ ?>
        <button onclick="backtomyrequests();" type="button" class="btn btn-box-tool" id="backtomyrequests"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
    <?php } else if($titlekey == "myhistory"){ ?>
        <button onclick="returnmyhist();" type="button" class="btn btn-box-tool" id="backtomyrequests"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
    <?php }?>

        <h3 style="display: inline-block;" class="panel-title">Request Details</h3>

    <?php if($requ['rstatus']!='over'){?>
        <button style="float: right" type="button" class="btn btn-primary pledgeprj" title="pledge" >
            <span>Pledge</span><span class="glyphicon glyphicon-usd"></span>
        </button>
    <?php } ?>
    </div>
    <table width="100%" id=<?php echo "\"{$rid}\""?> class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <td width="12%"><b>Request ID</b></td>
                <td><?= $requ['rid']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                <td><b>Project Name</b></td>
                <td><?= $requ['pname']; ?></td>
                <td><b>Request Status</b></td>
                <td><?= $requ['rstatus']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                <td><b>Already Raised</b></td>
                <td>$<?= $requ['actual_amount']; ?></td>
            </tr>
            <tr>
                <td colspan="2"><b>Description</b></td>
                <td colspan="6"><?= $requ['description']; ?></td>
            </tr>
            <tr>
                <td colspan="2"><b>Request Poster</b></td>
                <td colspan="2"><a style="cursor:pointer;" class="rowner"><?= $requ['owner']; ?></td>
                <td><b>Category</b></td>
                <td colspan="3"><?= $requ['category']; ?></td>
            </tr>
            <tr>
                <td colspan="2"><b>Minimum Amount</b></td>
                <td colspan="2">$<?= $requ['min_amount']; ?></td>
                <td><b>Maxmum Amount</b></td>
                <td colspan="3">$<?= $requ['max_amount']; ?></td>
            </tr>
            <tr>
                <td colspan="2"><b>Request Posting Time</b></td>
                <td colspan="2"><?= $requ['rposttime']; ?></td>
                <td><b>Request Closing Date</b></td>
                <td colspan="3"><?= $requ['endtime']; ?></td>
            </tr>
            <tr>
                <td colspan="2"><b>Project Planned Completion Time</b></td>
                <td colspan="2"><?= $requ['planned_compl_time']; ?></td>
                <td><b>Pledged funding</b></td>
                <td colspan="3"><?= $requ['actual_amount']; ?>
                    <button type="button" class="btn btn-primary btn-xs invest">Detail<span class="glyphicon glyphicon-hand-right"></span></button>
                </td>
            </tr>

            <tr>
                <table id="myTable-type" class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr align="center"><td style="border-top: 1px grey solid;" colspan="4"><b>Materials of the Project<b></td></tr>
                        <?php foreach($pres as $p): ?>
                            <tr align="center">
                                <td><?= $p['fname']; ?></td>
                                <td>
                                    <a id=<?= $requ['pid']; ?> onclick="showfile('<?= $p['path'];?>');"  href="#">check</a >
                                    <!-- target="_blank" -->
                                </td>
                                <td><?= $p['updatetime']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </tr>
        </tbody>
    </table>
</div>

<script>

    function showfile(url){

         var orgtreewin = window.open(url,"");
          orgtreewin.focus();
      //alert(url);
    }

</script>

<?php
    $requests->Disconnect();
?>
