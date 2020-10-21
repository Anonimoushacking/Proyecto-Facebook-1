<?php
	session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn(); ?>
	<style>
#cont_album img{float:left;}
#cont_album::-webkit-scrollbar{width:0px;}
#cont_album::-webkit-scrollbar-track{background-color:#ebebeb;width:3px; border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
#cont_album::-webkit-scrollbar-thumb{background-color:#069;width:3px;}
#cont_album::-webkit-scrollbar-thumb:hover{background-color:#069;}

 .floated-chat-btn{z-index:9999;position:fixed;bottom:40px;right:545px;background:#08589a;-webkit-box-shadow:0 2px 20px 0 rgba(46,130,255,0.75);box-shadow:0 2px 20px 0 rgba(46,130,255,0.75);border-radius:75px;color:#fff;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding:5px 18px;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;vertical-align:middle;font-size:1.08rem;cursor:pointer;-webkit-transition:all 0.2s ease;transition:all 0.2s ease}

 .floated-chat-btn span{vertical-align:middle;display:inline-block;font-weight:500;}

 .floated-chat-btn i+span{margin-left:10px;}
 .floated-chat-btn:hover{-webkit-transform:scale(1.05);transform:scale(1.05);background-color:#08589a;-webkit-box-shadow:0 2px 30px 0 rgba(46,130,255,0.8);box-shadow:0 2px 30px 0 rgba(46,130,255,0.8)}
</style>
<div id="cont_album" style="background:#fff;height:600px;border:1px solid #ccc;width:602px;overflow:auto; padding:5px; position: absolute;top: 4px;border-radius: 5px;">
<div class="floated-chat-btn" id="add_images" onclick="EventoAlert()">
						<i class="icon-images">
					</i>
					<span>Agregar</span>
					</div>
<?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` != ?");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$idd = $row['id'];
	 ?>
<div class="file-preview-frame file-preview-initial" id="preview-1041555143924-init_0" data-fileindex="init_0">
<?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="fotos/hombre.jpg"  height="100px"  width="165px" class="file-preview-image">
<?php }else if($sexo=='Mujer'){ ?>
<img src="fotos/mujer.jpg"  height="100px"  width="165px" class="file-preview-image">
 <?php }?>
<?php }else{ ?>
<img src="fotos/<?php echo $foto; ?>"  height="100px"  width="165px" class="file-preview-image">        
 <?php } ?>
   <div class="file-thumbnail-footer">
    <div class="file-caption-name"><?php echo $foto; ?></div>
    <div class="file-actions">
    <div class="file-upload-indicator" tabindex="-1" title=""></div>
    <div class="clearfix"></div>
</div>
</div>
</div>
<?php }?> 

    
<input type="button" id="bt" value="Prueba Alert" onclick="EventoAlert()"/>
    <script>
   $(document).ready(function(){
  $('#add_images').click(function(){
	$('#span').load('file.php');
});
});
        
		function EventoAlert(){
		swal({
  title: '<div id="tit">Subir Fotos</div>',
  text: "<span style='color:#F8BB86;' id='span'><img src='fotos/thaliana.jpg' height='430px' width='430px'><span>",
  html: true
});
		}
    </script>
</div>