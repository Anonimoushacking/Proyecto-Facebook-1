<?php
session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();
?>
    <ul>
		<?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` != ?");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$blocks = explode(',', $row['blocks']);
					$agora = date('Y-m-d H:i:s');
					if(!in_array($_SESSION['id_user'], $blocks)){
						$status = 'on';
						if($agora >= $row['limite']){
							$status = 'off';
						}
			?>
				<li id="<?php echo $row['id'];?>">
					<div class="imgSmall"><?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" width="60"  height="60" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" width="60"  height="60" />
 <?php }?>
<?php }else{ ?>
 <img src="fotos/<?php echo $foto;?>" class="foto" width="60"  height="60" />           
 <?php }?></div><script>
<?php $n=utf8_encode($row['nome'].' '.$row['apellidos']);?>
$(document).ready(function() { 
		var a='<?php echo $n;?>';
var id=a.slice(0,13);
if(a.length<14){
aa = document.getElementById('<?php echo $_SESSION['id_user'].':'.$row['id'];?>');
aa.textContent = id;
}else{
	aa = document.getElementById('<?php echo $_SESSION['id_user'].':'.$row['id'];?>');
aa.textContent = id+'...';
}
});

</script>
					<a href="javascript:void(<?php echo $row['id'];?>);" id="<?php echo $_SESSION['id_user'].':'.$row['id'];?>" class="comecar"></a>
					<span id="<?php echo $row['id'];?>" class="status <?php echo $status;?>"></span>
				</li>
                
			<?php }}?>
			</ul>