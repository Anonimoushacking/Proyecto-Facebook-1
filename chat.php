<?php
	session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();

	if(!isset($_SESSION['email_logado'], $_SESSION['id_user'])){
		header("Location: index.php?session_destroy=1");
	}
	
	$pegaUser = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `email` = ?");
	$pegaUser->execute(array($_SESSION['email_logado']));
	$dadosUser = $pegaUser->fetch();

	if(isset($_GET['session_destroy']) && $_GET['session_destroy'] == 'salir'){
		unset($_SESSION['email_logado']);
		unset($_SESSION['id_user']);
		session_destroy();
		header("Location: index.php?session_destroy=1");
	}
?>
<!DOCTYPE HTML>
<html lang="pt-BR"><head>
		<meta charset=UTF-8>      
<title>Social Netword</title><script src="pace.min.js"></script>
<link rel="stylesheet" type="text/css" href="progress.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery_play.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="sweetalert.css">
<link rel="stylesheet" type="text/css" href="facebook.css">
<script src="sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/fileinput.min.css"/>
        		<style type="text/css">
				.fileinput-cancel-button{
					display:none;
					}
.opt_chat {
    position: absolute;
    padding:3px;
    top: 31px;
    background: #fff;
    border-bottom: 1px solid #999;
    border-left: 1px solid #999;
    border-right: 1px solid #999;
    height: 27px;
    width: 270px;
}
.opt_chat span{
margin:2px;	
cursor:pointer;
}
				.search-bubblec {

    position: absolute;
    z-index: 1;
}
.search-bubble-innardsc {
    background: #fff;
    border-radius: 2px;
    padding:3px;
    text-align: left;
    width: 150px;
}
.search-bubble-innardsc::before {
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
.search-bubble-innardsc.above::after {
    bottom: -7px;
    top: auto;
    transform: rotate(-135deg);
}
.search-bubble-innardsc::after {
    background:#fff;
    border: 1px solid #ccc;
    border-bottom-color: transparent;
    border-right-color: transparent;
    content: '';
    height: 12px;
    left: 109px;
    position: absolute;
    top: -7px;
    transform: rotate(45deg);
    width: 12px;
    z-index: -1;
}
        		
#display 
{
width:355px;
display:none;
overflow:hidden;
z-index:10;
top:38px;
border:1px solid #ccc;
margin-left:120px;

max-height:370px;
overflow:auto;
padding:0px;
}
                </style><style>
.search-bubble-innards::before {
    border: 1px solid #ccc;
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}.search-bubble-innards::after {
    background:linear-gradient(to bottom,#fff, #eceeef 150%);
    border: 1px solid #ccc;
    border-bottom-color: transparent;
    border-right-color: transparent;
    content: '';
    height: 12px;
    left: 145px;;
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
    background: linear-gradient(to bottom,#fff, #eceeef 150%);
    border-radius: 2px;
    padding: 4px 10px;
    text-align: left;
    width: 170px;
	height:auto;
}

div {
    display: block;
}

//otro
.search-bubble-innards1::before {
    border: 1px solid #fff;
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}.search-bubble-innards1::after {
    background:#fff;
    border: 1px solid #fff;
    border-bottom-color: transparent;
    border-right-color: transparent;
    content: '';
    height: 12px;
    left: 240px;
    position: absolute;
    top: -7px;
    transform: rotate(45deg);
    width: 12px;
    z-index: -1;
}
.search-bubble1 {
    border: 1px solid #ccc;
    position: absolute;
    z-index: 1;
	 border-radius: 2px;

}
.search-bubble-innards1 {
    background:#fff;
    border-radius: 2px;
    padding: 0px;
    text-align: center;
    width:300px;
	 height: 450px;
    max-height: 450px;
    overflow: auto;
    padding-bottom: 23px;
    padding-top: 23px;
}

div {
    display: block;
}
//otro
.search-bubble-innards2::before {
    border: 1px solid #fff;
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}.search-bubble-innards2::after {
    background:#fff;
    border: 1px solid #fff;
    border-bottom-color: transparent;
    border-right-color: transparent;
    content: '';
    height: 12px;
    left: 240px;
    position: absolute;
    top: -7px;
    transform: rotate(45deg);
    width: 12px;
    z-index: -1;
}
.search-bubble2 {
    border: 1px solid #ccc;
    position: absolute;
    z-index: 1;
	 border-radius: 2px;

}
.search-bubble-innards2 {
    background:#fff;
    border-radius: 2px;
    padding:0px;
    text-align: center;
    width:300px;
	 height: 450px;
    max-height: 450px;
    overflow: auto;
	padding-top: 23px;
	padding-bottom: 23px;
}

div {
    display: block;
}
//otro
.search-bubble-innards3::before {
    border: 1px solid #fff;
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}.search-bubble-innards3::after {
    background:#fff;
    border: 1px solid #fff;
    border-bottom-color: transparent;
    border-right-color: transparent;
    content: '';
    height: 12px;
    left: 225px;
    position: absolute;
    top: -7px;
    transform: rotate(45deg);
    width: 12px;
    z-index: -1;
}
.search-bubble3 {
    border: 1px solid #ccc;
    position: absolute;
    z-index: 1;
	 border-radius: 2px;

}
.search-bubble-innards3 {
    background: #fff;
    border-radius: 2px;
    padding:0px;
    text-align: center;
    width:300px;
	 height:450px;
    max-height: 450px;
    overflow: auto;
	padding-top: 23px;
	padding-bottom: 23px;
}

div {
    display: block;
}
                </style>
        		<script>

$(document).ready(function(){
$('#time').load('time/time.php');
refresh();
});
function EventoAlert_coment(){
		swal({
  title: '<div id="tit">Crear Publicacion</div>',
  text: "<span style='color:#F8BB86;' id='c_publ'><img src='fotos/thaliana.jpg' height='430px' width='430px'><span>",
  html: true
});
}
function refresh()
{
setTimeout( function(){
$('#time').load('time/time.php').fadeIn('slow');
refresh();
}, 1000);

}
                </script>
                <script>

$(document).ready(function(){
$('#jugar').click(function(){	
alert('normal');
});
$('#jugar1').click(function(){	
alert('1');
});
$('#jugar2').click(function(){	
alert('2');
});
$('#jugar3').click(function(){	
alert('3');
});
$('#ver_todas').click(function(){	
$('#cont').load('file.php');
});
$('#misfotos').click(function(){	
$('#cont').load('misfotos.php');
});
});
</script>
	</head>
	
    <body>
<style>
.display_box /*estilos para cada caja unitaria de cada usuario que se muestra*/
{
	background-color:#FFF;
padding-left:6px; 
font-size:18px;
height:44px;
text-decoration:none;
color:#3b5999; 
}
#p_q_c{
   position: fixed;
    height: 26px;
    z-index: 1;
    margin-left: 1px;
    border-radius: 5px;
    background: #fff;
    }
.display_box:hover /*estilos para cada caja unitaria de cada usuario que se muestra. cuando el mause se pocisiona sobre el area*/
{
 background: #08589a;
 border-color: #08589a;
color: #FFF;
}
</style>
<style type="text/css">

.desc
{
color:#666;
font-size:16;
}
.desc:hover
{
color:#FFF;
}
.caret {
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: 2px;
    vertical-align: middle;
    border-top: 4px dashed;
    border-top: 4px solid\9;
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
}
/* Easy Tooltip */
</style>
<script type="text/javascript">
$(document).ready(function(){

$(".busca1").keyup(function(){ //se crea la funcioin keyup
var texto = $(this).val();//se recupera el valor de la caja de texto y se guarda en la variable texto
var dataString = 'palabra='+ texto;//se guarda en una variable nueva para posteriormente pasarla a busqueda.php
if(texto==''){//si no tiene ningun valor la caja de texto no realiza ninguna accion
$.ajax({//metodo ajax
type: "POST",//aqui puede  ser get o post
url: "busqueda2.php?session=<?php echo $_SESSION['id_user'];?>",//la url adonde se va a mandar la cadena a buscar
data: dataString,
cache: false,
success: function(html){//funcion que se activa al recibir un dato
$("#users_online").html(html).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
}

});
}else{
//pero si tiene valor entonces
$.ajax({//metodo ajax
type: "POST",//aqui puede  ser get o post
url: "busqueda1.php?session=<?php echo $_SESSION['id_user'];?>",//la url adonde se va a mandar la cadena a buscar
data: dataString,
cache: false,
success: function(html){//funcion que se activa al recibir un dato
$("#users_online").html(html).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
}
});

}
return false;    
});
});

</script>
<script type="text/javascript">
$(document).ready(function(){

$(".busca").keyup(function(){ //se crea la funcioin keyup
var texto = $(this).val();//se recupera el valor de la caja de texto y se guarda en la variable texto
var dataString = 'palabra='+ texto;//se guarda en una variable nueva para posteriormente pasarla a busqueda.php
if(texto==''){//si no tiene ningun valor la caja de texto no realiza ninguna accion
$("#display").fadeOut();
var texto = $(this).val();//se recupera el valor de la caja de texto y se guarda en la variable texto
var dataString = 'palabra='+ false;
$.ajax({//metodo ajax
type: "POST",//aqui puede  ser get o post
url: "busqueda.php",//la url adonde se va a mandar la cadena a buscar
data: dataString,
cache: false,
success: function(html){//funcion que se activa al recibir un dato
$("#display").html(html).fadeOut();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
}

});
}else{
//pero si tiene valor entonces
$.ajax({//metodo ajax
type: "POST",//aqui puede  ser get o post
url: "busqueda.php",//la url adonde se va a mandar la cadena a buscar
data: dataString,
cache: false,
success: function(html){//funcion que se activa al recibir un dato
$("#display").html(html).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
}
});

}
return false;    
});
});

</script>
   <div class="menu">
  <table id="inpt">
  <tr>
    <td>&nbsp;</td>
     <td><div style="margin-top:8px; margin-left:25%;" class="input-group">
  <span class="input-group-addon" id="basic-addon1" style="height:28px; border-top:1px solid #CCC; border-bottom:1px solid #CCC; border-left:1px solid #CCC; margin-top:0px;"><span class="icon-search"></span></span><input class="form-control busca"  id="caja_busqueda" name="clave" type="search" placeholder="Buscar amigos" style="text-transform:capitalize; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:15px;font-weight:100; width:420px; height:28px; border-top:1px solid #CCC;  border-left:0px solid #CCC; border-bottom:1px solid #CCC;"></div></td>
    <td>&nbsp;</td>
    </tr>
</table>			
 <?php
				$Usuario = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` = ?");
				$Usuario->execute(array($_SESSION['id_user']));
				while($row = $Usuario->fetch()){
					$fot = $row['foto'];
					$sex = $row['sexo'];
					$nome = $row['nome'];
					$apellidos = $row['apellidos'];
					$id = $row['id'];
					}?>
<table width="auto" style="margin-left:715px; margin-top:-29px;" cellspacing="1" border="0" cellpadding="1">
  <tr>
   
	
    <th scope="col"><?php if($fot==''){?>
<?php if($sex=='Hombre'){?>
<img src="material/Hombre.jpg" style="width:30px; height:30px; border-radius:50%;" class="foto" width="60"  height="60" />
<?php }else if($sex=='Mujer'){ ?>
<img src="material/Mujer.jpg" style="width:30px; height:30px; border-radius:50%;" class="foto" width="60"  height="60" />
 <?php }?>
<?php }else{ ?>
<img style="width:30px; height:30px; border-radius:50%;" src="fotos/<?php echo $fot;?>" border="0" />          
 <?php }?></th>
 <?php $np=utf8_encode($dadosUser['nome'].' '.$apellidos);?>
<script>
$(document).ready(function() { 
		var np='<?php echo $np;?>';
var id=np.slice(0,19);
if(np.length<20){
nomp = document.getElementById('nomp');
nomp.textContent = id;
}else{
	nomp = document.getElementById('nomp');
nomp.textContent = id+'...';
}
});

</script>

    <th scope="col" style="width: 160px;max-width: 160px;"><span style="margin-left:5px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;text-transform:capitalize; font-weight: 100; font-size:14px;color:#fff;" id="nomp"></span></th>
    <th scope="col"><span style="color:#314F86;margin-left:5px;">|</span></th>
    <th scope="col"><span><a href="javascript:void(0);" id="inicio" style="font-weight: 100;color:#fff;margin-left:5px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:14px;">Inicio</a></span></th>
    <th scope="col"><span style="margin-left:15px; font-size:23px;color:#1A2946;cursor:pointer;"><span id="icon-users" class="icon-users"><span class="n_user" style="background-color:#F30;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size: 13px;padding:3px;width: auto;top: 7px;margin-left: -12px;position: absolute;color: #fff;border-radius: 10px;">13</span></span></span></th>
    <th scope="col"><span style="margin-left:15px; font-size:23px;color:#1A2946;cursor:pointer;"><span class="icon-bubble"><span style="background-color:#F30;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size: 13px;padding:3px;width: auto;top: 7px;margin-left: -12px;position: absolute;color: #fff;border-radius: 10px;">13</span></span></span></th>
    <th scope="col"><span style="margin-left:15px; font-size:23px;color:#1A2946;cursor:pointer;"><span class="icon-earth"><span style="background-color:#F30;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size: 13px;padding:3px;width: auto;top: 7px;margin-left: -12px;position: absolute;color: #fff;border-radius: 10px;">13</span></span></span></th>
    <th scope="col"><span style="color:#314F86;margin-left:5px;">|</span></th>
    <th scope="col"><span style="margin-left:15px; font-size:23px;color:#1A2946;cursor:pointer;"><span class="icon-info"></span></span></th>
     <th scope="col"><span style="margin-left:15px; font-size:23px;color:#1A2946;cursor:pointer;">
     <span class="caret"></span></span></th>
  </tr>
 
</table>
    </div><script>
$(document).ready(function() {
   $('#icon-users').click(function(){
	$('.search-bubble1').toggle();
	$('.search-bubble2').hide();	
	$('.search-bubble3').hide();
	$('.search-bubblec').hide();
	$('#icon-users').css("color","#fff");
	$('.icon-bubble').css("color","#1A2946");
	$('.caret').css("color","#1A2946");
	$('.icon-earth').css("color","#1A2946");
	});
	 $('.icon-bubble').click(function(){
	$('.search-bubble2').toggle();
	$('.search-bubble1').hide();	
	$('.search-bubble3').hide();
	$('.search-bubblec').hide();
	$('.icon-bubble').css("color","#fff");
	$('#icon-users').css("color","#1A2946");
	$('.caret').css("color","#1A2946");
	$('.icon-earth').css("color","#1A2946");
	});
	 $('.caret').click(function(){
	$('.search-bubble').hide();
	$('.search-bubble1').hide();	
	$('.search-bubble3').hide();
	$('.search-bubblec').toggle();
	$('.caret').css("color","#fff");
	$('#icon-users').css("color","#1A2946");
	$('.icon-bubble').css("color","#1A2946");
	$('.icon-earth').css("color","#1A2946");
	});
	 $('.icon-earth').click(function(){
	$('.search-bubble1').hide();
	$('.search-bubble2').hide();
	$('.search-bubble3').toggle();
	$('.search-bubblec').hide();
	$('.icon-earth').css("color","#fff");
	$('#icon-users').css("color","#1A2946");
	$('.icon-bubble').css("color","#1A2946");
	$('.caret').css("color","#1A2946");
	});
	$('aside, ul, li, a, p, #container_publicaciones, #opp, #cont, #opt, input, img, #container_saludos, #inpt').click(function(){
	$('.search-bubble1').hide();
	$('.search-bubble2').hide();
	$('.search-bubble3').hide();
	$('.search-bubblec').hide();	
	$('.icon-earth').css("color","#1A2946");
	$('.icon-users').css("color","#1A2946");
	$('.icon-bubble').css("color","#1A2946");
	$('.caret').css("color","#1A2946");
	});
});
</script> <div id="display"></div>
<style>
.search-bubblev {
    position: absolute;
    z-index: 1;
}
.search-bubble-innardsv {
    background:linear-gradient(to bottom,#fff, #eceeef 150%);
    border-radius: 2px;
    padding: 4px 10px;
    text-align: center;
    width: 560px;
}
.search-bubble-innardsv::before {
    border:1px solid #ccc;
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}
#search-bubble-innards1 div{float:left;}
#search-bubble-innards1::-webkit-scrollbar{width:3px;}
#search-bubble-innards1::-webkit-scrollbar-track{background-color:#ebebeb;width:3px; border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
#search-bubble-innards1::-webkit-scrollbar-thumb{background-color:#069;width:3px;}
#search-bubble-innards1::-webkit-scrollbar-thumb:hover{background-color:#069;}

#search-bubble-innards2 div{float:left;}
#search-bubble-innards2::-webkit-scrollbar{width:3px;}
#search-bubble-innards2::-webkit-scrollbar-track{background-color:#ebebeb;width:3px; border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
#search-bubble-innards2::-webkit-scrollbar-thumb{background-color:#069;width:3px;}
#search-bubble-innards2::-webkit-scrollbar-thumb:hover{background-color:#069;}

#search-bubble-innards3 div{float:left;}
#search-bubble-innards3::-webkit-scrollbar{width:3px;}
#search-bubble-innards3::-webkit-scrollbar-track{background-color:#ebebeb;width:3px; border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
#search-bubble-innards3::-webkit-scrollbar-thumb{background-color:#069;width:3px;}
#search-bubble-innards3::-webkit-scrollbar-thumb:hover{background-color:#069;}
</style>

<div class="search-bubblev" style="left: 270px; top:315px;display:none;"><div class="search-bubble-innardsv">Cargando...</div></div>
<div class="search-bubble1" style="display:none;left: 740px; top: 50px;float:right;position:absolute;"><div class="search-bubble-innards1" id="search-bubble-innards1">
<div style="position: relative;text-align: left;background: #fff;width: 300px;margin-top: -23px;font-family:tre'Trebuchet MS', Arial, Helvetica, sans-serif; border-bottom: 1px solid #ccc;">Solicitudes Aceptadas  <span style="float:right;"><span class="" style="margin-right: 10px;font-size:13px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Buscar Amigos</span><span class="icon-cog" style="margin-right: 10px;"></span></span></div>
<div class="s_acep" style="margin-bottom:23px;">
<div class="display_box" align="left" style="cursor:pointer; border-bottom:1px solid #ccc; height:auto;">
<div style="float:left; margin-right:6px; margin-top:5px;" class="imgSmall">
<img src="fotos/keyner.jpg" class="foto" width="60"  height="57" />         
            </div> 
<div style="margin-center:5px; width:220px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:15px;text-transform:capitalize;"><?php echo utf8_encode($nome.' '.$apellidos); ?></div>
<div style="margin-center:6px; font-size:12px;margin-top:-5px;"><?php echo $id; ?> Amigos En Comun</div>
<div style="margin-top: -5px;"><input type="button" class="btn btn-primary" value="Confirmar" style="color: #fff;height: 22px;padding: 1px 6px 6px 6px;font-size: 15px;border-radius: 3px;cursor:pointer;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><input type="button" class="btn btn-default" value="Eliminar Solicitud" style="margin-left:3px; cursor:pointer;color: #000;height: 22px;padding: 1px 6px 6px 6px;font-size: 15px;border-radius: 3px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"></div>
</div>
<div class="display_box" align="left" style="cursor:pointer; border-bottom:1px solid #ccc; height:auto;">
<div style="float:left; margin-right:6px; margin-top:5px;" class="imgSmall">
<img src="fotos/keyner.jpg" class="foto" width="60"  height="57" />         
            </div>
            <div style="margin-center:5px; width:220px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:15px;text-transform:capitalize;"><?php echo utf8_encode($nome.' '.$apellidos); ?></div>
<div style="margin-center:6px; font-size:12px;margin-top:-5px;"><?php echo $id; ?> Amigos En Comun</div>
<div style="margin-top: -5px;"><input type="button" class="btn btn-primary" value="Confirmar" style="color: #fff;height: 22px;padding: 1px 6px 6px 6px;font-size: 15px;border-radius: 3px;cursor:pointer;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><input type="button" class="btn btn-default" value="Eliminar Solicitud" style="margin-left:3px; cursor:pointer;color: #000;height: 22px;padding: 1px 6px 6px 6px;font-size: 15px;border-radius: 3px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"></div>
</div>
            </div>
            <div style="position:relative;text-align: left;background: #fff;width: 300px;margin-top: -23px;font-family:tre'Trebuchet MS', Arial, Helvetica, sans-serif; border-bottom: 1px solid #ccc;">Solicitudes De Amistad</div>
<?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` != ?");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$apellidos = $row['apellidos'];
					$nome = $row['nome'];
					$id = $row['id'];
					$blocks = explode(',', $row['blocks']);
					$agora = date('Y-m-d H:i:s');
					
			?>
<div class="display_box" align="left" style="cursor:pointer; border-bottom:1px solid #ccc; height:auto;">
<div style="float:left; margin-right:6px; margin-top:5px;" class="imgSmall">
<?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" width="60"  height="57" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" width="60"  height="57" />
 <?php }?>
<?php }else{ ?>
<img src="fotos/<?php echo $foto;?>" class="foto" width="60"  height="57" />         
 <?php }?>
            </div> <!--Colocamos la foto Recuperada de la bd -->
