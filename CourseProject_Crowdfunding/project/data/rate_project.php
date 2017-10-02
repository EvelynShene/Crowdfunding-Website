<?php
    // require_once('../session.php');
    // $loginname = $_SESSION["loginname"];
    $pid = $_POST["pid"];
    $pname = $_POST["pname"];
    $invest = $_POST["invest"];
?>

<!-- <div class="modal fade" id="modal-display"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close rclose" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Rate Completed Project</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-addrate">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th><center>PID</center></th>
                            <th><center>Project Name</center></th>
                            <th><center>Investment</center></th>
                            <th><center>Star</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="center">
                            <td id="pid"><?= $pid; ?></td>
                            <td><?= $pname; ?></td>
                            <td><?= $invest; ?></td>
                            <td>
                            <!-- <form role="form" id="form-addrate"> -->
                                <select class="form-control" id="projrate">
                                    <option>5</option>
                                    <option>4</option>
                                    <option>3</option>
                                    <option>2</option>
                                    <option>1</option>
                                </select>
                            <!-- </form> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
            </div>

        </div>
    </div>
<!-- </div> -->
