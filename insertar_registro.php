<?php
sleep(3);
$conex=mysql_connect ("localhost","root","") or die ("servidor");

mysql_select_db ("videoaula",$conex) or die ("BD");
?>
<?php 
$nombre=utf8_encode($_POST['nombre']);
$apellidos=$_POST['apellidos'];
$correo=utf8_encode($_POST['correo']);
$password=utf8_encode(md5($_POST['password']));
$sexo=utf8_encode($_POST['sexo']);
$pais=utf8_encode($_POST['pais']);
$telefono=utf8_encode($_POST['telefono']);
$dia=utf8_encode($_POST['dia']);
$mes=utf8_encode($_POST['mes']);
$ao=utf8_encode($_POST['ao']);
$nuevo_usuario=mysql_query("SELECT email FROM usuarios WHERE email ='$correo'");
if(mysql_num_rows($nuevo_usuario)>0){
 }else{ 
 
$sql = "INSERT INTO `usuarios` (`id`, `foto`, `nome`, `apellidos`, `email`, `password`, `sexo`, `pais`, `telefono`,  `dia`,  `mes`,  `ao`, `horario`, `limite`, `blocks`) VALUES (NULL, '', '$nombre', '$apellidos', '$correo', '$password', '$sexo', '$pais', '$telefono',  '$dia',  '$mes',  '$ao', '', 1, 2)";

  mysql_query ($sql,$conex) or die (mysql_error());
?>
<script>
$("#form_seg").hide();	
$("#results").hide();
$("#resultt").hide();
$("#co").fadeIn();
$("#alt").fadeIn();
$('#formularios').load('form_index.php');
$("#co").html("<div id='alt' class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button>Gracias <?php echo $nombre ?> Por Hacer Parte De Social Network...</div>");</script>
<?php
 }
?>

