<?php
$conex=mysql_connect ("localhost","root","") or die ("servidor");

mysql_select_db ("videoaula",$conex) or die ("BD");
?>
<?php 
$cont_publicacion=$_POST['cont_publicacion'];
$propietario=$_POST['propietario'];
 
$sql = "INSERT INTO `publicaciones` (`id`, `id_user`, `mensaje`, `fecha`) VALUES (NULL, '$propietario', '$cont_publicacion', NULL)";

  mysql_query ($sql,$conex) or die (mysql_error());
?>


