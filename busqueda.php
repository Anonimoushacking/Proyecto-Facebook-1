<?php
$conex=mysql_connect ("localhost","root","")
or die ("No se pudo conectar con el servidor");

mysql_select_db ("videoaula",$conex)
or die ("No se pudo conectar con la BD");
?>

<?php
if(!isset($_POST['clave'])){

$q=utf8_encode($_POST['palabra']); //se recibe la cadena que queremos buscar
}else{
	$q='';
}
$sql_res=mysql_query("select * from usuarios where (nome like '%$q%') OR (apellidos like '%$q%')");
$recorset=mysql_num_rows($sql_res);
 if($recorset!=''){
while($row=mysql_fetch_array($sql_res)){
$foto =$row['foto'];
$id=$row['id'];
$nome=$row['nome'];
$apellidos=$row['apellidos'];
$sexo=$row['sexo'];
$pais=$row['pais'];
?>
<script>
 $(document).ready(function() {
 $('#<?php echo $id;?>').click(function(){
	 $('#display').hide();
	  $('.search-bubblev').fadeIn();
	$('#cont').load('user.php?id=<?php echo $id;?>',function(){
$('.busca').val('');
$('.search-bubblev').fadeOut();
	  });
});
});
</script>
<a href="javascript:void(0);" id="<?php echo $id;?>" style="text-decoration:none;" > <!--Recuperamos el id para pasarlo a otra pagina -->
<div class="display_box" align="left">
<div style="float:left; margin-right:6px;">
<?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg"  class="imgSmall" width="40" style="padding: 3px 3px 3px; margin-top: -2px;"  height="40" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg"  class="imgSmall" width="40"   style="padding: 3px 3px 3px; margin-top: -2px;" height="40" />
 <?php }?>
<?php }else{ ?>
 <img src="fotos/<?php echo $foto;?>" class="imgSmall" width="40"  style="padding: 3px 3px 3px; margin-top: -2px;" height="40" />           
 <?php }?>
            </div> <!--Colocamos la foto Recuperada de la bd -->
<div style="margin-center:5px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;text-transform:capitalize;"><?php echo utf8_encode($nome.' '.$apellidos); ?></div> <!--Recuperamos el nombre recuperado de la bd -->
<div style="margin-center:6px; font-size:14px;margin-top:-5px;"><?php echo utf8_encode($pais); ?></div>
</div> <!--Recuperamos la direccion recuperada de la bd -->
</a>
<div id="ray" style="border-bottom: 1px solid #dddfe2;font-size: 1px;    font-family: inherit; margin:0px; padding:0px; display: block;"></div>
<?php
}
?>
<?php }else{?>
	<div class="display_box" align="left"><div style="float:left; margin-right:6px;">No se encontro ningun amigo</div></div>
<?php }?>