<div style="width:220px;font-size:13px; color: #000;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;text-transform:capitalize;"><?php echo utf8_encode($nome.' '.$apellidos); ?></div>
<div style="margin-center:6px; font-size:12px;margin-top:-5px;"><?php echo $id; ?> Amigos En Comun</div>
<div style="margin-top: -5px;"><input type="button" class="btn btn-primary" value="Confirmar" style="color: #fff;height: 22px;padding: 1px 6px 6px 6px;font-size: 15px;border-radius: 3px;cursor:pointer;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><input type="button" class="btn btn-default" value="Eliminar Solicitud" style="margin-left:3px; cursor:pointer;color: #000;height: 22px;padding: 1px 6px 6px 6px;font-size: 15px;border-radius: 3px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"></div>
</div>
</a>
<?php } ?>
<div style="position: absolute;border-top:1px solid #ccc;margin-top: 402px;text-align: center;background: #fff;width: 300px;
">Ver Todas</div>
</div>
</div>
<div class="search-bubble2" style="display:none;left: 778px; top: 50px;float:right;position:absolute;"><div class="search-bubble-innards2" id="search-bubble-innards2">
<div style="height: 23px;position: relative;text-align: left;background: #fff; font-size:13px; padding-left: 7px; width: 300px;margin-top: -23px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; border-bottom: 1px solid #ccc;">Recientes(10)  <span style="float:right;"><span class="" style="margin-right: 10px;font-size:13px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Nuevo Mensaje</span><span class="icon-cog" style="margin-right: 10px;"></span></span></div>
<?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` != ?");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$apellidos = $row['apellidos'];
					$nome = $row['nome'];
					$id = $row['id'];
					$blocks = explode(',', $row['blocks']);
					$agora = date('Y-m-d H:i:s');
					if(!in_array($_SESSION['id_user'], $blocks)){
						$status = 'on';
						if($agora >= $row['limite']){
							$status = 'off';
						}
					
					
			?>
<div class="display_box" align="left" style="cursor:pointer; border-bottom:1px solid #ccc; height:auto;">
<div style="float:left; margin-right:6px; margin:3px 2px;" class="imgSmall">
<?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" width="60"  height="57" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" width="60"  height="57" />
 <?php }?>
<?php }else{ ?>
<img src="fotos/<?php echo $foto;?>" class="foto" width="60"  height="57" />         
 <?php }?>
            </div> <!--Colocamos la foto Recuperada de la bd -->
<div style="margin: 5px; width:220px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:14px;text-transform:capitalize;color: #000;"><?php echo utf8_encode($nome.' '.$apellidos); ?> (<?php echo $id; ?>)</div>
<div style="margin-center:6px; font-size:12px; margin-top: -11px;margin-left: 5px;">Hola como estas keyner?...</div>
<table width="20" style="float: right;margin-right: 10px;font-size: 12px;margin-top: -25px;">
  <tr>
    <td>Jue</td>
  </tr>
  <tr>
    <td><div style="position:relative;left: 4px;width: 10px;height: 10px;border-radius: 50px;" class="estatus <?php echo $status;?>"></div></td>
  </tr>
</table>
</div>
</a>
<?php } } ?>
<div style="position: absolute;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:13px; border-top:1px solid #ccc;margin-top: 402px;text-align: right;padding-right: 10px;padding-top: 3px;background: #fff;width: 300px; height:25px;">Marcar Todos Como Leidos</div>
</div>
</div>
<div class="search-bubblec" style="left: 1029px;position:absolute; display:none; top: 50px;"><div class="search-bubble-innardsc">
<a href="javascript:void(0);" id="act_datos">Actualizar Datos</a>
<a href="./?session_destroy=salir">Salir</a>
</div></div>
<div class="search-bubble3" style="display:none;left: 832px; top: 50px;float:right;position:absolute;"><div id="search-bubble-innards3" class="search-bubble-innards3">
<div style="position: relative;height: 23px;text-align: left;background: #fff;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; width: 300px;margin-top: -23px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; padding-left:7px; border-bottom: 1px solid #ccc;">Notificaciones(10)  <span style="float:right;"><span class="" style="margin-right: 7px;font-size:11px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Marcar Todas Como Leidas</span><span class="icon-cog" style="margin-right: 10px;"></span></span></div>
<?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` != ?");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$apellidos = $row['apellidos'];
					$nome = $row['nome'];
					$id = $row['id'];
					$blocks = explode(',', $row['blocks']);
					$agora = date('Y-m-d H:i:s');
					if(!in_array($_SESSION['id_user'], $blocks)){
						$status = 'on';
						if($agora >= $row['limite']){
							$status = 'off';
						}
					
					
			?>
<div class="display_box" align="left" style="cursor:pointer; border-bottom:1px solid #ccc; height:auto;">
<div style="float:left; margin-right:6px; margin:3px 2px;" class="imgSmall">
<?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" width="60"  height="57" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" width="60"  height="57" />
 <?php }?>
