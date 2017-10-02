<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    require_once('Category.php');
    $category = new Category();
    // $types = $category->get_all_categories();
    $mytypes = $category->get_interested_categories($loginname);
    $others = $category->get_other_categories($loginname);
?>

<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
          <h3 class="box-title">Category Information</h3>
              <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
    </div>
    <div class="box-body">
        <div id="table-type">
            <div class="table-responsive">
                <table id="myTable-type" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <!-- <th><center>Price / Kg</center></th> -->
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mytypes as $t): ?>
                            <tr align="center">
                                <td align="left">
                                    <button type="button" id=<?php echo "\"{$t['category']}\""?> class="btn btn-link catlabel"><?= $t['category']; ?> </button>
                                    </td>
                                <td>
                                    <!-- <button type="button" class="btn btn-xs disabled" disabled="disabled" >Interested -->
                                    <button onclick="uninterest('<?= $t['category']; ?>');" type="button" class="btn btn-info btn-xs" style="width: 78px" >Interested
                                    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                         <?php foreach($others as $s): ?>
                            <tr align="center">
                                <td align="left">
                                    <button type="button" id=<?php echo "\"{$s['category']}\""?> class="btn btn-link catlabel"><?= $s['category']; ?></button>
                                </td>
                                <td>
                                    <button onclick="interest('<?= $s['category']; ?>');" type="button" class="btn btn-primary btn-xs" style="width: 78px">Interest
                                    <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
                                    </button>
                                </td>
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
</div><!-- /.box -->

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-type').DataTable();
    });
</script>

<?php
    $category->Disconnect();
?>
