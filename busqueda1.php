<?php
$conex=mysql_connect ("localhost","root","")
or die ("No se pudo conectar con el servidor");

mysql_select_db ("videoaula",$conex)
or die ("No se pudo conectar con la BD");
?>
<?php
if(!isset($_POST['clave'])){
	$session=$_GET['session'];
$_SESSION['id_user']=$session;
$q=utf8_encode($_POST['palabra']); //se recibe la cadena que queremos buscar
}else{
	$q='';
}
?><ul>
			<?php $sql_res=mysql_query("select * from usuarios where (nome like '%$q%') OR (apellidos like '%$q%')");
			$recorset=mysql_num_rows($sql_res);
			if($recorset!=''){
               while($row=mysql_fetch_array($sql_res)){
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$blocks = explode(',', $row['blocks']);
					$agora = date('Y-m-d H:i:s');
					if(!in_array($_SESSION['id_user'], $blocks)){
						$status = 'on';
						if($agora >= $row['limite']){
							$status = 'off';
						}
			?><script>
<?php $n=$row['nome'].' '.$row['apellidos'];?>
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
				<li id="<?php echo $row['id'];?>">
					<div class="imgSmall"><?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" width="60"  height="60" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" width="60"  height="60" />
 <?php }?>
<?php }else{ ?>
 <img src="fotos/<?php echo $foto;?>" class="foto" width="60"  height="60" />           
 <?php }?></div>
					<a href="javascript:void(<?php echo $row['id'];?>);" id="<?php echo $_SESSION['id_user'].':'.$row['id'];?>" class="comecar"></a>
					<span id="<?php echo $row['id'];?>" class="status <?php echo $status;?>"></span>
				</li>
                
			<?php }}?>
			</ul>

<?php }else{ ?>
No se encontro ningun amigo
<?php }?>