<?php }else{ ?>
<img src="fotos/<?php echo $foto;?>" class="foto" width="60"  height="57" />         
 <?php }?>
            </div> <!--Colocamos la foto Recuperada de la bd -->
<div style="margin: 5px; width:220px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;text-transform:capitalize;color: #000;"><?php echo utf8_encode($nome.' '.$apellidos); ?></div>
<div style="margin-center:6px; font-size:12px; margin-top: -11px;margin-left: 5px;">Agrego una nueva foto.</div>
<table width="30" style="float: right;margin-right: 10px;font-size: 12px;margin-top: -25px;">
  <tr>
    <td><img src="fotos/<?php echo $foto; ?>" width="30" height="36"></td>
  </tr>
</table>
</div>
</a>
<?php } } ?>
<div style="position: absolute;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:13px; border-top:1px solid #ccc;margin-top: 402px;text-align: center;padding-right: 10px;padding-top: 3px;background: #fff;width: 300px; height:25px;">Ver Todas</div>
</div></div>
<aside id="users_online44"> <div style="float:right;padding-top:-15px; width:20px; border:0px solid #ccc;"><a href="#" id="pop1"><b>...</b></a></div>

<span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:15px;">Mis Archivos</span>
<br>
<span class="imgSmall"><img src="fotos/keyner.jpg" class="foto" width="60"  height="60" /></span><span class="imgSmall"><img src="fotos/wendys.jpg" class="foto" width="60"  height="60" /></span><span class="imgSmall"><img src="fotos/kendys.jpg" class="foto" width="60"  height="60" /></span><span class="imgSmall"><img src="fotos/danna.jpg" class="foto" width="60"  height="60" /></span>
<br>
<br>
<a href="javascript:void(0);" id="mis_archivos" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:15px;">Abrir Mis Archivos</a>
</aside>
<aside id="users_online3"> 
                <?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` = ?");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$apellidos = $row['apellidos'];
					$blocks = explode(',', $row['blocks']);
					$agora = date('Y-m-d H:i:s');
					if(!in_array($_SESSION['id_user'], $blocks)){
						$status = 'on';
						if($agora >= $row['limite']){
							$status = 'off';
						}
					}
					}?>
					<table  width="210" cellpadding="1">
  <tr>
     <th scope="col" style="padding: 5px 0px;"><?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" style="width:30px; height:30px; border-radius:50%;" class="foto" width="60"  height="60" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" style="width:30px; height:30px; border-radius:50%;" class="foto" width="60"  height="60" />
 <?php }?>
<?php }else{ ?>
<img style="width:30px; height:30px; border-radius:50%;" src="fotos/<?php echo $foto;?>" border="0" />          
 <?php }?>
   <span style="color: #fff;background: #08589a;padding: 5px;border-radius: 5px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:13px;"><?php echo utf8_encode($dadosUser['nome'].' '.$apellidos);?></span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Noticias</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Eventos</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Grupos</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Juegos</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-images" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> <a href="javascript:void(0);" id="misfotos">Fotos </a></span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Buscar Amigos</span></th>
  </tr>
   <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Noticias</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Eventos</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Grupos</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Juegos</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Lugares</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Buscar Amigos</span></th>
  </tr>
   <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Noticias</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Eventos</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Grupos</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Juegos</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Lugares</span></th>
  </tr>
  <tr>
    <th scope="col"><span class="icon-newspaper" style="padding:3px;font-size:18px;"></span><span style="color:#0275d8; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;"> Buscar Amigos</span></th>
  </tr>
            </table>
		</aside>
        
         <aside id="users_online11">
         <span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:13px; position:fixed; margin-left:3px;margin-top:-2px;">Estados:</span>
            <div style="float:left;padding-top:20px; margin-top:-3px;">
   <table width="auto" cellspacing="1" cellpadding="1">
  <tr>
    <th scope="col"> <div class="imgSmall" style="margin-left:10px;cursor:pointer;"><span style="left: 36px;top: 44px;width: 15px;height: 15px;color: #d9534f;position:absolute;border: 2px solid #fff;background-color: #5cb85c;border-radius: 10px;"></span><?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" onClick="Alertz.renderz('<?php echo $id; ?>');" id="s_etd" class="foto" width="60"  height="60" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" onClick="Alertz.renderz('<?php echo $id; ?>');"  id="s_etd" class="foto" width="60"  height="60" />
 <?php }?>
<?php }else{ ?>
 <img src="fotos/<?php echo $foto;?>" onClick="Alertz.renderz('<?php echo $id; ?>');"  id="s_etd" class="foto" width="60"  height="60" />           
 <?php }?></div>
 </th>
    <th scope="col"> <div class="imgSmall" style="margin-left:20px;cursor:pointer;"><img src="fotos/default.jpg" id=""  width="60" height="60" border="0" /></div></th>
    <th scope="col"><div class="imgSmall" style="margin-left:20px;cursor:pointer;"><img src="fotos/default.jpg" id="" width="60" height="60" border="0" /></div></th>
     <th scope="col"> <div class="imgSmall" style="margin-left:20px;cursor:pointer;"><img src="fotos/default.jpg" id='' width="60" height="60" border="0" /></div></th>
    <th scope="col"> <div class="imgSmall" style="margin-left:20px;cursor:pointer;"><img src="fotos/default.jpg" id=""  width="60" height="60" border="0" /></div></th>
    <th scope="col"><div class="imgSmall" style="margin-left:20px;cursor:pointer;"><img src="fotos/default.jpg" id="" width="60" height="60" border="0" /></div></th>
  </tr>
   <tr>
    <th scope="col"><span  style="margin-left:10px; font-size:13px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;cursor:pointer;" id=""><?php echo $dadosUser['nome'];?></span></th>
    <th scope="col"><span id=""  style="margin-left:20px;font-size:13px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;cursor:pointer;">Keyner</span></th>
    <th scope="col"><span  id="" style="margin-left:20px;font-size:13px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;cursor:pointer;">Wendys</span></th>
    <th scope="col"><span  style="margin-left:20px; font-size:13px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;cursor:pointer;" id="">Maria</span></th>
    <th scope="col"><span id=""  style="margin-left:20px;font-size:13px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;cursor:pointer;">Keyner</span></th>
    <th scope="col"><span  id="" style="margin-left:20px;font-size:13px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;cursor:pointer;">Wendys</span></th>
  </tr>
  
</table>
 </div>
   </aside>
   
    <aside id="users_online111" style="padding:10px;">
  <div style=" font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:12px;"><span class="icon-gift" style="font-size:14px;"></span> Hoy es el cumpleaños de <a href="#" style="text-transform:capitalize;color:#428bca;"><b><?php echo $dadosUser['nome'].' '.$dadosUser['nome'];?></b></a></div>
   </aside>
    <aside id="users_online1111" style="padding:5px 10px 0px 15px;  float:left;">
 <table>
  <tr>
  <td colspan="5" align="center"><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;">Juegos Instantaneos</span></td>
  </tr>
  <tr>
    <th scope="col"  style="padding-top:10px;"><img src="juegos/juego1.png" class="imgSmall" width="50" height="50" border="0" /></th>
    <th scope="col" colspan="1"><span style="margin-left:5px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;">4 Fotos 1 Palabra</span></th>
    <th scope="col"> <input type="button" class="jugar"  id="jugar"  value="Jugar"></th>
  </tr>
  <tr><td colspan="3"><div id="ray" style="border-bottom: 1px solid #dddfe2;font-size: 1px;    font-family: inherit;height: 8px; margin-bottom: 8px; display: block;"></div></td></tr>
   <tr>
    <th scope="col"><img src="juegos/juego2.png" class="imgSmall" width="50" height="50" border="0" /></th>
    <th scope="col"><span style="margin-left:5px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;">4 Fotos 1 Palabra</span></th>
    <th scope="col"> <input type="button" class="jugar" id="jugar1"  value="Jugar"></th>
  </tr>
  <tr><td colspan="3"><div id="ray" style="border-bottom: 1px solid #dddfe2;font-size: 1px;    font-family: inherit;height: 8px; margin-bottom: 8px; display: block;"></div></td></tr>
  <tr>
    <th scope="col"><img src="juegos/juego3.png" class="imgSmall" width="50" height="50" border="0" /></th>
    <th scope="col" colspan="1"><span style="margin-left:5px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;">4 Fotos 1 Palabra</span></th>
    <th scope="col"> <input type="button" class="jugar" id="jugar2" value="Jugar"></th>
  </tr>
  <tr><td colspan="3"><div id="ray" style="border-bottom: 1px solid #dddfe2;font-size: 1px;    font-family: inherit;height: 8px; margin-bottom: 8px; display: block;"></div></td></tr>
   <tr>
    <th scope="col"><img src="juegos/juego4.png" class="imgSmall" width="50" height="50" border="0" /></th>
    <th scope="col"><span style="margin-left:5px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px;">4 Fotos 1 Palabra</span></th>
    <th scope="col"> <input type="button" class="jugar" id="jugar3"  value="Jugar"></th>
  </tr>
  <tr><td colspan="3"><div id="ray" style="border-bottom: 1px solid #dddfe2;font-size: 1px;    font-family: inherit;height: 8px; margin-bottom: 8px; display: block;"></div></td></tr>
</table>
   </aside>
   <aside id="users_online1">
        <div id="p_q_c"><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:6px;color:#666; background:#fff; font-size:13px; ">Personas que quizas conozcas</span><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; cursor:pointer; margin:10px; font-size:13px;"><a href="javascript:void(0);" id="ver_todas">Ver Todas</a></span></div>
       <ul style="margin-top:23px;">
			<?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` != ?");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$apellidos = $row['apellidos'];
					$blocks = explode(',', $row['blocks']);
					$agora = date('Y-m-d H:i:s');
					if(!in_array($_SESSION['id_user'], $blocks)){
						$status = 'on';
						if($agora >= $row['limite']){
							$status = 'off';
						}
			?>
				<li id="janel_<?php echo $row['id'];?>">
                
					<div class="imgSmall"><?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" width="60"  height="60" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" width="60"  height="60" />
 <?php }?>
<?php }else{ ?>
 <img src="fotos/<?php echo $foto;?>" class="foto" width="60"  height="60" />           
 <?php }?></div><script>
