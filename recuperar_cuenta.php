<br>
<br>
<br>
<br>
<br/>
<br>
<br/>
<br>
<div class="field-container" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:15px; margin-left:-46px;">
						<span id="resull" style="width:552px;"></span>
					</div>
<div class="columns">

<div class="field-container" style="width:100%;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:30px;color:#000;">
						<center><b>Recuperar Cuenta</b></center>
					</div>	
                    <span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:16px;color:#428bca;">Ingrese Su Correo Electronico A Recuperar</span>
                    </div>
               <div class="field-container input-group" id="form-group">
             		<span class="input-group-addon icon-envelop"></span>
			<input class="form-control" id="correo_recuperar" style="width:98.5%;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:14px;" onBlur="correo_recuper(this);" onBlur="correo_recuper(this);" onKeyUp="correo_recuper(this);"   placeholder="Correo Electronico" name="emaill" type="text"/>
		</div>
            <br/>
            <div class="field-container">
				<p></p>	
					<input type="button" id="recuperar_cuenta"  class="btn btn-primary" style="width:98.5%;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:17px;" value="Recuperar Cuenta"> <br/>
                     <br/>
				</div>
                 <script>
				 function correo_recuper(elemento){
				if(elemento.value==''){
				elemento.className='error';
				}else{
					elemento.className='field';
				}
			}
	$(document).ready(function() {
	$('#recuperar_cuenta').click(function(){
      var correo_recuperar = $('#correo_recuperar').val();
      if($.trim(correo_recuperar).length > 0){
        $.ajax({
          url:"recuperar.php",
          method:"POST",
          data:{correo_recuperar:correo_recuperar},
          cache:"false",
          beforeSend:function() {
            $('#recuperar_cuenta').val("Recuperando...");
          },
          success:function(data) {
            $('#recuperar_cuenta').val("Recuperar Cuenta");
            if (data=="1") {
$("#resull").html("<div style='width:552px; color:#000;' class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button>Te Hemos Enviado Un Link De Recuperacion A <b>"+correo_recuperar+"</b>.</div>");
            } else {
				$("#resull").html("<div style='width:552px; color:#000;' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><b>"+correo_recuperar+"</b> No Se Encuentra En El Sistema.</div>");
            }
          }
        });
      };
	})
	})
	</script>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

