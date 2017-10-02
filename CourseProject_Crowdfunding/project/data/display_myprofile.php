<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];
    require_once('Myprofile.php');
    $myprofile = new Myprofile();
    $types = $myprofile->get_profile_info($loginname);
?>

<div class="panel panel-primary">
    <div class="panel-heading">    
        <h3 style="display: inline-block;" class="panel-title">Profile Information</h3>
    </div>
    <table width="100%"  class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <td width="20%"><b>Login Name</b></td>
                <td ><?= $types['loginname']; ?></td>
            </tr>
            <tr>
                <td><b>Nick Name</b></td>
                <td id="enn"><?= $types['name']; ?></td>
            </tr>
             <tr>
                <td><b>Hometown</b></td>
                <td id="eht"><?= $types['hometown']; ?></td>
            </tr>
             <tr>
                <td><b>Credit Card Number</b></td>
                <td id="eccn"><?= $types['ccn']; ?></td>
            </tr>
        </tbody>
    </table>
</div>
    <button type="button" id=<?php echo "\"{$types['loginname']}\""?> class="btn btn-primary editprofile col-sm-offset-10 col-sm-2">
       <span>Edit</span>
    </button>


<?php
// echo json_encode($types);
    $myprofile->Disconnect();
?>
