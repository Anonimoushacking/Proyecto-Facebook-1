// JavaScript Document
$(function(){
	$('#enviar').click(SubirFotos);
	});
	function SubirFotos(){
var archivos = document.getElementById('archivos');
		var archivo = archivos.files;
		
		var archivos = new FormData();
		
		for(i=0; i<archivo.length; i++){
		archivos.append('archivo'+i,archivo[i]);	
		}
		$.ajax({
			url:"subir.php",
			type:'POST',
			contentType:false,
			data:archivos,
			processData:false,
			cache:false
		}).done(function(msg){
			$('#archivos').val('');
			MensajeFinal(msg);
		});
		
}
function actualizar(){
	$('.cont_arch').load('archivos.php');
	}
function MensajeFinal(msg){
$('.mensage').html(msg);
$('.mensage').show('show', function(){
setInterval(actualizar());
});
	}