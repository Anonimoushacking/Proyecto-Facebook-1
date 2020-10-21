<?php
	session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();
$conex=mysql_connect ("localhost","root","") or die ("servidor");

mysql_select_db ("videoaula",$conex) or die ("BD");
?>
<style>
#arch, #img_arc, video, audio{
float:left;
padding:3px;
width:139.3px;
height:130px;
}
#arch{
width:570px;
height:auto;
border:1px solid #ccc;
}
</style>
<div id="arch">
<span class="icon-files-empty" onclick="EventoAlert_upload_arch();" id="upload_arch"></span>
 <script>
   $(document).ready(function(){
  $('#upload_arch').click(function(){
	$('#span_upload').load('misarchivos.php');
});
});
        
		function EventoAlert_upload_arch(){
		swal({
  title: '<div id="tit">Subir Archivos</div>',
  text: "<span style='color:#F8BB86;' id='span_upload'><img src='fotos/thaliana.jpg' height='430px' width='430px'><span>",
  html: true
});
		}
    </script>
<div class="disk" style="border:1px solid #ccc;padding:10px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
<table width="300">
<tr>
    <td colspan="3">Espacio Gratis</td>
  </tr><?php
				$pegaUsuarios = BD::conn()->prepare("SELECT SUM(tam) AS tam FROM `archivos` WHERE `id_user` = ?");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$tam = $row['tam'];
				}
			?>
 <?php function bytes2English($filesize)
  {
  if ($filesize<1048676)
  RETURN number_format($filesize/1024,1) . " KB";
  if ($filesize>=1048576 && $filesize<1073741824)
  RETURN number_format($filesize/1048576,1) . " MB";
  if ($filesize>=1073741824 && $filesize<1099511627776)
  RETURN number_format($filesize/1073741824,2) . " GB";
  if ($filesize>=1099511627776)
  RETURN number_format($filesize/1099511627776,2) . " TB";
  if ($filesize>=1125899906842624) //Currently, PB won't show due to PHP limitations
  RETURN number_format($filesize/1125899906842624,3) . " PB";
  }?>
  <tr><td><?php echo bytes2English($tam),' Ocupado  De 15 GB'?></td>
  </tr>
</table>
</div>
<?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `archivos` WHERE `id_user` = ?");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$archivo = $row['archivo']
             ?>
             
            <?php if(end(explode(".", $archivo))=="jpg" || end(explode(".", $archivo))=="png" || end(explode(".", $archivo))=="gif"){?>
<img src='Files/<?php echo $archivo; ?>' id="img_arc" style="border:1px solid #999;">
    <?php }else if(end(explode(".", $archivo))=="mp3"){?>
<audio src="Files/<?php echo $archivo; ?>"  id="audio" style="width:140px;border:1px solid #999;" controls="controls"></audio>
  <?php }else if(end(explode(".", $archivo))=="mp4"  || end(explode(".", $archivo))=="3gp"){?>
<video src="Files/<?php echo $archivo; ?>" id="<?php echo $archivo;?>" style="border:1px solid #999;" controls="controls"></video>
 <?php } ?>
				<?php }?>
	
                </div>
                