<?php $n=utf8_encode($row['nome'].' '.$apellidos);?>
$(document).ready(function() { 
		var a='<?php echo $n;?>';
var id=a.slice(0,19);
if(id.length<18){
aa = document.getElementById('<?php echo $row['id'];?>');
aa.textContent = id;
}else{
	aa = document.getElementById('<?php echo $row['id'];?>');
aa.textContent = id+'...';
}
});

</script><style>
.exceptions-list-button {
    font-family: 'Segoe UI', Tahoma, sans-serif;
}
.exceptions-list-button {
    padding: 1px 6px;
}
.jugar{
background: #08589a;
border: 1px solid #08589a;
color: #fff;
border-radius: 2px;
margin-left:11px;
padding:2px 6px 2px 6px;
font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;
font-size:14px;	
}
.exceptions-list-button{
    text-rendering: auto;
    color: initial;
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: start;
    margin: 0em 0em 0em 0em;
    font: 13.3333px Arial;
}
.exceptions-list-button{
    -webkit-writing-mode: horizontal-tb;
}

.exceptions-list-button {
    -webkit-appearance: button;
}

#plus{
	color:#fff;
}
.plus{
height:25px;
margin-left:10px;
font-family:trebuchet MS, Arial, Helvetica, sans-serif;
margin-top:-19px;
background:#08589a;
border:1px solid #08589a;
padding: 0px 5px;
color:#fff;
	}
</style>
					<a href="#" id="<?php echo $row['id'];?>" style="margin-top:-12px;text-transform:capitalize;" class="comecar"></a><span id="clos_<?php echo $row['id'];?>" style="float:right; color:#999; position:relative; margin-top: -30px; margin-right:10px; top:0px;font-size:12px;cursor:pointer;"><b><span class="icon-cross"></span></b></span><button class="plus" id="ag<?php echo $row['id'];?>" class="exceptions-list-button"><span class="icon-user-plus" id="plus"></span> Agregar a amigos</button>
				</li>
                
 <script>
 $(document).ready(function() {
	  $('#clos_<?php echo $row['id'];?>').click(function(){	
$('#janel_<?php echo $row['id'];?>').hide();
});
 $('#<?php echo $row['id'];?>').click(function(){	
  $('.search-bubblev').fadeIn();
$('#cont').load('user.php?id=<?php echo $row['id'];?>',function(){
$('.search-bubblev').fadeOut();
});
});
$('#act_datos').click(function(){	
$('#cont').load('actualizar_datos.php?id=<?php echo $dadosUser['id'];?>');
});
$('#mis_archivos').click(function(){	
$('#cont').load('mis_archivos.php?id=<?php echo $dadosUser['id'];?>');
});
 $('#ag<?php echo $row['id'];?>').click(function(){	
alert(<?php echo $row['id'];?>);

});
 $('#musica').click(function(){	
$('#cont').load('musica.php?session=<?php echo $dadosUser['id'];?>');
});
 $('#fotos').click(function(){	
$('#cont').load('fotos.php?session=<?php echo $dadosUser['id'];?>');
});
 $('#videos').click(function(){	
$('#cont').load('videos.php?session=<?php echo $dadosUser['id'];?>');
});
$('#inicio').click(function(){	
setTimeout('location.href="chat.php"');
});
});
</script>
			<?php }}?>
			</ul>
		</aside>
<style type="text/css">
#clos:hover{
color:#666;
cursor:pointer;	
}
#display #display_box{float:left;}
#display::-webkit-scrollbar{width:0px;}
#display::-webkit-scrollbar-track{background-color:#666; border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
#display::-webkit-scrollbar-thumb{background-color:#666;}
#display::-webkit-scrollbar-thumb:hover{background-color:#069;}

#users_online1111 table{float:left;}
#users_online1111::-webkit-scrollbar{width:0px;}
#users_online1111::-webkit-scrollbar-track{background-color:#666; border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
#users_online1111::-webkit-scrollbar-thumb{background-color:#666;}
#users_online1111::-webkit-scrollbar-thumb:hover{background-color:#069;}

#users_online11 div .imgSmall{}
#users_online11::-webkit-scrollbar{width:3px; height:4px;}
#users_online11::-webkit-scrollbar-track{background-color:#ebebeb;width:3px; border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
#users_online11::-webkit-scrollbar-thumb{background-color:#09C;width:3px;}
#users_online11::-webkit-scrollbar-thumb:hover{background-color:#4267B2;}

#users_online1 ul{float:left;}
#users_online1::-webkit-scrollbar{width:0px;}
#users_online1::-webkit-scrollbar-track{background-color:#666; border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
#users_online1::-webkit-scrollbar-thumb{background-color:#666;}
#users_online1::-webkit-scrollbar-thumb:hover{background-color:#069;}

#cont {
	position: fixed;
	width: 611px;
	top:26px;
	margin-top:25px;
	background:#E9EBEE;
	height: 92%;
	max-height:100%;
	border:0px solid #f00;
	overflow:auto;
	left: 249px;
	
}
#cont #container_publicaciones{float:left;}
#cont::-webkit-scrollbar{width:0px;}
#cont::-webkit-scrollbar-track{background-color:#fff; border-left:1px solid #fff; border-right:1px solid #fff;}
#cont::-webkit-scrollbar-thumb{background-color:#069;}
#cont::-webkit-scrollbar-thumb:hover{background-color:#069;}

body #chats{float:none;}
body::-webkit-scrollbar{height:8px;}
body::-webkit-scrollbar-track{background-color:#999; border-left:1px solid #000; border-right:1px solid #000;}
body::-webkit-scrollbar-thumb{background:#ebebeb; transition-duration: 1s; border-radius:50px;}
body::-webkit-scrollbar-thumb:hover{background-color:#DDE0E6;border-right:0.6px solid #999; border-bottom-right-radius:50px;  border-top-left-radius:50px; border-left:0.6px solid #999;}

#container_publicaciones{
border-radius:5px;
	border:1px solid #CCC;
margin-left:0px;
	position: relative;
	width: 602px;
	margin-top:9px;
	background:#fff;
	height: auto;
	padding:10px;
}
.op a{
text-decoration:none;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
font-size:13px;
color:#0275d8;
}
#opp a{
text-decoration:none;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
font-size:13px;
color:#0275d8;
}
#container_comentar{
	border-radius:5px;
	left: 0px;
		border:1px solid #CCC;
	top: 2px;
	position: relative;
	width: 602px;
	margin-top:5px;
	background:#fff;
	height:142px;	
}
#container_saludos{
	left: 245px;
	border-radius:5px;
	border:1px solid #CCC;
	position: static;
	width: 602px;
	margin-top:11px;
	background:#fff;
	height: 60px;	
}
#publicome {
	position: absolute;
	width: 557px;
	height: 33px;
	left: 10px;
}
.activo{
	border-bottom:2px solid #3639BE;
}
.activoo{
border-top:2px solid #3639BE;
}
.a{
border-top:1px solid #CCC;	
}
.bor{
border-bottom:2px solid #000;	
}
.bord{
border-top:2px solid #000;	
}
</style>
<script>
$(document).ready(function() {
$("#realizar_publi").mouseover(function(){
$("#realizar_publi").addClass("activo");// asigna una clase css
})
$("#realizar_publi").mouseout(function(){
$("#realizar_publi").removeClass("activo");// Remove una clase css
})
$("#album").mouseover(function(){
$("#album").addClass("activo");// asigna una clase css
})
$("#album").mouseout(function(){
$("#album").removeClass("activo");// Remove una clase css
})
$("#video").mouseover(function(){
$("#video").addClass("activo");// asigna una clase css
})
$("#video").mouseout(function(){
$("#video").removeClass("activo");// Remove una clase css
})
$("#opt").mouseover(function(){
$("#opt").addClass("activoo");// asigna una clase css
$("#opt").removeClass("a");
})
$("#opt").mouseout(function(){
$("#opt").removeClass("activoo");// Remove una clase css
$("#opt").addClass("a");
})
$("#actividad").mouseover(function(){
$("#actividad").addClass("activoo");// asigna una clase css
$("#actividad").removeClass("a");
})
$("#actividad").mouseout(function(){
$("#actividad").removeClass("activoo");// Remove una clase css
$("#actividad").addClass("a");
})
$("#fotoo").mouseover(function(){
$("#fotoo").addClass("activoo");// asigna una clase css
$("#fotoo").removeClass("a");
})
$("#fotoo").mouseout(function(){
$("#fotoo").removeClass("activoo");// Remove una clase css
$("#fotoo").addClass("a");
})
$('#come_pub').fadeIn();
$('#realizar_publi').click(function(){
$('#come_pub').css('display','block');
$('#realizar_publi').addClass("bor");
$("#album, #actividad, #fotoo, #video, #opt").removeClass("bor");
$("#album, #actividad, #fotoo, #video, #opt").removeClass("bord");
$('#come_pub2').hide();
$('#c_publ').load('php_c_publi.php');
})
$('#album').click(function(){
$('#come_pub2').css('display','block');
$('#album').addClass("bor");
$("#realizar_publi, #actividad, #fotoo, #video, #opt").removeClass("bor");
$("#realizar_publi, #actividad, #fotoo, #video, #opt").removeClass("bord");
$('#come_pub').hide();
})
$('#actividad').click(function(){
$('#come_pub').css('display','block');
$('#actividad').addClass("bord");
$("#realizar_publi, #album, #fotoo, #video, #opt").removeClass("bord");
$("#realizar_publi, #album, #fotoo, #video, #opt").removeClass("bor");
$('#come_pub2').hide()
})
$('#fotoo').click(function(){
$('#come_pub').css('display','block');
$('#fotoo').addClass("bord");
$("#realizar_publi, #album, #actividad, #video, #opt").removeClass("bord");
$("#realizar_publi, #album, #actividad, #video, #opt").removeClass("bor");
$('#come_pub2').hide()
})
$('#video').click(function(){
$('#come_pub2').css('display','block');
$('#video').addClass("bor");
$("#realizar_publi, #album, #actividad, #fotoo, #opt").removeClass("bord");
$("#realizar_publi, #album, #actividad, #fotoo, #opt").removeClass("bor");
$('#come_pub').hide();
})
$('#opt').click(function(){
$('#come_pub2').css('display','block');
$("#realizar_publi, #album, #actividad, #fotoo, #video").removeClass("bord");
$("#realizar_publi, #album, #actividad, #fotoo, #video").removeClass("bor");
$('#opt').addClass("bord");
$('#come_pub').hide();
})
	$('#close_record_pass').click(function() {
      $('#cont_record_pass').hide();
    });
	});
    </script>
   
<div id="cont">

<div id="cont_record_pass" style="width:602px;border-radius: 5px;padding-left: 20px;padding-top: 8px;margin-top: 5px;height: 120px;background:#fff;border:1px solid #CCC;"><a href="javascript:void(0);" id="close_record_pass"><span class="icon-cross" style="position: absolute;left: 582px;font-size:13px;color: #666;"></span></a>
<div class="icon-display" style="font-size:100px;">
<img src="fotos/<?php echo $fot;?>" style="margin-left: -94px;top: 27px;position: absolute;" width="89" height="50">
</div><div style="position: absolute;left: 140px; width:470px;top: 18px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><b style="font-size: 1rem;font-weight: 300;line-height: 1.1;">Recordar Contraseña</b><br>
<label style="font-size:14px;width:450px;">g dfdffdlj df dfg jndfl dfdf dfll fn djdflj l  nldf ldf  ,ndfnl ndf  kdfn nd , gdfngndln gndfn kdf df ndfndf df nkndfn 
dfgjk fgdl df  mbfm</label>
<div style="margin-top: -5px;"><input type="button" class="btn btn-primary" value="Aceptar" style="color: #fff;height: 22px;padding: 1px 11px 6px 11px;font-size: 15px;border-radius: 3px;cursor:pointer;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><input type="button" class="btn btn-default" value="Ahora no" style="margin-left:3px; cursor:pointer;color: #000;height: 22px;padding: 1px 11px 6px 11px;font-size: 15px;border-radius: 3px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"></div>  
</div>
</div>
<div id="container_comentar">
<div class="op" style="width:100%; position:relative; border-top-left-radius:5px; border-top-right-radius:5px; border:1px solid #CCC;"
>
<table border="0" width="100%">
  <tr>
    <th scope="col" onClick="EventoAlert_coment();"  width="34%" height="33" style="border-right:1px solid #CCC;background:#F7F8F9;" class="bor" id="realizar_publi"><div align="center"><a href="javascript:void(0);"><span class="icon-pencil" style="font-size:16px;color:#000;"></span> Realizar Publicacion</a></div></th>
    <th scope="col"  width="36%" style="border-right:1px solid #CCC;background:#F7F8F9;" id="album"><div  align="center"><a href="javascript:void(0);"><span class="icon-images" style="color:#000;font-size:16px;" id="images"></span> Album De Fotos/Videos</a></div></th>
    <th scope="col"  width="40%" style="background:#F7F8F9;" id="video"><div  align="center"><a href="javascript:void(0);"><span class="icon-eye" style="font-size:18px;color:#000;"></span> Video En Vivo</a></div></th>
  </tr>
