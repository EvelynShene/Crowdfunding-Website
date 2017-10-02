<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    $rid = $_POST["rid"];
    $ccn = $_POST["ccn"];
    // $invest = $_POST["invest"];
?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close rclose" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pledge Request</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-dopledge">
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr align="center">
                            <td><b>RID</b></td>
                            <td id="ridpl"><?= $rid; ?></td>
                        </tr>
                        <tr align="center">
                            <td><b>Sponsor</b></td>
                            <td><?= $loginname; ?></td>
                        </tr>
                        <tr align="center">
                            <td><b>Credit Card Number</b></td>
                            <td><?= $ccn; ?></td>
                        </tr>
                        <tr align="center">
                            <td><b>Investment</b></td>
                            <td>
                                <!-- <div class="col-sm-8" style="margin-left:-3%"> -->
                                <!-- <input type="text" class="form-control"  id="money" placeholder="Money you want to pledge" required="" onchange="if(/[^\d.]/g.test(this.value)){alert('please enter a positve number'); this.value='';}" > -->
                                <input type="text" class="form-control"  id="money" placeholder="Money you want to pledge" required="" onkeyup="num(this)" >

                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="modal-footer">
                    <p>Note*: You can only pledge a request once.</p>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
            </div>

        </div>
    </div>

<!-- <script type="text/javascript">

</script> -->
