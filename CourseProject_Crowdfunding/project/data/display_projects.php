<?php
    require_once('Project.php');

    $project = new Project();

    $projs = $project->get_all_projects();

?>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <!-- <button onclick="returncategory();" type="button" class="btn btn-box-tool" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button> -->
        <h3 class="box-title">Projects Information</h3>
              <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
    </div>
    <div class="box-body">
        <div id="table-project">
            <div class="table-responsive">
                <table id="myTable-project" title="allprojects" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="10%"><center>Project ID</center></th>
                            <th><center>Project Name</center></th>
                            <th><center>Project Description</center></th>
                            <th><center>Owner</center></th>
                            <th width="12%"><center>Project Status</center></th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php foreach($projs as $p): ?>
                            <tr align="center">
                                <td><button type="button" class="btn btn-link pid"><?= $p['pid']; ?></button></td>
                                <td><?= $p['pname']; ?></td>
                                <td><?= $p['description']; ?></td>
                                <!-- <td><button type="button" class="btn btn-link powner"></button></td> -->
                                <td><?= $p['owner']; ?></td>
                                <td><?= $p['pstatus']?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- /.table-responsive -->
        </div> <!-- /.table-project -->
    </div><!-- /.box-body -->
    <div class="box-footer">
              <!-- Footer -->
    </div><!-- /.box-footer-->
</div><!-- /.box -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-project').DataTable();
    });
</script>

<?php
$project->Disconnect();

?>
