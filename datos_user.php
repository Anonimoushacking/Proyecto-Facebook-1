<?php

$conex=mysql_connect ("127.0.0.1","root","") or die ("servidor");
mysql_select_db ("videoaula",$conex) or die ("BD");
sleep(5);
$id = $_GET['id'];
$sql= "SELECT * FROM usuarios WHERE id='".$id."'"; 
$result=mysql_query($sql,$conex);
 $recorset=mysql_num_rows($result);
  if ($recorset!=0)
   {
    $res=mysql_fetch_array($result);
    $nome=$res['nome'];
	$apellidos=$res['apellidos'];
	$sexo=$res['sexo'];
	$telefono=$res['telefono'];
	$password=$res['password'];
	$pais=$res['pais'];
	$dia=$res['dia'];
	$mes=$res['mes'];
	$ao=$res['ao'];
	$cont=1;
	$datos=array("dato1"=>
	$nome,"dato3"=>$apellidos,"dato4"=>$sexo,"dato5"=>$telefono,"dato6"=>$password,"dato7"=>$pais,"dato8"=>$dia,"dato9"=>$mes,"dato10"=>$ao,"dato11"=>$cont);
	echo json_encode($datos);
	} else {
	$datos=array("dato10"=>"");
	echo json_encode($datos);
	}
	
		
?>
