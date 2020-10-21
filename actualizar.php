<?php 
session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();

$conex=mysql_connect ("localhost","root","") or die ("servidor");
mysql_select_db ("videoaula",$conex) or die ("BD"); 

$dat1=$_POST['dat1'];
$dat3=$_POST['dat3'];
$dat4=$_POST['dat4'];
$dat5=$_POST['dat5'];
$dat6=$_POST['dat6'];
$dat7=$_POST['dat7'];
$idd=$_POST['idd'];
$upOnline = BD::conn()->prepare("UPDATE `usuarios` SET pais = ?,`nome` = ?,`apellidos` = ?,`telefono` = ?,`password` =  ?,`sexo` = ? WHERE `id` = ?");
$upOnline->execute(array($dat7, $dat1, $dat3, $dat5, $dat6, $dat4,  $idd));

 echo 'bien ssss s ss ss s';
 ?>