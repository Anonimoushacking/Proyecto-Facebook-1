<style>
#cont_comen coment{float:left;}
#cont_comen::-webkit-scrollbar{width:3px;}
#cont_comen::-webkit-scrollbar-track{background-color:#ebebeb;width:3px; border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
#cont_comen::-webkit-scrollbar-thumb{background-color:#069;width:3px;}
#cont_comen::-webkit-scrollbar-thumb:hover{background-color:#069;}
</style>
<style>
.search-bubblepq {
    position: absolute;
    z-index: 1;
}
.search-bubble-innardspq {
    background: -webkit-linear-gradient(rgba(255, 248, 172, 0.9), rgba(255, 243, 128, 0.9));
    border-radius: 2px;
	text-align:center;
       width: 29px;
    height: 30px;
}

.search-bubble-innardspq::before {
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

</style>
<div class="search-bubblepq" style="left: 259px; top: 6px;"><div class="search-bubble-innardspq above"><span id="gale_fot<?php echo $_GET['id'];?>" class="icon-images"></span></div></div>
<div style="height:350px; max-height:350px; overflow:auto; border:1px solid #ccc;" id="cont_comen">
<?php
 session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();

$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` != ?");
$pegaUsuarios->execute(array($_GET['id']));
while($row = $pegaUsuarios->fetch()){
$apellidos = $row['apellidos'];
$foto = $row['foto'];
$nome = $row['nome'];
$sexo = $row['sexo'];
$id = $row['id'];
?>

<div class="display_box" id="coment" align="left" style="cursor:pointer; border-bottom:1px solid #ccc;">
<div style="float:left; margin-right:6px;">
<?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" width="40"  height="40" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" width="40"  height="40" />
 <?php }?>
<?php }else{ ?>
<img src="fotos/<?php echo $foto;?>" class="foto" width="40"  height="40" />         
 <?php }?>
            </div> <!--Colocamos la foto Recuperada de la bd -->
<div style="margin-center:5px; width:220px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:15px;text-transform:capitalize;"><?php echo utf8_encode($nome.' '.$apellidos); ?></div><!--Recuperamos el nombre recuperado de la bd -->
<div style="margin-center:6px; font-size:12px;margin-top:-5px;"><?php echo utf8_encode('Hola como estas $nome'); ?></div>
</div> <!--Recuperamos la direccion recuperada de la bd -->
</a>
<?php }?>
</div>
  <div class="input-group" style="position: absolute;left:0px;height:auto; background-color:#ebebeb;padding: 5px; top: 360px;border: 1px solid #ccc;width: 300px;">
<table width="200">
  <tr>
    <td></td>
    <td><div class="input-group">
    <span class="input-group-addon" id="basic-addon2" style="border-radius:0px;padding:0px;"><img src="fotos/keyner.jpg" style="width:25px; height:25px; border-radius:0%;"/></span>
  <input type="text" class="form-control" placeholder="Comentar" style="width:262px; height:28px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
</div></td>
  </tr>
</table>
</div>