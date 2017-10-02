
<?php
  require_once('Presentation.php');
  $pid = $_POST['pid'];
  $r['pid']=$pid;
  $titlekey = $_POST['titlekey'];
  $r['titlekey'] = $titlekey;
  $r['file'] = $_FILES['file'];

  define('ROOT', dirname(dirname(__FILE__)));
  //ROOT = "localhost/project1";
  $storeroot = "/project1";
  $r['root'] = ROOT;

  $presentation = new Presentation();

if (($_FILES["file"]["type"] == "image/gif")
  ||($_FILES["file"]["type"] == "image/jpeg")
  ||($_FILES["file"]["type"] == "image/pjpeg")
  ||($_FILES["file"]["type"] == "image/png")
  ||($_FILES["file"]["type"] == "image/bmp")
  ||($_FILES["file"]["type"] == "application/x-MS-bmp")
  ||($_FILES["file"]["type"] == "application/pdf")
  ||($_FILES["file"]["type"] == "application/msword")
  ||($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
  ||($_FILES["file"]["type"] == "text/plain")
  ||($_FILES["file"]["type"] == "application/vnd.ms-powerpoint")
  ||($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.presentationml.presentation
")
  ||($_FILES["file"]["type"] == "text/html")
  ||($_FILES["file"]["type"] == "audio/x-mpeg")
  ||($_FILES["file"]["type"] == "video/mp4"))
  {

  if ($_FILES["file"]["error"] > 0)
    {
      $r['error'] = "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
      $dirn = ROOT.'/presentation/'.$pid.'/';
      // 首先需要检测目录是否存在
      if (!is_dir($dirn))
        mkdir($dirn,0777,true);

      $r['uploadname'] = "Upload: " . $_FILES["file"]["name"] . "<br />";
      $r['type'] = "Type: " . $_FILES["file"]["type"] . "<br />";
      $r['size'] = "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
      $r['tmp'] = "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists($dirn. $_FILES["file"]["name"]))
      {
        $r['error'] = $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
                $stored_path = $dirn.$_FILES['file']['name'];

                if(move_uploaded_file($_FILES['file']['tmp_name'],$stored_path)){
                    $r['des'] = "Stored in: " . $stored_path;

                    $sqlpath = $storeroot.'/presentation/'.$pid.'/'.$_FILES['file']['name'];

                    $ps = $presentation->add_presentation($pid,$sqlpath,$_FILES["file"]["name"]);

                }else{
                    $r['error'] =  'Stored failed:file save error';
                }
            }else{
                $r['error'] = 'Stored failed:no post ';
            }
      }
    }
  }
else
  {
  $r['error'] = "Invalid file";
  }
echo json_encode($r);
?>
