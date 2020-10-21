
<script>
var id=<?php echo $_GET['id'];?>;
$.get("datos_user.php",{id:id}, function(result){
var json=$.parseJSON(result);
var cont=json.dato11;
if (cont){
$("#dat1").val(json.dato1);
$("#dat3").val(json.dato3);
$("#dat4").val(json.dato4);
$("#dat5").val(json.dato5);
$("#dat6").val(json.dato6);
$("#dat7").val(json.dato7);
$("#dat8").val(json.dato8);
$("#dat9").val(json.dato9);
$("#dat10").val(json.dato10);
}
});
							
</script><script type="text/javascript" src="js/jquery.js"></script>
<script>
$(document).ready(function() {
$('#actualizar').click(function() {
	var dat1=$("#dat1").val();
	var dat3=$("#dat3").val();
	var dat4=$("#dat4").val();
	var dat5=$("#dat5").val();
	var dat6=$("#dat6").val();
	var dat7=$("#dat7").val();
	var dat8=$("#dat8").val();
	var dat9=$("#dat9").val();
	var dat10=$("#dat10").val();
	var idd=<?php echo $_GET['id'];?>;
    $('#act').load('actualizar.php',{idd:idd,dat1:dat1,dat3:dat3,dat4:dat4,dat5:dat5,dat6:dat6,dat7:dat7});
});
});
</script>
<style>
.ttd{
padding:3px;	
}
.sp{
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:15px;
	font-weight:200;
	color:#0275d8;
}
</style>
<body>
<div id="cont-act" style="padding:7px; border-radius:5px; position:absolute; top:5px; margin-right:5px; border:1px solid #ccc; background-color:#FFF;">
<div style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:28px; text-align:center;">Actualizar Datos </div>
<table width="200"  border="0">
 <tr>
    <td class="ttd"><span class="sp">Nombre:</span></td>
    <td class="ttd"><span class="sp">Apellidos:</span></td>
    <td class="ttd"><span class="sp">Sexo:</span></td>
  </tr>
  <tr>
    <td class="ttd"><input type="text" id="dat1" style="width:190px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:15px;font-weight:100;"  class="form-control"/></td>
    <td class="ttd"><input type="text" id="dat3" style="width:190px;"   class="form-control"/></td>
    <td class="ttd"><input type="text" id="dat4"  style="width:190px;" class="form-control">
                      </td>
  </tr>
   <tr>
    <td class="ttd"><span class="sp">Telefono:</span></td>
    <td class="ttd"><span class="sp">Contrase&ntilde;a:</span></td>
    <td class="ttd"><span class="sp">Pais:</span></td>
  </tr>
  <tr>
    <td class="ttd"><input type="text" id="dat5"  class="form-control"/></td>
    <td class="ttd"><input type="text" id="dat6"  class="form-control"/></td>
    <td class="ttd"><input type="text" id="dat7"  class="form-control"/></td>
  </tr>
  <tr>
    <td colspan="3" class="ttd"><center><span class="sp">Fecha De Nacimiento</span></center></td>
  </tr>
   <tr>
    <td class="ttd"><span class="sp">Dia:</span></td>
    <td class="ttd"><span class="sp">Mes:</span></td>
    <td class="ttd"><span class="sp">Año:</span></td>
  </tr>
  <tr>
    <td class="ttd"><input type="text" id="dat8"  class="form-control"></td>
    <td class="ttd"><input type="text" id="dat9"  class="form-control"/></td>
    <td class="ttd"><input type="text" id="dat10"  class="form-control"/></td>
  </tr>
  <tr>
    <td colspan="3" class="ttd"><input type="button" class="btn btn-primary" style="padding:6px 6px; width:580px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; cursor:pointer;" value="Actualizar datos" id="actualizar"></td>
  </tr>
  <tr>
    <td colspan="3" class="ttd"><div id="act"></div></td>
  </tr>
</table>
</div>

<div class="container">
<button data-target="#ventana" class="btn btn danger" data-toggle="modal">boton 1</button>
<div class="modal fade" id="ventana">
<div class="modal-dialog" >
<div class="modal-content">
<div class="modal-header">
<h2 class="modal-title">ewre rewrwerwer  ewrwe wer wewe wer</h2>
<div class="modal-body">dfgdf gdfdf df df gdf gf fd df fg dfgf dffd df df fdg df dfgdf</div>
</div>
</div>
</div>
</div>
</div>