</table>
</div>
<div id="r_public" style="border:0px solid #999;height:64px;">
























































 <style>
  .search-bubble-innardsxb {
    background: -webkit-linear-gradient(rgba(255, 248, 172, 0.9), rgba(255, 243, 128, 0.9));
    border-radius: 2px;
    padding: 4px 10px;
    text-align: center;
    width:100px;
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
<script>
$(document).ready(setInterval(function() {
   var publicacion=$('#cont_publicacion').val();
	if(publicacion!=''){
		$('.search-bubblexb').css('display','block');
	}else{
		$('.search-bubblexb').css('display','none');
	}
}),1000);
</script>
<script>
$(document).ready(function() {
  	$('.search-bubble-innardsxb').click(function(){
		var cont_publicacion=$('#cont_publicacion').val();
		var propietario=<?php echo $dadosUser['id'];?>;
		$.post("ins.php", {cont_publicacion: cont_publicacion, propietario: propietario},function(){
			var cont_publicacion=$('#cont_publicacion').val('');
			});
		
	})
});
</script>
<div id="come_pub"> 
<div class="search-bubblexb" style="left: 499px;top: 29px;display:none;"><div class="search-bubble-innardsxb"><span class="icon-checkmark"></span> Publicar</div></div>
<?php
		$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` = ?");
				$pegaUsuarios->execute(array($dadosUser['id']));
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
textarea{font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;max-height:64px; height:64px;
 border:0px solid #FFF; padding-left:5px;padding-top:20px; padding-bottom:15px;margin-left:8px; }
</style>

<table width="auto" cellspacing="1" cellpadding="1">
  <tr>
    <th scope="col"><div class="imgSmall" style="margin:7px;"><?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" width="60"  height="60" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" width="60"  height="60" />
 <?php }?>
<?php }else{ ?>
 <img src="fotos/<?php echo $foto;?>" class="foto" width="60"  height="60" />           
 <?php }?></div></th>
    <th scope="col"><textarea cols="64" id="cont_publicacion"  placeholder="Que estas pensando, <?php echo $nome; ?>"></textarea></th>
  </tr>
</table>
</div>



<div id="come_pub2" style="display:none;	"> 
<div class="search-bubblexb" style="left: 499px;top: 29px;display:none;"><div class="search-bubble-innardsxb"><span class="icon-checkmark"></span> Publicar</div></div>
<?php
		$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` = ?");
				$pegaUsuarios->execute(array($dadosUser['id']));
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

textarea{font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;text-height:25px; overflow:3px; height:64px;
 border:0px solid #FFF; padding-left:5px;padding-top:20px; padding-bottom:15px;margin-left:8px; }
</style>

<table width="auto" cellspacing="1" cellpadding="1">
  <tr>
    <th scope="col"><div class="imgSmall" style="margin:7px;"><?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" width="60"  height="60" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" width="60"  height="60" />
 <?php }?>
<?php }else{ ?>
 <img src="fotos/<?php echo $foto;?>" class="foto" width="60"  height="60" />           
 <?php }?></div></th>
    <th scope="col"><textarea cols="64" id="cont_publicacion"  placeholder="Que estas pensando, <?php echo $nome; ?>"></textarea></th>
  </tr>
</table>
</div>
















</div>
<div id="opp" style="width:100%; position:relative; top:0%;">
<table border="0" width="100%">
  <tr>
    <th scope="col"   width="34%" class="a" id="fotoo"> <div style="margin-top: 5px;" align="center"><a href="javascript:void(0);" style="background: #ebebeb;padding: 8px 11px 8px 11px;border-radius: 50px;"><span class="icon-image" style="font-size:16px;color:#009933;"></span> Foto/Video</a></div></th>
    <th scope="col"  width="36%" class="a" id="actividad"><div  style="margin-top: 5px;" align="center"><a href="javascript:void(0);" id="sent_act" style="background: #ebebeb;padding: 8px 11px 8px 11px;border-radius: 50px;"><img src="emotions/Em1/1.png" width="25"> Sentimiento/Actividad</a></div></th>
    <th scope="col"  width="40%" class="a" style="margin-top: 5px;"  id="opt"><div  align="left"><a href="javascript:void(0);" style="background: #ebebeb;padding: 8px 11px 8px 11px;border-radius: 50px;"><b>...</b></a></div></th>
  </tr>
</table></div>
<script>
		$(function(){
			$("#men li").on("click", function(){
				var i = $(this).index();
				$("#formular div").hide();
				$("#formular div").eq(i).show();
				$("#men li a").removeClass("activ");
				$(this).find("a").addClass("activ");
			});
		});
	</script>
    <div class="search-bubbleqws" style="left: 420px;top: 141px;display:none;"><div class="search-bubble-innardsqws">
    <table width="180">
  <tr>
    <td><span class="icon-image"></span></td>
     <td><a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Subir Imagen</a></td>
     </tr>
  <tr>
      <td><span class="icon-image"></span></td>
     <td colspan="2"><a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
     Subir al album</a></td>
  </tr>
  <tr>
       <td><span class="icon-image"></span></td>
     <td><a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Subir imagen y sonido</a></td>
  </tr>
</table>
    </div>
    </div>
<div class="search-bubbleql" style="left: 0px;top: 141px;display:none;"><div class="search-bubble-innardsql"><div id="men">
		<ul>
			<li><a href="#" class="activ"><span class="icon-images"></span> Foto</a></li>
			<li><a href="#"><span class="icon-film"></span> Video</a></li>
		</ul>
	</div>
	<div class="div" id="formular">
		<div id="form_session">
			<table width="195">
  <tr>
    <td><span class="icon-image"></span></td>
     <td><a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Subir Imagen</a></td>
     </tr>
  <tr>
      <td><span class="icon-image"></span></td>
     <td colspan="2"><a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
     Subir al album</a></td>
  </tr>
  <tr>
       <td><span class="icon-image"></span></td>
     <td><a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Subir imagen y sonido</a></td>
  </tr>
</table>

		</div>	

		<div  class="div" id="form_registerr">
			<table width="195">
  <tr>
    <td><span class="icon-film"></span></td>
     <td><a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Subir video del PC</a></td>
     </tr>
    <tr>
    <td><span class="icon-play"></span></td>
     <td><a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Subir video de You Tube</a></td>
     </tr>
</table>
		</div>
        </div>	
	</div></div>
<script>
$(document).ready(function() {
$('#actividad').click(function() {
		 $('.search-bubbleqw').toggle();
		 $('.search-bubbleqws').hide();
		 $('.search-bubbleql').hide();
});
 $('#fotoo').click(function() {
		 $('.search-bubbleql').toggle();
		  $('.search-bubbleqw').hide();
		  $('.search-bubbleqws').hide();
});
 $('#opt').click(function() {
		 $('.search-bubbleqws').toggle();
		 $('.search-bubbleqw').hide();
		 $('.search-bubbleql').hide();
});
});
</script><style>
#men ul{
			list-style: none;
			margin: 0;
			padding: 0;
			
		}

		#men ul li{
			display: inline-block;
			width: 50%;
			margin-right: -4px;
		}

		#men ul li a{
			background-color: #ccc;
			color: #222;
			display: block;
			padding: 3px 3px;
			text-decoration: none;
		}
		#men ul li a:hover{
			background-color: #eee;
		}

		#formular, #men{
			    width: 190px;
    margin-left: -3px;
		}

		.activ{
			background-color: white !important;
		}

		
		#form_registerr{
			display: none;
		}

peli//


		#menu ul{
			list-style: none;
			margin: 0;
			padding: 0;
		}

		#menu ul li{
			display: inline-block;
			width: 50%;
			margin-right: -4px;
		}

		#menu ul li a{
			background-color: #ccc;
			color: #222;
			display: block;
			padding: 3px 3px;
			text-decoration: none;
		}
		#menu ul li a:hover{
			background-color: #eee;
		}

		#formularios, #menu{
			margin:auto;
			width: 200px;
		}

		.active{
			background-color: white !important;
		}

		
		#form_register{
			display: none;
		}

	</style>
<style>
.search-bubble-innardsqws {
    background: #fff;
    border-radius: 2px;
    padding: 4px 10px;
    text-align: left;
    width:180px;
}
.search-bubble-innardsqws::before {
    border: 1px solid #ccc;
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}.search-bubbleqws {
    position: absolute;
    z-index: 1;
}


.search-bubble-innardsqw {
    background: #fff;
    border-radius: 2px;
    padding: 4px 10px;
    text-align: left;
    width: 215px;
}.search-bubble-innardsqw::before {
    border: 1px solid #ccc;
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}.search-bubbleqw {
    position: absolute;
    z-index: 1;
}

.search-bubble-innardsql {
    background: #fff;
    border-radius: 2px;
    padding: 4px 10px;
    text-align: left;
    width: 204px;
}.search-bubble-innardsql::before {
    border: 1px solid #ccc;
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}.search-bubbleql {
    position: absolute;
    z-index: 1;
}
</style>
	<script>
		$(function(){
			$("#menu li").on("click", function(){
				var i = $(this).index();
				$("#formularios div").hide();
				$("#formularios div").eq(i).show();
				$("#menu li a").removeClass("active");
				$(this).find("a").addClass("active");
			});
		});
	</script>
<div class="search-bubbleqw" style="left: 205px;top: 141px;display:none;"><div class="search-bubble-innardsqw"><div id="menu">
		<ul>
			<li><a href="#" class="active">Sentimiento</a></li>
			<li><a href="#">Actividad</a></li>
		</ul>
	</div>
	<div class="div" id="formularios">
		<div id="form_session">
			<table width="200">
  <tr>
    <td><img src="emotions/Em1/3.png" width="20"></td>
     <td>Estoy haciendo la tarea</td>
     <td><input type="checkbox"></td>
     </tr>
  </tr>
  <tr>
    <td><img src="emotions/Em1/3.png" width="20"></td>
     <td>Estoy haciendo la tarea</td>
      <td><input type="checkbox"></td>
  </tr>
  <tr>
    <td><img src="emotions/Em1/3.png" width="20"></td>
     <td>Estoy haciendo la tarea</td>
      <td><input type="checkbox"></td>
  </tr>
  <tr>
    <td><img src="emotions/Em1/3.png" width="20"></td>
   <td>Estoy haciendo la tarea</td>
    <td><input type="checkbox"></td>
  </tr>
  <tr>
    <td><img src="emotions/Em1/3.png" width="20"></td>
    <td>Estoy haciendo la tarea</td>
     <td><input type="checkbox"></td>
  </tr>
</table>

		</div>	

		<div  class="div" id="form_register">
			<table width="200">
  <tr>
    <td><img src="emotions/Em1/3.png" width="20"></td>
     <td>Estoy haciendo la tarea</td>
     <td><input type="checkbox"></td>
     </tr>
  </tr>
  <tr>
    <td><img src="emotions/Em1/3.png" width="20"></td>
     <td>Estoy haciendo la tarea</td>
      <td><input type="checkbox"></td>
  </tr>
  <tr>
    <td><img src="emotions/Em1/3.png" width="20"></td>
     <td>Estoy haciendo la tarea</td>
      <td><input type="checkbox"></td>
  </tr>
  <tr>
    <td><img src="emotions/Em1/3.png" width="20"></td>
   <td>Estoy haciendo la tarea</td>
    <td><input type="checkbox"></td>
  </tr>
  <tr>
    <td><img src="emotions/Em1/3.png" width="20"></td>
    <td>Estoy haciendo la tarea</td>
     <td><input type="checkbox"></td>
  </tr>
