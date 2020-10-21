<?php
	session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();
		$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` = ?");
				$pegaUsuarios->execute(array($_GET['session']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$nome = $row['nome'];
					$blocks = explode(',', $row['blocks']);
					$agora = date('Y-m-d H:i:s');
					if(!in_array($_SESSION['id_user'], $blocks)){
						$status = 'on';
						if($agora >= $row['limite']){
							$status = 'off';
						}
					}}
			?>
            <style>
.search-bubble-innards::before {
    border: 1px solid rgb(220, 198, 72);
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}.search-bubble-innards::after {
    background: -webkit-linear-gradient(-45deg, rgb(251, 255, 181), rgb(255, 248, 172) 50%, rgba(255, 248, 172, 0));
    border: 1px solid rgb(220, 198, 72);
    border-bottom-color: transparent;
    border-right-color: transparent;
    content: '';
    height: 12px;
    left: 75px;
    position: absolute;
    top: -7px;
    transform: rotate(45deg);
    width: 12px;
    z-index: -1;
}
.search-bubble {

    position: absolute;
    z-index: 1;
}
.search-bubble-innards {
    background: -webkit-linear-gradient(rgba(255, 248, 172, 0.9), rgba(255, 243, 128, 0.9));
    border-radius: 2px;
    padding: 4px 10px;
    text-align: center;
    width: 100px;
	height:50px;
}

div {
    display: block;
}

</style>
<style>
.search-bubblexz {
    position: absolute;
    z-index: 1;
}.search-bubble-innardsxz {
    background: -webkit-linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0));
    border-radius: 2px;
    text-align: center;
    width: 100px;
}.search-bubble-innardsxz::before {
    border: 1px solid #ccc;
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}
.search-bubblexc {
    position: absolute;
    z-index: 1;
}.search-bubble-innardsxc{
    background: -webkit-linear-gradient(rgba(255, 248, 172, 0.9), rgba(255, 243, 100, 0.9));
    border-radius: 2px;
    text-align: center;
    width: 100px;
	padding:3px;
	 border-top-left-radius: 100px;
    border-top-right-radius: 15px;
}
.search-bubble-innardsxc::before {
    border: 0px solid #ccc;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
	
}
.search-bubblexv {
    position: absolute;
    z-index: 1;
}.search-bubble-innardsxv{
	  border-radius: 2px;
    background: -webkit-linear-gradient(rgba(255, 248, 172, 0.9), rgba(255, 243, 100, 0.9));
    text-align: center;
    width: 100px;
	padding:3px;
	 border-top-right-radius: 100px;
 
}
.search-bubble-innardsxv::before {
    border: 0px solid #ccc;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
	
}
.search-bubblevv {
    position: absolute;
    z-index: 1;
}.search-bubble-innardsvv{
	  border-radius: 2px;
    background: -webkit-linear-gradient(rgba(255, 255, 255, 255), rgba(255, 255, 255, 255));
    text-align: center;
    width: 100px;
	padding:3px;
 }
.search-bubble-innardsvv::before {
    border: 0px solid #ccc;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
	
}
.search-bubblexm {
    position: absolute;
    z-index: 1;
}.search-bubble-innardsxm{
    background: -webkit-linear-gradient(rgba(255, 248, 172, 0.9), rgba(255, 243, 100, 0.9));
    text-align: center;
    width: 100px;
	padding:3px;
	 border-top-left-radius: 100px;
    border-top-right-radius: 15px;
 
}
.search-bubble-innardsxm::before {
    border: 0px solid #ccc;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
	
}
.contain_user img{}
.contain_user::-webkit-scrollbar{width:4px; height:5px;}
.contain_user::-webkit-scrollbar-track{background-color:#ebebeb;width:3px; border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
.contain_user::-webkit-scrollbar-thumb{background-color:#09C;width:3px;}
.contain_user::-webkit-scrollbar-thumb:hover{background-color:#4267B2;}

.search-bubble-innardsqx {
    background: -webkit-linear-gradient(rgba(255, 248, 172, 0.9), rgba(255, 243, 128, 0.9));
    border-radius: 2px;
    padding: 4px 10px;
    text-align: left;
    width: 170px;
}
.search-bubble-innardsqx::before {
    border: 1px solid rgb(220, 198, 72);
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}
.search-bubble-innardsqx::after {
    background: -webkit-linear-gradient(-45deg, rgb(251, 255, 181), rgb(255, 248, 172) 50%, rgba(255, 248, 172, 0));
    border: 1px solid rgb(220, 198, 72);
    border-bottom-color: transparent;
    border-right-color: transparent;
    content: '';
    height: 12px;
    left: 140px;
    position: absolute;
    top: -7px;
    transform: rotate(45deg);
    width: 12px;
    z-index: -1;
}.search-bubbleqx {
    position: absolute;
    z-index: 1;
}

.search-bubble-innardsqm {
    background: -webkit-linear-gradient(rgba(255, 248, 172, 0.9), rgba(255, 243, 128, 0.9));
    border-radius: 2px;
    padding: 4px 10px;
    text-align: left;
    width: 180px;
}
.search-bubble-innardsqm::before {
    border: 1px solid rgb(220, 198, 72);
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}
.search-bubble-innardsqm::after {
    background: -webkit-linear-gradient(-45deg, rgb(251, 255, 181), rgb(255, 248, 172) 50%, rgba(255, 248, 172, 0));
    border: 1px solid rgb(220, 198, 72);
    border-bottom-color: transparent;
    border-right-color: transparent;
    content: '';
    height: 12px;
    left: 149px;
    position: absolute;
    top: -7px;
    transform: rotate(45deg);
    width: 12px;
    z-index: -1;
}.search-bubbleqm {
    position: absolute;
    z-index: 1;
}
</style>
                    <div style="background:#FFF; border-radius:1px; height:300px; overflow:hidden; width:602px; border:1px solid #ccc; text-transform:capitalize;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin-top:7px;">
<div class="search-bubblevv" style="left:2px; top: 10px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><div class="search-bubble-innardsvv above" style="width:auto;  height:25px;"><span class="icon-music" style="color:#000;"></span> Musicas </div></div>
<img src="material/musica.jpg" class="foto" style="height:405px;width:602px; margin-top:-55px;" />
 </div> <div class="search-bubblexc" style="left: 450px; top: 280px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><div class="search-bubble-innardsxc above" style="width:150px;  height:25px;"><a href="javascript:void(0);">Eliminar Album</a> <span class="icon-bin" style="color:#000;"></span></div></div>
 <div class="search-bubblexv" style="left:2px; top: 280px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><div class="search-bubble-innardsxv above" style="width:auto;  height:25px;"><span class="icon-headphones" style="color:#000;"></span> <a href="javascript:void(0);" id="crear_album_musica"> Crear Album</a></div></div>
 <div class="search-bubblexz" style="left: 220px; top: 240px;" ><div class="search-bubble-innardsxz above" style="width:170px;  height:160px;">
       <?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" style="width: 170px;height: 160px;border: 3px solid rgba(204, 204, 204, 0.35);" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" style="width: 170px;height: 160px;border: 3px solid rgba(204, 204, 204, 0.35);"/>
 <?php }?>
<?php }else{ ?>
 <img src="fotos/<?php echo $foto;?>" class="foto" style="width: 170px;height: 160px;border: 3px solid rgba(204, 204, 204, 0.35);"/>           
 <?php }?> 
 <div class="search-bubblexm" style="left:68px; top: 134px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><div class="search-bubble-innardsxm above" style="width:100px;  height:25px;"><a href="javascript:void(0);">Opciones</a> <span class="icon-camera" style="color:#000;"></span></div></div>       
 </div>
 </div>
 <div style="background:#FFF; height:50px; padding:12px; width:220px; top:305px; border:1px solid #ccc;border-top-left-radius:5px; position:absolute; border-bottom-left-radius:5px;text-transform:capitalize;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:16px; margin-top:7px;">
<table width="218">
  <tr>
    <th scope="col"><a href="javascript:void(0);"><span class="icon-accessibility"></span> Saludar</a></th> <th scope="col"><a href="javascript:void(0);" id="estado_amistad"><span class="icon-user-check"></span> Amigo(a)</a></th>
  </tr>
</table>
<div class="search-bubbleqx" style="left: 5px;top: 45px;display:none;"><div class="search-bubble-innardsqx">
<a href="javascript:void(0);"><span class="icon-user-minus"></span> Dejar De Seguir</a>
<a href="javascript:void(0);"><span class="icon-user-plus"></span> Enviar Solicitud</a>
<a href="javascript:void(0);"><span class="icon-user-plus"></span> Bloquear</a>
</div></div>
 </div>
  <div style="background:#FFF; height:50px; padding:12px; left:390px; border-bottom-right-radius:5px;border-top-right-radius:5px; width:212px; top:305px; border:1px solid #ccc; color:#000; position:absolute; text-transform:capitalize;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:16px;margin-top:7px;">
<table width="200">
  <tr>
    <th scope="col"><a href="javascript:void(0);" id="info"><span class="icon-address-book"></span> Informacion</a></th> <th scope="col"><div style="margin-top:-10px; margin-left: 35px;"><a href="javascript:void(0);" id="op_user"><b style="color:#0275d8;font-weight: 500;width: 15px;font-family: cursive;font-size: 24px;">...</b></a></div></th>
  </tr>
</table>
<div class="search-bubbleqm" style="left: 36px;top: 45px;display:none;"><div class="search-bubble-innardsqm" >
<a href="javascript:void(<?php echo $_GET['id'];?>);"><span class="icon-user-minus"></span> Enviar Un Mensaje</a><br />
<a href="javascript:void(0);"><span class="icon-user-plus"></span> Enviar Solicitud</a><br />
<a href="javascript:void(0);"><span class="icon-user-plus"></span> Bloquear</a>
</div></div>
</div>
<script>
$(document).ready(function(e) {
    $('#crear_album_musica').click(function(e) {
       $('#contain').load('crear_album_musica.php?session=<?php echo $_GET['session'];?>'); 
    });
});
</script>
<div id="contain" style="background:#FFF; border-radius:5px; margin-right:10px; height:250px; padding:10px; border:1px solid #ccc; border-top:6px solid #069;text-transform:capitalize;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin-top:81px;">
<a href="javascript:void(0);" style="float:right;margin-right:5px;"><b>...</a>
Bienvenido(a): <?php echo $nome; ?> a All/Music           
               <link rel="stylesheet" type="text/css" href="css/fileinput.min.css"/><script type="text/javascript" src="js/fileinput.min.js"></script>
	<input id="archivos" name="imagenes[]" type="file" multiple=true class="file-loading">
	<?php 	
	$directory = "imagenes_/";      
	$images = glob($directory . "*.*");
	?>
	
	<script>
	$("#archivos").fileinput({
	uploadUrl: "upload.php", 
    uploadAsync: false,
    minFileCount: 1,
    maxFileCount: 20,
	showUpload: false, 
	showRemove: false,
	initialPreview: [
	<?php foreach($images as $image){?>
		"<img src='<?php echo $image; ?>' height='120px' class='file-preview-image'>",
	<?php } ?>],
    initialPreviewConfig: [<?php foreach($images as $image){ $infoImagenes=explode("/",$image);?>
	{caption: "<?php echo $infoImagenes[1];?>",  height: "120px", url: "borrar.php", key:"<?php echo $infoImagenes[1];?>"},
	<?php } ?>]
	}).on("filebatchselected", function(event, files) {
	
	$("#archivos").fileinput("upload");
	
	});
	
	</script>
               
                    
</div>
       <?php
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();
		$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` = ?");
				$pegaUsuarios->execute(array($_GET['session']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$nome = $row['nome'];
					$blocks = explode(',', $row['blocks']);
					$agora = date('Y-m-d H:i:s');
					if(!in_array($_SESSION['id_user'], $blocks)){
						$status = 'on';
						if($agora >= $row['limite']){
							$status = 'off';
						}
					}}
			?>	
<div style="background:#FFF; border-radius:5px; margin-right:10px; height:40%; padding:10px; border:1px solid #ccc; text-transform:capitalize;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin-top:7px;">
<a href="javascript:void(0);" style="float:right;margin-right:5px;"><b>...</a>
<?php
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();
		$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `albumnes` WHERE `propietario` = ?");
				$pegaUsuarios->execute(array($_GET['session']));
				echo '<table>';
				while($row = $pegaUsuarios->fetch()){?>
					<tr><td><a href="javascript:void(0);" id="<?php echo $row['id'];?>"><?php echo $row['nombre'];?></a></td>
					</tr>
				<?php	}?>	</table>      
                    
                    
                    
</div>	
<div style="background:#FFF; border-radius:5px; margin-right:10px; height:40%; padding:10px; border:1px solid #ccc; text-transform:capitalize;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin-top:7px;">
<a href="javascript:void(0);" style="float:right;margin-right:5px;"><b>...</a>
     
                    
    
      <style>
  .search-bubble-innardsxb {
    background: -webkit-linear-gradient(rgba(255, 248, 172, 0.9), rgba(255, 243, 128, 0.9));
    border-radius: 2px;
    padding: 4px 10px;
    text-align: center;
    width:50px;
}

.search-bubble-innardsxb::before {
    border: 1px solid rgb(220, 198, 72);
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}
.search-bubblexb {
    position: absolute;
    z-index: 1;
}

</style>
<div class="search-bubblexb" style="left: 0;top: 91px;"><div class="search-bubble-innardsxb">w</div></div> <button onclick="Alert.render('Ingresa tu nombre.')">Custom Alert</button>               
                    
</div>	
<div style="background:#FFF; border-radius:5px; margin-right:10px; height:40%; padding:10px; border:1px solid #ccc; text-transform:capitalize;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin-top:7px;">
<a href="javascript:void(0);" style="float:right;margin-right:5px;"><b>...</a>
Bienvenido(a): <?php echo $nome; ?>  a All/Music           
                    
              
                    
</div>	