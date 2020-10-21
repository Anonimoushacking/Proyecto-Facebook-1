<?php 
session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();
$ruta = 'Files/';
$mensage = '';
$conex=mysql_connect ("localhost","root","") or die ("servidor");

mysql_select_db ("videoaula",$conex) or die ("BD");
function bytes2English($filesize)
  {
  if ($filesize<1048676)
  RETURN number_format($filesize/1024,1) . " KB";
  if ($filesize>=1048576 && $filesize<1073741824)
  RETURN number_format($filesize/1048576,1) . " MB";
  if ($filesize>=1073741824 && $filesize<1099511627776)
  RETURN number_format($filesize/1073741824,2) . " GB";
  if ($filesize>=1099511627776)
  RETURN number_format($filesize/1099511627776,2) . " TB";
  if ($filesize>=1125899906842624) //Currently, PB won't show due to PHP limitations
  RETURN number_format($filesize/1125899906842624,3) . " PB";
  }
  
foreach($_FILES as $key)
{
if($key['error'] == UPLOAD_ERR_OK)
{
    $fileName = $key["size"];
	$NombreOriginal = $key['name'];
	$temporal = $key['tmp_name'];
	$Destino = $ruta.$NombreOriginal;
	$id_user=$_SESSION['id_user'];
	move_uploaded_file($temporal, $Destino);
}

if($key['error']==''){
$mensage .=$NombreOriginal.' <span class="icon-checkmark"></span> <br>';
$sql = "INSERT INTO `archivos` (`id`, `archivo`, `id_user`, `tam`, `fecha`) VALUES (NULL, '$NombreOriginal', '$id_user', '$fileName','0')";

  mysql_query ($sql,$conex) or die (mysql_error());
}
if($key['error']!=''){ 
  $mensage .=$NombreOriginal.' <span class="icon-cross"></span> <br>'.$key['error'];
}
}
echo $mensage;
?>
