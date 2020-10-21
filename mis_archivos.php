<?php
	session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();
$conex=mysql_connect ("localhost","root","") or die ("servidor");

mysql_select_db ("videoaula",$conex) or die ("BD");
?>
<script>
$(document).ready(function() {
$('#pop2').click(function() {
	 $('.search-bubblez').toggle();
 })  
	$('.cont_arch').load('archivos.php');
});
</script>
<div style="background-color:#FFF; padding:15px; border-radius:5px; width:602px; height:auto; position:absolute;top:5px; border:1px solid #ccc;">
<span style="float:left;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Mis Archivos</span>
<br>
<div style="float:right;margin-top:-25px; position:relative; width:20px; border:0px solid #ccc;"><a href="#" id="pop2"><b>...</b></a>
</div>

<style>
.search-bubblez {
    left: 0;
    position: absolute;
    top: -1000px;
    z-index: 1;
}
.search-bubble-innardsz {
    background: -webkit-linear-gradient(rgba(255, 248, 172, 255), rgba(255, 243, 128, 255));
    border-radius: 2px;
    padding: 4px 10px;
    text-align: left;
    width: 150px;
}

.search-bubble-innardsz::before {
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
.search-bubble-innardsz::after {
    background: -webkit-linear-gradient(-45deg, rgb(251, 255, 181), rgb(255, 248, 255) 50%, rgba(255, 248, 172, 255));
    border: 1px solid rgb(220, 198, 72);
    border-bottom-color: transparent;
    border-right-color: transparent;
    content: '';
    height: 12px;
    left: 124px;
    position: absolute;
    top: -7px;
    transform: rotate(45deg);
    width: 12px;
    z-index: -1;
}
</style>
<div class="search-bubblez" style="display:none;left: 442px; top: 44px;">
<div class="search-bubble-innardsz">
<a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Subir Archivo</a>
<a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Archivo Recibidos</a>
<a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Archivo Enviados</a>
<a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;" id="elm_arc">Eliminar Archivo</a>
<a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; display:none;" id="elm">Cancelar</a>
</div>
</div>
<style>
.disk:hover{
	background-color:rgba(91, 192, 222, 0.12);
	}
	.disk{
	background-color:#ebebeb;
	}
</style>
<div class="cont_arch"></div>
<script src="script.js"></script>
 <style>
	.mensage{
		border:dashed 1px red;
		background-color:#ffc6c7;
	dysplay:none;
	padding:10px;
	text-align:left;
	width:500px;
	margin:10px auto;
	}

 </style>
 <h1>subir archivos</h1>
 <div class="mensage"></div>
 <table>
 <tr>
 <input type="file" multiple="multiple" id="archivos" />
</tr>
<tr>
 <input type="button"  id="enviar"  value="enviar archivos"/>
</tr>
</table>

