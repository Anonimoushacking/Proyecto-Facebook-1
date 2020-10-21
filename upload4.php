<?php
session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();
$conex=mysql_connect ("localhost","root","") or die ("servidor");
mysql_select_db ("videoaula",$conex) or die ("BD");

$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "upload/$fileName")){
	$id_user=$_SESSION['id_user'];
$sql = "INSERT INTO `estados` (`id`, `archivo`, `id_user`,`fecha`,`limite`,`visitas`) VALUES (null, '$fileName',$id_user, '0','0','0')";

  mysql_query ($sql,$conex) or die (mysql_error());
?>
<?php if(end(explode(".", $_FILES["file1"]["name"]))=="jpg" || end(explode(".", $_FILES["file1"]["name"]))=="png"){?>
    <img src='upload/<?php echo $fileName; ?>' height='400' width='600'> 
    <?php }else if(end(explode(".", $_FILES["file1"]["name"]))=="mp3"){?>
<audio src="upload/<?php echo $fileName; ?>"  id="audio"  controls="controls">
  <?php }else if(end(explode(".", $_FILES["file1"]["name"]))=="mp4"){?>
<video src="upload/<?php echo $fileName; ?>" id="video" height='400' width='600' controls="controls">
 <?php } ?>
<?php } else {
    echo "move_uploaded_file function failed";
}
?>