<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];

?>

<div class="panel panel-primary">
    <div class="panel-heading">
      <button type="button" class="btn btn-box-tool" id="backtohome"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
      <h3 style="display: inline-block;" class="panel-title">Add a project</h3>
    </div>
    <form class="form-horizontal" style="margin-top:3%" role="form" id="form-addproj">
      <div class="form-group">
        <label class="control-label col-sm-offset-1 col-sm-2" style="padding-right:3%" for="pname">Project name:</label>
        <div class="col-sm-8" style="margin-left:-3%">
          <input type="text" class="form-control"  id="pname" placeholder="Name your new project" required="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-offset-1 col-sm-2" style="padding-right:3%" for="descrip">Description:</label>
        <div class="col-sm-8" style="margin-left:-3%">
          <textarea class="form-control"  id="descrip" placeholder="Describe your new project in order to let others know about it."></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-offset-1 col-sm-2" style="padding-right:3%" for="catg">Category:</label>
        <div class="col-sm-8" style="margin-left:-3%">
          <select class="form-control" id="catg">
            <option>Academic</option>
            <option>Action film</option>
            <option>Animal</option>
            <option>Art books</option>
            <option>Blues</option>
            <option>Comedy</option>
            <option>Food</option>
            <option>Horror Film</option>
            <option>Jazz</option>
            <option>Painting</option>
            <option>Poetry</option>
            <option>Rock</option>
            <option>Others</option>
          </select>
        </div>
      </div>
      <!-- <div class="form-group">
        <label class="control-label col-sm-offset-1 col-sm-2" style="padding-right:3%" for="catg">Upload files:</label>
        <div class="col-sm-8" style="margin-left:-3%">
          <input type="file" name="myfile" value="" style='font-size:16px'/>
        </div>
      </div> -->
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-4" style="margin-top:3%">
          <button type="submit" class="btn btn-success col-sm-12">Add</button>
        </div>
      </div>
    </form>
</div>
