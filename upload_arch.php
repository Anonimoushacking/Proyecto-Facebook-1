<?php 
$carpetaAdjunta="imagenes_/";
// Contar envían por el plugin
$Imagenes =count(isset($_FILES['imagenes']['name'])?$_FILES['imagenes']['name']:0);
$infoImagenesSubidas = array();
for($i = 0; $i < $Imagenes; $i++) {

	// El nombre y nombre temporal del archivo que vamos para adjuntar
	$nombreArchivo=isset($_FILES['imagenes']['name'][$i])?$_FILES['imagenes']['name'][$i]:null;
	$nombreTemporal=isset($_FILES['imagenes']['tmp_name'][$i])?$_FILES['imagenes']['tmp_name'][$i]:null;
	
	$rutaArchivo=$carpetaAdjunta.$nombreArchivo;
	
	move_uploaded_file($nombreTemporal,$rutaArchivo);
	
	$infoImagenesSubidas[$i]=array("caption"=>"$nombreArchivo","height"=>"160px","url"=>"borrar.php","key"=>$nombreArchivo);
	$ImagenSubidas[$i]="<img  height='160px' width='160px'  src='$rutaArchivo' class='file-preview-image'>";
	$VideosSubidas[$i]="<video style='width:160px;height:160px;' src='$rutaArchivo' class='file-preview-image' controls='controls'>";
	$AudiosSubidas[$i]="<audio  height='160px' width='160px' src='$rutaArchivo' class='file-preview-image' controls='controls'>";
	$ImagenesSubidas=$ImagenSubidas[$i]+$VideosSubidas[$i]+$AudiosSubidas[$i];

	}

$arr = array("file_id"=>0,"overwriteInitial"=>true,"initialPreviewConfig"=>$infoImagenesSubidas,
			 "initialPreview"=>$ImagenesSubidas);
echo json_encode($arr);
?>


