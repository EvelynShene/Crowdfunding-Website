<?php
    require_once('../session.php');
    $loginname = $_SESSION["loginname"];

    $pid = $_POST["pid"];
    $titlekey = $_POST["titlekey"];
    $isc = $_POST["c"];
    require_once('Project.php');
    require_once('Likes.php');
    require_once('History.php');
    require_once('Comments.php');
    require_once('Presentation.php');

    $pc = false; // varible to check if project is completed.
    $project = new Project();
    $likes = new Likes();
    $comments = new Comments();

    $projs = $project->get_project_detail($pid);
    if($projs['pstatus']=="completed"){
        $pc = true;
        $pavgrate = $project->get_avg_rate($pid);
    }

    $liked = $likes->isliked($loginname,$pid);
    $comm = $comments->get_project_comments($pid);

    $history_info = "You viewed a project \"".$projs['pname']."\" (".$pid.").";
    $tag = "p";
    $result = $history->save_history_info($loginname, $history_info, $pid, $tag);

    $presentation = new Presentation();
    $pres = $presentation->get_presentation($pid);

    //is my project?
    $ismine = $project->isMy_project($pid,$loginname);
?>

<div class="panel panel-primary">
    <div class="panel-heading panel1">

    <?php if($titlekey == "allprojects"){ // from allproject page ?>
        <button type="button" onclick="returnallproj();" title="allprojects" class="btn btn-box-tool" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"</span></button>
    <?php } else if($titlekey == "my"){ ?>
        <button type="button" onclick="returnmyproj();" title="my" class="btn btn-box-tool" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"</span></button>
    <?php } else if($titlekey == "myhistory"){ ?>
        <button type="button" onclick="returnmyhist();" title="myhistory" class="btn btn-box-tool" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"</span></button>

    <?php } else{ // from category?>
        <button type="button" onclick="returncatproj('<?= $titlekey; ?>');" title=<?php echo "\"{$titlekey}\""?> class="btn btn-box-tool" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"</span></button>
    <?php }?>

        <h3 style="display: inline-block;" class="panel-title">Project Details</h3>
    <?php if($liked['islike'] == '0'){?>
        <!-- <button style="float: right" type="button" class="btn btn-primary likeprj" onclick="like('<?= $pid;?>');"> -->
        <button style="float: right" type="button" class="btn btn-primary likeprj" title="like" >
            <span>Like</span><span class="glyphicon glyphicon-heart-empty"></span>
        </button>
    <?php } else {?>
        <button style="float: right" type="button" class="btn btn-info likeprj" title="unlike" >
            <span>Liked</span><span class="glyphicon glyphicon-heart"></span>
        </button>
    <?php }
        if (!empty($ismine) && ($projs['pstatus'] == 'idle' or $projs['pstatus'] == 'fail')){?>
            <button style="float:right; padding-top: 0.72%; padding-bottom: 0.72%" type="button" class="btn btn-primary btn-xs postrequest">Post a request <span class="glyphicon glyphicon-hand-right"></span></button>
    <?php } if(!empty($ismine) && $projs['pstatus'] == 'processing'){?>
         <button style="float: right" type="button" class="btn btn-primary projcpl" onclick="completeproj('<?= $pid; ?>','<?= $titlekey; ?>');" >
            <span>Project Completed</span><span class="glyphicon glyphicon-ok"></span>
        </button>
    <?php } ?>

    </div>
    <table width="100%" id=<?php echo "\"{$pid}\""?>  class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <td><b>Project ID</b></td>
                <td id="pidup"><?= $projs['pid']; ?></td>
                <td><b>Project Name</b></td>
                <td><?= $projs['pname']; ?></td>
            </tr>
            <tr>
                <td><b>Description</b></td>
                <td colspan="3"><?= $projs['description']; ?></td>
            </tr>
            <tr>
                <td><b>Project Owner</b></td>
                <!-- <td><button type="button" class="btn btn-link owner"></button></td> -->
                <td><a style="cursor:pointer;" class="powner"><?= $projs['owner']; ?></a></td>
                <td><b>Category</b></td>
                <td><?= $projs['category']; ?></td>
            </tr>
            <tr>
                <td><b>Status</b></td>
                <td colspan="3"><?= $projs['pstatus']; ?></td>
            </tr>
            <?php if($pc){
                    if($pavgrate['avgrate']){ ?>
            <tr>
                <td><b>Project Rate</b></td>
                <td colspan="3"><?= $pavgrate['avgrate']; ?>
                    <button type="button" class="btn btn-primary btn-xs rate">Detail<span class="glyphicon glyphicon-hand-right"></span></button>
                </td>
            </tr>
            <?php }else{ ?>
            <tr>
                <td><b>Project Rate</b></td>
                <td colspan="3"> No one rate this project.
                </td>
            </tr>
            <?php
            } }
            if(!empty($ismine)){
            ?>

            <tr>
                <td><b>Project Demos</b></td>
                <td colspan="3">
                    <!-- <form action="data/upload_file.php" method="post" enctype="multipart/form-data"> -->
                    <form enctype="multipart/form-data" id="uploadf">
                        <input type="text" name="pid" value=<?php echo "\"{$pid}\""?> style="display:none" />
                        <input type="file" name="file" id="file" />
                        <br />
                        <input type="button" style="float: left;" name="submit" value="submit" class="btn btn-primary" onclick="doUpload('<?= $pid; ?>','<?= $titlekey; ?>')" />
                        <input type="text" name="titlekey" value=<?php echo "\"{$titlekey}\""?> style="display:none" />
                        <span style="padding-left: 2px;" >Note: You can upload *.txt, *.pdf, *.doc, *.docx, *.jpg, *.png, *.bmp, *.gif</span>
                        <br>
                        <span style="padding-left: 2px" >(The maximum file size is 2M)</span>
                    </form>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <table id="myTable-type" class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr align="center"><td style="border-top: 1px grey solid;" colspan="4"><b>Materials of the Project<b></td></tr>
                        <?php foreach($pres as $p): ?>
                            <tr align="center">
                                <td><?= $p['fname']; ?></td>
                                <td>
                                    <a id=<?= $pid ?> onclick="showfile('<?= $p['path'];?>');"  href="#">check</a >
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


<div class="panel panel-primary">
    <div class="panel-heading col-sm-12">
        <h3 style="display: inline-block; padding-top: 8px;" class="panel-title col-sm-4">Project's comments</h3>
        <button type="button" id=<?php echo "\"{$pid}\"" ?> class="btn btn-primary comm col-sm-offset-6 col-sm-2"><span>Comment</span></button>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th><center>Reviewer</center></th>
                <th><center>Opinion</center></th>
                <th><center>Post Time</center></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($comm as $c): ?>
                <tr align="center">
                    <td><a style="cursor:pointer;" class="commer"><?= $c['loginname']; ?></a></td>
                    <td><?= $c['opinion']; ?></td>
                    <td><?= $c['cposttime']; ?></td>
                </tr>
            <?php endforeach; ?>
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
    $project->Disconnect();
    $likes->Disconnect();

?>
