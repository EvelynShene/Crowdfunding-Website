<?php
    require_once('../session.php');
    require_once('Requests.php');
    $loginname = $_SESSION["loginname"];
    $pid = $_POST["pid"];
    $pstatus = $_POST["pstatus"];

?>

<div class="panel panel-primary">
    <div class="panel-heading" >

        <button onclick="backtomyallprojects();" type="button" class="btn btn-box-tool" id="backtomyallprojects"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>

      <h3 style="display: inline-block;" class="panel-title" id=<?= $pid; ?> >Post a request</h3>
    </div>
    <form class="form-horizontal" style="margin-top:3%" role="form" id="form-postreqst">
      <div class="form-group">
        <label class="control-label col-sm-offset-1 col-sm-4" style="padding-right:3%" for="min_amount">Minimum amount:</label>
        <div class="col-sm-6" style="margin-left:-3%">
          <input type="text" class="form-control"  id="min_amount" placeholder="Enter the minimum amount your project needs" required="" onkeyup="num(this)">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-offset-1 col-sm-4" style="padding-right:3%" for="max_amount">Maximum amount:</label>
        <div class="col-sm-6" style="margin-left:-3%">
          <input type="text" class="form-control"  id="max_amount" placeholder="Enter the maximum amount your project needs" required="" onkeyup="num(this)">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-offset-1 col-sm-4" style="padding-right:3%" for="endtime">Deadline of the request:</label>
        <div class="col-sm-4 input-append date form_date" style="margin-left:-3%">
          <input size="16" class="form-time" type="text" id="endtime" value="" readonly>
          <span class="add-on"><i class="icon-th glyphicon glyphicon-th"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-offset-1 col-sm-4" style="padding-right:3%" for="planned_compl_time">Planned project completion time:</label>
        <div class="col-sm-4 input-append date form_date" style="margin-left:-3%">
          <input size="16" class="form-time" type="text" value="" id="planned_compl_time" readonly>
          <span class="add-on"><i class="icon-th glyphicon glyphicon-th"></i></span>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-4" style="margin-top:3%">
          <button type="submit" class="btn btn-success col-sm-12 postreq">Post</button>
        </div>
      </div>
    </form>
</div>

<script type="text/javascript">
    $(".form_date").datetimepicker({
      minView: "month",
      format: 'yyyy-mm-dd',
      todayBtn:  1,
      autoclose: 1,
    });
    $(".form_date").datetimepicker("setStartDate",new Date());
</script>
