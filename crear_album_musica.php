<table width="580px" border="0">
 <tr>
    <td colspan="2" align="center">Crear Album De Musicas</td>
    </tr>
  <tr>
    <td height="41">Nombre Del Album</td>
  </tr>
  <tr>
  <td><form><input type="text" id="nombre_album" style="border-radius:0px;" class="form-control"></td>
  </tr>
  <tr>
    <td>Descripcion</td>
    </tr>
    <tr>
    <td><textarea name="" id="descripcion" cols="70" rows="2"></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" id="crear_album_music" value="Crear Album" class="btn  btn-primary" style="padding:6px 8px; width:auto;"></form></td>
  </tr>
</table>
<script>
$(document).ready(function(e) {
    $('#crear_album_music').click(function(){
		var nombre_album=$('#nombre_album').val();
			var propietario=<?php echo $_GET['session'];?>;
		var descripcion=$('#descripcion').val();
		if($.trim(nombre_album).length > 0 && $.trim(descripcion).length > 0 && $.trim(propietario).length > 0){
		$.post('insert_album_music.php',{nombre_album:nombre_album, descripcion:descripcion, propietario:propietario}, function(){
			var nombre_album=$('#nombre_album').val('');
			var descripcion=$('#descripcion').val('');
			alert('El album sea creado exitosamente....');
			
		});
		}else{
		alert('error... ');	
		}
	})
});
</script>