</table>
		</div>	
	</div></div></div>
  </div>
<div id="container_saludos">
<div style="font-size: 1.5rem; font-weight: 200;line-height: 1.1;margin-top:15px; margin-left:15px;"><b>
¡<span id="time"></span> <?php echo $dadosUser['nome'];?>!</b></div>
</div>
<?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` != ?");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$nome=$row['nome'];
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$pais = $row['pais'];
					$telefono = $row['telefono'];
					$blocks = explode(',', $row['blocks']);
					$agora = date('Y-m-d H:i:s');
					$id =$row['id'];
					if(!in_array($_SESSION['id_user'], $blocks)){
						$status = 'on';
						if($agora >= $row['limite']){
							$status = 'off';
						}
	 ?>
<div id="container_publicaciones">
<script>
$(document).ready(function() {
   $('#pop<?php echo $id;?>').click(function(){
	$('#bubble<?php echo $id;?>').toggle();
		
	});
});
</script>
<span class="imgSmall"><?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" width="60"  height="60" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" width="60"  height="60" />
 <?php }?>
<?php }else{ ?>
 <img src="fotos/<?php echo $foto;?>" class="foto" width="60"  height="60" />           
 <?php }?></span>
 <script>
 $(document).ready(function(e) {
 $("#nom_user<?php echo $id;?>").mouseover(function(){
$('#search-bubblelp<?php echo $id;?>').css('display','block');
})
$("#nom_user<?php echo $id;?>").mouseout(function(){
$('#search-bubblelp<?php echo $id;?>').css('display','none');
})

 $("#search-bubblelp<?php echo $id;?>").mouseover(function(){
$('#search-bubblelp<?php echo $id;?>').css('display','block');
})
$("#search-bubblelp<?php echo $id;?>").mouseout(function(){
$('#search-bubblelp<?php echo $id;?>').css('display','none');
})
})
</script>

<style>
.search-bubblelp {
    position: absolute;
    z-index: 1;
}
.search-bubble-innardslp {
    background:linear-gradient(to bottom,#fff, #eceeef 150%);
    border-radius: 2px;
    padding: 4px;
    text-align: left;
    width:400px;
	height:115px;
}
.search-bubble-innardslp::before {
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
.search-bubble-innardslp.above::after {
    bottom: -7px;
    top: auto;
    transform: rotate(-135deg);
}
.search-bubble-innardslp::after {
    background:linear-gradient(to bottom,#fff, #eceeef 150%);
    border: 1px solid #ccc;
    border-bottom-color: transparent;
    border-right-color: transparent;
    content: '';
    height: 12px;
    left: 53px;
    position: absolute;
    top: -7px;
    transform: rotate(45deg);
    width: 12px;
    z-index: -1;
}
</style>
<div class="search-bubblelp" id="search-bubblelp<?php echo $id;?>" style="left: 53px;top: -110px;display:none;"><div class="search-bubble-innardslp above">
<div class="" align="left">
<div style="float:left; margin-right:6px;">
<?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" width="105"  height="105" />
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" width="105"  height="105" />
 <?php }?>
<?php }else{ ?>
 <img src="fotos/<?php echo $foto;?>" class="foto" width="105"  height="105" />           
 <?php }?>         
             </div> <!--Colocamos la foto Recuperada de la bd -->
             <script>
 $(document).ready(function() {
 $('#user_publi<?php echo $id;?>').click(function(e){
	  $('.search-bubblev').fadeIn();
	$('#cont').load('user.php?id=<?php echo $id;?>',function(){
		$('.search-bubblev').fadeOut();
	});
	 });
});
</script>
<div style="margin-center:5px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;text-transform:capitalize;"><span class="icon-user"></span><a href="javascript:void(0);" id="user_publi<?php echo $id;?>"><?php echo utf8_encode($nome.' '.$row['apellidos']);?></a></div> <!--Recuperamos el nombre recuperado de la bd -->
<div style="margin-center:5px;margin-top:-5px;"><span class="icon-flag"></span><?php echo $pais;?></div>
<div style="margin-center:5px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;text-transform:capitalize;"><span class="icon-phone"></span><?php echo $telefono;?></div> <!--Recuperamos el nombre recuperado de la bd -->
<div style="margin-center:5px;margin-top:-5px;"><?php if($sexo=='Hombre'){?>
<span class="icon-man"></span><?php }else if($sexo=='Mujer'){ ?><span class="icon-woman"></span><?php }?><?php echo $sexo;?></div>
<div style="margin-center:5px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;text-transform:capitalize;"><span class="icon-users"></span>351 Amigos (34 En Comun)</div>
</div>

 </div></div>
<span id="nom_user<?php echo $id;?>" style="cursor:pointer;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;text-transform:capitalize;color:#0275d8;"><b><?php echo utf8_encode($nome.' '.$row['apellidos']);?></b></span>
<div style="float:right;padding-top:-15px; width:20px; border:0px solid #ccc;"><a href="#" id="pop<?php echo $id;?>"><b>...</b></a></div> <div class="search-bubble" id="bubble<?php echo $id;?>" style="left: 426px; top: 42px;float:right;display:none;"><div class="search-bubble-innards">
<div><?php echo $nome;?></div>
<div><a href="javascript:void(0);">Guardar Publicacion</a></div>
<div><a href="javascript:void(0);">Denunciar</a></div>
<div><a href="javascript:void(0);">Guardar Publicacion</a></div>
<div><a href="javascript:void(0);">Denunciar</a></div>
<div><a href="javascript:void(0);">Guardar Publicacion</a></div>
<div><a href="javascript:void(0);">Denunciar</a></div>
<div><a href="javascript:void(0);">Guardar Publicacion</a></div>
<div><a href="javascript:void(0);">Denunciar</a></div>
</div></div>
<div style="color:#575757;font-size:12px;text-transform:capitalize;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">16 De Diciembre del 2017</div>
<div id="publicome">Hola a todos bienvenidos a social netword</div>
<br>
<div id="imag" style="display:block;"><?php if($foto==''){?>
<?php if($sexo=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" id="p_images"/>
<?php }else if($sexo=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" id="p_images" />
 <?php }?>
<?php }else{ ?>
<img src="fotos/<?php echo $foto;?>" border="0" id="p_images"/>        
 <?php }?></div>
<span class="meg"></span>
<hr style="">
<div><table width="580" style="margin-top:-15px;" cellspacing="1" border="0" cellpadding="1">
  <tr>
    <th scope="col"><center><a href="#" style="color:#0275d8;font-family:Tahoma, arial; font-size:13px;">Me gusta</a></center></th>
    <th scope="col"><center><a href="#" style="color:#0275d8;font-family:Tahoma, arial; font-size:13px;">Comentarios</a></center></th>
    <th scope="col"><center><a href="#" style="color:#0275d8;font-family:Tahoma, arial; font-size:13px;">Compartir</a></center></th>
  </tr>
</table>
</div>
<script>
$(document).ready(setInterval(function() {
   var te<?php echo $id;?>=$('#te<?php echo $id;?>').val();
	if(te<?php echo $id;?>!=''){
		$('#basic-addon2<?php echo $id;?>').css('display','block');
	}else{
		$('#basic-addon2<?php echo $id;?>').css('display','none');
	}
}),1000);
</script>

<hr style="margin-top:5px;">
<div class="input-group"><div class="imgSmall"><?php if($fot==''){?>
<?php if($sex=='Hombre'){?>
<img src="material/Hombre.jpg" class="foto" width="60"  height="60" />
<?php }else if($sex=='Mujer'){ ?>
<img src="material/Mujer.jpg" class="foto" width="60"  height="60" />
 <?php }?>
<?php }else{ ?>
 <img src="fotos/<?php echo $fot;?>" class="foto" width="60"  height="60" />           
 <?php }?></div>
<span  class="input-group-addon" style="height:30px; margin-top:10px;cursor:pointer;" id="<?php echo $id;?>basic-addon2" style="height:30px;display:block;"><img src="emotions/Em1/1.png" name="emt<?php echo $id;?>" width="25" id="emt<?php echo $id;?>"></span>

<input type="text" id="te<?php echo $id;?>" style="margin-top:10px;width:500px;height:30px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;border:1px solid #ccc;" placeholder="Comentar Publicacion" class="" >
 <span  class="input-group-addon" style="height:30px; margin-top:10px; border-right:1px solid #ccc;border-left:0px; border-radius:0px;" id="basic-addon2<?php echo $id;?>" style="height:30px;display:none;"><span class="icon-redo2"></span></span> 

  <script>
$(document).ready(function(){
$('.emoticon<?php echo $id;?>').click(function(){
var textarea_val = $('#te<?php echo $id;?>').val();
var emoticon_val = $(this).attr('value');
$('#te<?php echo $id;?>').val(textarea_val + ' ' + emoticon_val);
})
$('#basic-addon2<?php echo $id;?>').click(function(){
	var com=$('#te<?php echo $id;?>').val();
alert(com);
})
})
</script>
<style>
#p_images{
	width:100%;
	height:100%;
}

.search-bubble-innardsq {
    background: -webkit-linear-gradient(rgba(255, 248, 172, 0.9), rgba(255, 243, 128, 0.9));
    border-radius: 2px;
    width: 535px;
	height:85px;
	max-height:85px;
	overflow:auto;
}
.search-bubble-innardsq::before {
    border: 1px solid rgb(220, 198, 72);
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}.search-bubble-innardsq::after {
    background: -webkit-linear-gradient(-45deg, rgb(251, 255, 181), rgb(255, 248, 172) 50%, rgba(255, 248, 172, 0));
    border: 1px solid rgb(220, 198, 72);
    border-bottom-color: transparent;
    border-right-color: transparent;
    content: '';
    height: 12px;
    left: 59px;
    position: absolute;
    top: -7px;
    transform: rotate(45deg);
    width: 12px;
    z-index: -1;
}.search-bubble-innardsq::before {
    border: 1px solid rgb(220, 198, 72);
    border-radius: 2px;
    bottom: -1px;
    content: '';
    left: -1px;
    position: absolute;
    right: -1px;
    top: -1px;
    z-index: -2;
}.search-bubble-innardsq::after {
    background: -webkit-linear-gradient(-45deg, rgb(251, 255, 181), rgb(255, 248, 172) 50%, rgba(255, 248, 172, 0));
    border: 1px solid rgb(220, 198, 72);
    border-bottom-color: transparent;
    border-right-color: transparent;
    content: '';
    height: 12px;
    left: 19px;
    position: absolute;
    top: -7px;
    transform: rotate(45deg);
    width: 12px;
    z-index: -1;
}
.search-bubbleq {
    left: 0;
    position: absolute;
    top: -1000px;
    z-index: 1;
}
.search-bubble-innardsq table{float:left;}
.search-bubble-innardsq::-webkit-scrollbar{width:5px;}
.search-bubble-innardsq::-webkit-scrollbar-track{background:linear-gradient(-45deg, rgb(251, 255, 181), rgb(255, 248, 172) 50%, rgba(255, 248, 1)); border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
.search-bubble-innardsq::-webkit-scrollbar-thumb{background-color:#069;}
.search-bubble-innardsq::-webkit-scrollbar-thumb:hover{background-color:#069;}
</style>
<div class="search-bubbleq" id="search-bubbleq<?php echo $id;?>" style="display:none;left: 45px; top: 48px;"><div class="search-bubble-innardsq" style="padding:3px;"><table width="auto" cellspacing="1" style="" cellpadding="1">
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0); padding:0px; display:inline-block;  border:1px;"  value=":)"><img src="emotions/Em1/1.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>"  style="background-color: rgba(0, 0, 0, 0);padding:0px;display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/2.png" width="25"></button> </td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px;display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/3.png" width="25"></button> </td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px;display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/4.png" width="25"></button> </td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/5.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block;border:0px;" value=":)"><img src="emotions/Em1/6.png" width="25"></button> </td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px;display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/7.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/8.png" width="25"></button>  </td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/9.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/10.png" width="25"></button> </td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/11.png" width="25"></button> </td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;"  value=":)"><img src="emotions/Em1/12.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/13.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/14.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0); padding:0px; display:inline-block;border:0px;" value=":)"><img src="emotions/Em1/15.png" width="25"></button> </td>
    </tr>
    <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/16.png" width="25"></button> </td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/17.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/18.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/19.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/20.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/21.png" width="25"></td>
 <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/22.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/23.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/24.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/25.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/26.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/27.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/28.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/29.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/30.png" width="25"></td>
    </tr>
<tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/31.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/32.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/33.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/34.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/35.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/36.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/37.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/38.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/39.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/40.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/41.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/42.png" width="25"></td>
  <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/43.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/44.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/45.png" width="25"></td>
     </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/46.png" width="25"></td>
   <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/47.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/48.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/49.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/50.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/51.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/52.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/53.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/54.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/55.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/56.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/57.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/58.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/59.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/60.png" width="25"></td>
    </tr>
    <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/61.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/62.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/63.png" width="25"></td>
 <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/64.png" width="25"></td>
  <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/65.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/66.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/67.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/68.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/69.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/70.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/71.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/72.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/73.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/74.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/75.png" width="25"></td>
      </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/76.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/77.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/78.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/79.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/80.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/81.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/82.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/83.png" width="25"></td>
  <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/84.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/85.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/86.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/87.png" width="25"></td>
   <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/88.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/89.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/90.png" width="25"></button></td>
     </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/91.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/92.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/93.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/94.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/95.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/96.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/97.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/98.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/99.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/100.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/101.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/102.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/103.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/104.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/105.png" width="25"></td>
  </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/106.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/107.png" width="25"></td>
   <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/108.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/109.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/110.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/111.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/112.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/113.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/114.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/115.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/116.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/117.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/118.png" width="25"></button></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/119.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/120.png" width="25"></td>
    </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/121.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/122.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/123.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/124.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/125.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/126.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/127.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/128.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/129.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/130.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/131.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/132.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/133.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/134.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/135.png" width="25"></td>
      </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/136.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/137.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/138.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/139.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/140.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/141.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/142.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/143.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/144.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/145.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/146.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/147.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/148.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/149.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/150.png" width="25"></td>
      </tr>
  <tr>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/151.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/152.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/153.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/154.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/155.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/156.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/157.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/158.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/159.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/160.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/161.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/162.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/163.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/164.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/165.png" width="25"></td>
        </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/166.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/167.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/168.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/169.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/170.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/171.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/172.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/173.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/174.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/175.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/176.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/177.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/178.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/179.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/180.png" width="25"></td>
      </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/181.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/182.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/183.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/184.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/185.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/186.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/187.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/188.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/189.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/190.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/191.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/192.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/193.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/194.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/195.png" width="25"></td>
      </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/196.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/197.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/198.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/199.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/200.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/201.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/202.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/203.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/204.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/205.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/206.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/207.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/208.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/209.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/210.png" width="25"></td>
      </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/211.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/212.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/213.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/214.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/215.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/216.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/217.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/218.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/219.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/220.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/221.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/222.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/223.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/224.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/225.png" width="25"></td>
      </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/226.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/227.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/228.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/229.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/230.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/231.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/232.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/233.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/234.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/235.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/236.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/237.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/238.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/239.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/240.png" width="25"></td>
      </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/241.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/242.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/243.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/244.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/245.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/246.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/247.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/248.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/249.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/250.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/251.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/252.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/253.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/254.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/255.png" width="25"></td>
      </tr>
  <tr>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/256.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/257.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/258.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/259.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/260.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/261.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/262.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/263.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/264.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/265.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/266.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/267.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/268.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/268.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/269.png" width="25"></td>
      </tr>
  <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/270.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/271.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/272.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/273.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/274.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/275.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/276.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/277.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/278.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/279.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/280.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/281.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/282.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/283.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/284.png" width="25"></td>
      </tr>
  <tr>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/285.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/286.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/287.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/288.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/289.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/290.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/291.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/292.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/293.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/294.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/295.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/296.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/297.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/298.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/299.png" width="25"></td>
      </tr>
  <tr>
  <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/300.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/301.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/302.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/303.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/304.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/305.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/306.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/307.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/308.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/309.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/310.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/311.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/312.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/313.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/314.png" width="25"></td>
      </tr>
  <tr>
   <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/315.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/316.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/317.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/318.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/319.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/320.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/321.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/322.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/323.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/324.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/325.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/326.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/327.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/328.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/329.png" width="25"></td>
      </tr>
  <tr>
   <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/330.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/331.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/332.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/333.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/334.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/335.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/336.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/337.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/338.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/339.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/340.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/341.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/342.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/343.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/344.png" width="25"></td>
      </tr>
  <tr>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/345.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/346.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/347.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/348.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/349.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/350.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/351.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/352.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/354.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/355.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/356.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/357.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/358.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/359.png" width="25"></td>
    </tr>
    <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/360.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/361.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/362.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/363.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/364.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/365.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/366.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/367.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/368.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/369.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/370.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/371.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/372.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/373.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/374.png" width="25"></td>
      </tr>
    <tr>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/375.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/376.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/377.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/378.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/379.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/380.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/381.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/382.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/383.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/384.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/385.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/386.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/387.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/388.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/389.png" width="25"></td>
        </tr>
    <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/390.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/391.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/392.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/393.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/394.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/395.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/396.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/397.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/398.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/399.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/400.png" width="25"></td>
       </tr>
    <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/401.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/402.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/403.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/404.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/405.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/406.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/407.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/408.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/409.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/410.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/411.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/412.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/413.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/414.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/415.png" width="25"></td>
       </tr>
    <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/416.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/417.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/418.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/419.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/420.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/421.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/422.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/423.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/424.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/425.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/426.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/427.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/428.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/429.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/430.png" width="25"></td>
       </tr>
    <tr>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/431.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/432.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/433.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/434.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/435.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/436.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/437.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/438.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/439.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/440.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/441.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/442.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/443.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/444.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/445.png" width="25"></td>
         </tr>
    <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/446.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/447.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/448.png" width="25"></td>
     <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/449.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/450.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/451.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/452.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/453.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/454.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/455.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/456.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/457.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/458.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/459.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/460.png" width="25"></td>   
    </tr>
    <tr>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/461.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/462.png" width="25"></td>
   <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/463.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/464.png" width="25"></td>
      <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/465.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/466.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/467.png" width="25"></td>
    <td><button class="emoticon<?php echo $id;?>" style="background-color: rgba(0, 0, 0, 0);padding:0px; display:inline-block; border:0px;" value=":)"><img src="emotions/Em1/468.png" width="25"></td>
     </tr>
  </table></div></div>

</div> 
</div><script>
$(document).ready(function(){
 $('#<?php echo $id;?>basic-addon2').click(function(){
	$('#search-bubbleq<?php echo $id;?>').toggle();
	});
})
</script>
<?php }}?>
</div>
<span class="user_online" id="<?php echo $dadosUser['id'];?> " ></span>
		
   <aside id="users_online4" style="background-color:#FFF; padding:0px;">
    <span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin-left:5px;">Publicaciones</span> <span style="float:right;margin-right:5px;"><a href="#"><b>...</b></a></span>
   <div style="float:left;">
   <table width="auto" cellspacing="1" cellpadding="1">
  <tr>
    <th scope="col"> <div class="imgSmall" style="margin-left:20px;cursor:pointer;"><img src="material/musica.jpg" id='musica' width="60" height="60" border="0" /></div></th>
    <th scope="col"> <div class="imgSmall" style="margin-left:20px;cursor:pointer;"><img src="material/fotos.jpg" id="fotos"  width="60" height="60" border="0" /></div></th>
    <th scope="col"><div class="imgSmall" style="margin-left:20px;cursor:pointer;"><img src="material/video.jpg" id="videos" width="60" height="60" border="0" /></div></th>
  </tr>
   <tr>
    <th scope="col"><span  style="margin-left:20px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;cursor:pointer;" id="musica">Musica</span></th>
    <th scope="col"><span id="fotos"  style="margin-left:20px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;cursor:pointer;">Fotos</span></th>
    <th scope="col"><span  id="videos" style="margin-left:20px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;cursor:pointer;">Videos</span></th>
  </tr>
</table>
 </div>
   </aside>
    <aside id="users_online5" style="background-color:#FFF; border-left:1px solid #ccc;">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1" style="width:30px;background-color: #fff;height:32px;border:0px solid #FFF;"><span class="icon-user"></span></span>
  <input type="text" class="form-control busca1" style="height:30px; margin-top:1px; width:223px; font-size:14px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; color:#000; border:0px;" id="caja_busqueda1" name="clave1" placeholder="Buscar" aria-describedby="basic-addon1">
</div>
   </aside>
   <aside id="users_online">
   
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
if(a.length<18){
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
	</aside>

<aside id="chats">
<style>
button{
    border: 1px solid #ccc;
    height: 25px;
    border-radius: 2px;
    margin-left: 10px;
    font-family: trebuchet MS, Arial, Helvetica, sans-serif;
    margin-top: -19px;
}

#dialogoverlay{ display: none; position: fixed;     top: 0px; left: 0px; background: rgba(70, 74, 76, 0.47); width: 100%;z-index: 10;} #dialogbox{ display: none; position: fixed; background: #f9f9f9; border-radius:2px; width:840px; z-index: 10; box-shadow: 0 4px 23px 5px rgba(0, 0, 0, 0.2), 0 2px 6px rgba(0,0,0,0.15);} #dialogbox > div{ background:#f9f9f9; margin:8px; } #dialogbox > div > #dialogboxheadd{padding:10px;}#dialogboxhead{ background: #f9f9f9; font-size:19px; padding:10px; color:#000;height:400px; max-height:400px; /*overflow:auto;*/ } #dialogbox > div > #dialogboxbody{ background:#f9f9f9; padding:20px; color:#000; } #dialogbox > div > #dialogboxfoot{ background: #f9f9f9; padding:10px; text-align:right; }
    </style><script>
    function CustomAlert(){ 
	this.render = function(dialog){ 
	var winW = window.innerWidth;
	 var winH = window.innerHeight;
	  var dialogoverlay = document.getElementById('dialogoverlay');
	   var dialogbox = document.getElementById('dialogbox');
	    dialogoverlay.style.display = "block";
		 dialogoverlay.style.height = winH+"px"; 
		 dialogbox.style.left ="270px";
		  dialogbox.style.top = "80px";
		   dialogbox.style.display = "block";
		   document.getElementById('dialogboxheadd').innerHTML = "<center>Completar Informacion</center><span class='icon-cross' onclick='Alert.x()' style='float: right;font-size: 12px;cursor:pointer;margin-top: -30px;'></span>";
/*document.getElementById('dialogboxhead').innerHTML = "<table width='512'><tr><td>fdgdfg df</td><td>gfhfgh</td><td>gfhfghf</td></tr><tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr><tr><td>fdgdfg df</td><td>gfhfgh</td><td>gfhfghf</td></tr><tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control' id='text'></td></tr><tr><td>fdgdfg df</td><td>gfhfgh</td><td>gfhfghf</td></tr><tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>";*/ 
		   document.getElementById('dialogboxbody').innerHTML = '';
		    document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Alert.ok()" class="exceptions-list-button">Omitir</button><button onclick="Alert.ok()" class="exceptions-list-button">Guardar</button>'; 
		   }
		   this.x = function(){
			  document.getElementById('dialogbox').style.display = "none";
		    document.getElementById('dialogoverlay').style.display = "none";
		   }
		    this.ok = function(){
				 var text=$('#text').val();
		   if(text==''){
			  document.getElementById('dialogbox').style.display = "block";
		    document.getElementById('dialogoverlay').style.display = "block";
		   } else{
		   document.getElementById('dialogbox').style.display = "none";
		    document.getElementById('dialogoverlay').style.display = "none";
		   }
			} 
			}
			 var Alert = new CustomAlert();
			 </script> 
 <div id="dialogoverlay"></div> <div id="dialogbox"> <div> <div id="dialogboxheadd"></div><div id="dialogboxhead">
   	<link rel="stylesheet" href="flexslider.css" type="text/css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="js/jquery.flexslider.js"></script>
	<script>
  $(window).load(function() {
    $('.flexslider').flexslider({
    	touch: true,
    	pauseOnAction: false,
    	pauseOnHover: false,
    });
  });
</script>
	<div class="flexslider">
		<ul class="slides">
        <?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE foto != ''");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$id = $row['id'];
			?>
			<li>
				<img src="fotos/<?php echo $foto;?>" height="400" width="500" alt="">
			</li>
            <?php } ?>
		</ul>
	</div></div> <div id="dialogboxbody"></div> <div id="dialogboxfoot"></div> </div> </div><button onclick="Alert.render('You look very pretty today.')">Custom Alert</button> 
    
    
    <style>
button{
    border: 1px solid #ccc;
    height: 25px;
    border-radius: 2px;
    margin-left: 10px;
    font-family: trebuchet MS, Arial, Helvetica, sans-serif;
    margin-top: -19px;
}

#dialogoverlayy{ display: none; position: fixed;     top: 0px; left: 0px; background: rgba(70, 74, 76, 0.47); width: 100%;z-index: 10;} #dialogboxx{ display: none; position: fixed; background: #f9f9f9; border-radius:2px; width:840px; z-index: 10; box-shadow: 0 4px 23px 5px rgba(0, 0, 0, 0.2), 0 2px 6px rgba(0,0,0,0.15);} #dialogboxx > div{ background:#f9f9f9; margin:8px; } #dialogboxx > div > #dialogboxheaddd{padding:10px;}#dialogboxheadds{ background: #f9f9f9; font-size:19px; padding:10px; color:#000;height:400px; max-height:400px; /*overflow:auto;*/ } #dialogboxx > div > #dialogboxbodyy{ background:#f9f9f9; padding:20px; color:#000; } #dialogboxx > div > #dialogboxfoott{ background: #f9f9f9; padding:10px; text-align:right; }
    </style><script>
    function CustomAlertt(){ 
	this.renderr = function(dialogg){ 
	var winWw = window.innerWidth;
	 var winHh = window.innerHeight;
	  var dialogoverlayy = document.getElementById('dialogoverlayy');
	   var dialogboxx = document.getElementById('dialogboxx');
	    dialogoverlayy.style.display = "block";
		 dialogoverlayy.style.height = winHh+"px"; 
		 dialogboxx.style.left ="270px";
		  dialogboxx.style.top = "80px";
		   dialogboxx.style.display = "block";
		   document.getElementById('dialogboxheaddd').innerHTML = "<center>Completar Informacion</center><span class='icon-cross' onclick='Alertt.xx()' style='float: right;font-size: 12px;cursor:pointer;margin-top: -30px;'></span>";
/*document.getElementById('dialogboxhead').innerHTML = "<table width='512'><tr><td>fdgdfg df</td><td>gfhfgh</td><td>gfhfghf</td></tr><tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr><tr><td>fdgdfg df</td><td>gfhfgh</td><td>gfhfghf</td></tr><tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control' id='text'></td></tr><tr><td>fdgdfg df</td><td>gfhfgh</td><td>gfhfghf</td></tr><tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>";*/ 
		   document.getElementById('dialogboxbodyy').innerHTML = "";
		    document.getElementById('dialogboxfoott').innerHTML = '<button onclick="Alertt.okk()" class="exceptions-list-button">Omitir</button><button onclick="Alertt.okk()" class="exceptions-list-button">Guardar</button>'; 
var splitDados = dialogg.split('_');
		var id_image = Number(splitDados[1]);
		$('#li'+id_image+'').addClass('img');
		var Urlimage = splitDados[0];
		
			$('#li'+id_image+'').attr('id', 'li'+id_image+'').fadeIn();
			$('.slider .img .conttent').attr('id','contcomentfoto_'+id_image+'');
		   }
		   this.xx = function(){
			     $('.li_id').removeClass('img')
			    $('.li_id').fadeOut();
			  document.getElementById('dialogboxx').style.display = "none";
		    document.getElementById('dialogoverlayy').style.display = "none";
		   }
		    this.okk = function(){
				 var text=$('#text').val();
		   if(text==''){
			  document.getElementById('dialogboxx').style.display = "block";
		    document.getElementById('dialogoverlayy').style.display = "block";
		   } else{
			     $('.li_id').removeClass('img')
			    $('.li_id').fadeOut();
		   document.getElementById('dialogboxx').style.display = "none";
		    document.getElementById('dialogoverlayy').style.display = "none";
		   }
			} 
			}
			 var Alertt = new CustomAlertt();
			 </script> 
 <div id="dialogoverlayy"></div> <div id="dialogboxx"> <div> <div id="dialogboxheaddd"></div><div id="dialogboxheadds">
   <style>

#ul,ol{
	list-style: none;
}
.slideshow{
	width: 500px;
	position: relative;
}

.slider #li, #ul{
	width: 500px;
}

.slider #li{
	overflow: hidden;
}

.slider #li img{
	width: 500px;
}

.slider .caption{
	position: absolute;
	width: 500px;
	height: 405px;
	top: 0;
	left: 0;
	padding: 15px 50px;

	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;

	text-align: center;
	color: #fff;
	z-index: 1;
}

.slider .caption h1{
	font-size: 50px;
}

.slider .caption p{
	margin-top: 10px;
	font-size: 20px;
}

.left, .right{
	position: absolute;
	top: 0;
	height: 100%;

	display: flex;
	align-items: center;

	color: #fff;
	font-size: 35px;
	cursor: pointer;
	z-index: 2;
}

.left{
	left: 10px;
}

.right{
	right: 10px;
}


@media screen and (max-width: 600px){
	.slider .caption p{
		display: none;
	}

	.slider .caption h1{
		font-size: 35px;
	}

	.left, .right{
		font-size: 30px;
	}

	.slider #li img{
		width: 600px;
	}

	.pagination{
		display: none;
	}
}
    </style>
	<script>
    $(document).ready(function(){
	var imgItems = $('.slider li').length; // Numero de Slides
	var imgPos = 1;
	$('.slider li').hide().removeClass('img'); // Ocultanos todos los slides
	$('.slider li:first').fadeOut(); // Mostramos el primer slide
	$('.right span').click(nextSlider);
	$('.left span').click(prevSlider);

	function nextSlider(){
	if( imgPos >= imgItems){imgPos = 1;} 
		else {imgPos++;}
		$('.slider li').hide().removeClass('img'); // Ocultamos todos los slides
		$('.slider li:nth-child('+ imgPos +')').fadeIn().addClass('img'); // Mostramos el Slide seleccionado
	}

	function prevSlider(){
		if( imgPos <= 1){imgPos = imgItems;} 
		else {imgPos--;}

		$('.slider li').hide().removeClass('img'); // Ocultamos todos los slides
		$('.slider li:nth-child('+ imgPos +')').fadeIn().addClass('img'); // Mostramos el Slide seleccionado
		
	}

});
    </script>

	<div class="slideshow">
		<ul class="slider" id="ul">
        <?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` != ?");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					$sexox = $row['sexo'];
					$idd = $row['id'];
	 ?>
			<li id="li<?php echo $idd;?>" class="li_id">
             <?php if($foto!=""){ ?>
				<img src="fotos/<?php echo $foto; ?>" width="500" id="<?php echo $idd;?>" class="img_gal" height="400" alt="">
                 <?php }else if($sexox=="Hombre"){ ?>
                 <img src="fotos/Hombre.jpg" width="500"  id="<?php echo $idd;?>" height="400" alt="">
                 <?php } else{?>
                   <img src="fotos/Mujer.jpg" width="500"  id="<?php echo $idd;?>" height="400" alt="">
                 <?php } ?>
                 <script>

