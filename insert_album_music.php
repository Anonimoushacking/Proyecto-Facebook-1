<?php
$conex=mysql_connect ("localhost","root","") or die ("servidor");

mysql_select_db ("videoaula",$conex) or die ("BD");
?>
<?php 
$nombre_album=utf8_encode($_POST['nombre_album']);
$propietario=$_POST['propietario'];
$descripcion=utf8_encode($_POST['descripcion']);

$sql = "INSERT INTO `albumnes` (`id`, `nombre`, `propietario`, `descripcion`, `fecha`) VALUES (NULL, '$nombre_album', '$propietario', '$descripcion', NULL)";

  mysql_query ($sql,$conex) or die (mysql_error());
?>
