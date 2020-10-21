<div id="container_comentar">
<div class="op" style="width:100%; position:relative; border-top-left-radius:5px; border-top-right-radius:5px; border:1px solid #CCC;">
<table border="0" width="100%">
  <tbody><tr>
    <th scope="col" onclick="EventoAlert_coment();" width="34%" height="33" style="border-right:1px solid #CCC;background:#F7F8F9;" class="bor" id="realizar_publi"><div align="center"><a href="javascript:void(0);"><span class="icon-pencil" style="font-size:16px;color:#000;"></span> Realizar Publicacion</a></div></th>
    <th scope="col" width="36%" style="border-right:1px solid #CCC;background:#F7F8F9;" id="album" class=""><div align="center"><a href="javascript:void(0);"><span class="icon-images" style="color:#000;font-size:16px;" id="images"></span> Album De Fotos/Videos</a></div></th>
    <th scope="col" width="40%" style="background:#F7F8F9;" id="video"><div align="center"><a href="javascript:void(0);"><span class="icon-eye" style="font-size:18px;color:#000;"></span> Video En Vivo</a></div></th>
  </tr>
</tbody></table>
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
		var propietario=138;
		$.post("ins.php", {cont_publicacion: cont_publicacion, propietario: propietario},function(){
			var cont_publicacion=$('#cont_publicacion').val('');
			});
		
	})
});
</script>
<div id="come_pub"> 
<div class="search-bubblexb" style="left: 499px;top: 29px;display:none;"><div class="search-bubble-innardsxb"><span class="icon-checkmark"></span> Publicar</div></div>
			<style>
textarea{font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;max-height:64px; height:64px;
 border:0px solid #FFF; padding-left:5px;padding-top:20px; padding-bottom:15px;margin-left:8px; }
</style>

<table width="auto" cellspacing="1" cellpadding="1">
  <tbody><tr>
    <th scope="col"><div class="imgSmall" style="margin:7px;"> <img src="fotos/keyner.jpg" class="foto" width="60" height="60">           
 </div></th>
    <th scope="col"><textarea cols="64" id="cont_publicacion" placeholder="Que estas pensando, Keyner "></textarea></th>
  </tr>
</tbody></table>
</div>



<div id="come_pub2" style="display:none;	"> 
<div class="search-bubblexb" style="left: 499px;top: 29px;display:none;"><div class="search-bubble-innardsxb"><span class="icon-checkmark"></span> Publicar</div></div>
			<style>

textarea{font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;text-height:25px; overflow:3px; height:64px;
 border:0px solid #FFF; padding-left:5px;padding-top:20px; padding-bottom:15px;margin-left:8px; }
</style>

<table width="auto" cellspacing="1" cellpadding="1">
  <tbody><tr>
    <th scope="col"><div class="imgSmall" style="margin:7px;"> <img src="fotos/keyner.jpg" class="foto" width="60" height="60">           
 </div></th>
    <th scope="col"><textarea cols="64" id="cont_publicacion" placeholder="Que estas pensando, Keyner "></textarea></th>
  </tr>
</tbody></table>
</div>
















</div>
<div id="opp" style="width:100%; position:relative; top:0%;">
<table border="0" width="100%">
  <tbody><tr>
    <th scope="col" width="34%" class="a" id="fotoo"> <div style="margin-top: 5px;" align="center"><a href="javascript:void(0);" style="background: #ebebeb;padding: 8px 11px 8px 11px;border-radius: 50px;"><span class="icon-image" style="font-size:16px;color:#009933;"></span> Foto/Video</a></div></th>
    <th scope="col" width="36%" class="a" id="actividad"><div style="margin-top: 5px;" align="center"><a href="javascript:void(0);" id="sent_act" style="background: #ebebeb;padding: 8px 11px 8px 11px;border-radius: 50px;"><img src="emotions/Em1/1.png" width="25"> Sentimiento/Actividad</a></div></th>
    <th scope="col" width="40%" class="a" style="margin-top: 5px;" id="opt"><div align="left"><a href="javascript:void(0);" style="background: #ebebeb;padding: 8px 11px 8px 11px;border-radius: 50px;"><b>...</b></a></div></th>
  </tr>
</tbody></table></div>
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
  <tbody><tr>
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
</tbody></table>
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
  <tbody><tr>
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
</tbody></table>

		</div>	

		<div class="div" id="form_registerr">
			<table width="195">
  <tbody><tr>
    <td><span class="icon-film"></span></td>
     <td><a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Subir video del PC</a></td>
     </tr>
    <tr>
    <td><span class="icon-play"></span></td>
     <td><a href="javascript:void(0);" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Subir video de You Tube</a></td>
     </tr>
</tbody></table>
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
  <tbody><tr>
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
  <tr>
    <td><img src="emotions/Em1/3.png" width="20"></td>
    <td>Estoy haciendo la tarea</td>
     <td><input type="checkbox"></td>
  </tr>
</tbody></table>

		</div>	

		<div class="div" id="form_register">
			<table width="200">
  <tbody><tr>
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
  <tr>
    <td><img src="emotions/Em1/3.png" width="20"></td>
    <td>Estoy haciendo la tarea</td>
     <td><input type="checkbox"></td>
  </tr>
</tbody></table>
		</div>	
	</div></div></div>
  </div>