$(document).ready(function(){
	var id_imag=$('.slider .img img').attr('id');
$('#contcomentfoto_<?php echo $idd;?>').load('slider_foto.php?id=<?php echo $idd;?>');
});               </script>
                <div>
                <div class="cargando" style="display:none;">Cargando...</div>
                 <div id="contcomentfoto_<?php echo $idd;?>" class="conttent" style="position: absolute;left: 510px;height: 400px;padding: 5px; top: 0px;border: 1px solid #ccc;width: 300px;"></div>
                 <div class="input-group" style="position: absolute;left: 510px;height:auto; background-color:#ebebeb;padding: 5px; top: 360px;border: 1px solid #ccc;width: 300px;">
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
                 </div>
			</li>
            <?php } ?>
		</ul>

		<div class="left">
			<span class="fa fa-chevron-left"></span>
		</div>

		<div class="right">
			<span class="fa fa-chevron-right"></span>
		</div>


</div></div>
<div id="dialogboxbodyy"></div> <div id="dialogboxfoott"></div> </div> </div><button onclick="Alertt.renderr('You look very pretty today.')">Custom Alert</button> 



<style>
#dialogoverlayz{ display: none; position: fixed;     top: 0px; left: 0px; background: rgba(70, 74, 76, 0.47); width: 100%;z-index: 10;} #dialogboxz{ display: none; position: fixed; background: #f9f9f9; border-radius:2px; width:840px; z-index: 10; box-shadow: 0 4px 23px 5px rgba(0, 0, 0, 0.2), 0 2px 6px rgba(0,0,0,0.15);} #dialogboxz > div{ background:#f9f9f9; margin:8px; } #dialogboxz > div > #dialogboxheaddz{padding:10px;}#dialogboxheadz{ background: #f9f9f9; font-size:19px; padding:10px; color:#000;height:400px; max-height:400px; /*overflow:auto;*/ } #dialogboxz > div > #dialogboxbodyz{ background:#f9f9f9; padding:20px; color:#000; } #dialogbox > div > #dialogboxfootz{ background: #f9f9f9; padding:10px; text-align:right; }
    </style><script>
    function CustomAlertz(){ 
	this.renderz = function(dialogz){ 
	var winWz = window.innerWidth;
	 var winHz = window.innerHeight;
	  var dialogoverlayz = document.getElementById('dialogoverlayz');
	   var dialogboxz = document.getElementById('dialogboxz');
	    dialogoverlayz.style.display = "block";
		 dialogoverlayz.style.height = winHz+"px"; 
		 dialogboxz.style.left ="270px";
		  dialogboxz.style.top = "80px";
		   dialogboxz.style.display = "block";
		   document.getElementById('dialogboxheaddz').innerHTML = "<center>Completar Informacion</center><span class='icon-cross' onclick='Alertz.xz();' style='float: right;font-size: 12px;cursor:pointer;margin-top: -30px;'></span>";
/*document.getElementById('dialogboxhead').innerHTML = "<table width='512'><tr><td>fdgdfg df</td><td>gfhfgh</td><td>gfhfghf</td></tr><tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr><tr><td>fdgdfg df</td><td>gfhfgh</td><td>gfhfghf</td></tr><tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control' id='text'></td></tr><tr><td>fdgdfg df</td><td>gfhfgh</td><td>gfhfghf</td></tr><tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>";*/ 
		   document.getElementById('dialogboxbodyz').innerHTML = dialogz;
		    document.getElementById('dialogboxfootz').innerHTML = '<button onclick="Alertz.okz();" class="exceptions-list-button">Omitir</button><button class="exceptions-list-button">Guardar</button>'; 
		   }
		   this.xz = function(){
			  document.getElementById('dialogboxz').style.display = "none";
		    document.getElementById('dialogoverlayz').style.display = "none";
			onclick='video.pause()';
		   }
		    this.okz = function(){
		   document.getElementById('dialogboxz').style.display = "none";
		    document.getElementById('dialogoverlayz').style.display = "none";
			} 
			}
			 var Alertz = new CustomAlertz();
			 </script> 
 <div id="dialogoverlayz"></div> <div id="dialogboxz"> <div> <div id="dialogboxheaddz"></div><div id="dialogboxheadz">
 
<script>
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("file1").files[0];
	//alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "upload4.php");
	ajax.send(formdata);
}
function progressHandler(event){
	//_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
	  $('#est_pub').hide();
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>
<div id="est_pub">
<h3>HTML5 File Upload Progress Bar Tutorial</h3>
<form id="upload_form" enctype="multipart/form-data" method="post">
  <input type="file" name="file1" id="file1" multiple><br>
  <input type="button" value="Upload File" onclick="uploadFile()">
  <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
  </form>
  </div>
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p>
	</div> <div id="dialogboxbodyz"></div> <div id="dialogboxfootz"></div> </div> </div><button onclick="Alertz.renderz('Subir Estados.')">Custom Alert</button> 
			<script type="text/javascript" src="js/functions.js"></script>
		</aside>
</body>
</html>
