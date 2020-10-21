<br>
<br>
<br>
<br>
<br>
<br>
<div class="columns">

<div class="field-container" style="width:100%;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:30px;color:#000;">
						<center><b>Iniciar Sesión</b></center>
					</div>	
                    <br />
                      <br />
                    </div>
                    <div class="field-container input-group" id="form-group">
             		<span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:15px;"><b>Correo Electronico</b></span>
		</div>
               <div class="field-container input-group" id="form-group">
             		<span class="input-group-addon icon-envelop"></span>
			<input class="form-control" id="emaill" style="width:412px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:14px;"  placeholder="Correo Electronico" name="emaill" type="text"/>
		</div>
 <br /> <div class="field-container input-group" id="form-group">
             		<span style="width:420px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:15px;"><b>Contraseña</b></span>
		</div>
             <div class="field-container input-group" id="form-group">
             		<span class="input-group-addon icon-key"></span>
			<input class="form-control" id="passworddd"  style="width:370px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:14px;"  placeholder="Contrase&ntilde;a" name="passworddd" type="password"/>
			<span id="show-hide-passwd" style="width:0px;" action="hide" class="input-group-addon icon-eye"></span>
		</div>
<br />
            <div class="field-container">
					<input type="button" id="loginn"  class="btn btn-primary" style="width:450px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:17px;" value="Iniciar sesión"> <br/>
                     <br/>
				</div>
               <div class="field-container" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:15px; margin-left:0px;">
						<span id="resuls" style="width:443px; color:#000;"></span>
					</div>
<script>
$(document).ready(function(){
	$('#show-hide-passwd').on('click', function(e) {
				e.preventDefault();

				var current = $(this).attr('action');

				if (current == 'hide') {
					$(this).prev().attr('type','text');
					$(this).removeClass('icon-eye').addClass('icon-eye-blocked').attr('action','show');
				}

				if (current == 'show') {
					$(this).prev().attr('type','password');
					$(this).removeClass('icon-eye-blocked').addClass('icon-eye').attr('action','hide');
				}
			})

$('#loginn').click(function(){
      var emaill = $('#emaill').val();
      var passworddd = $('#passworddd').val();
      if($.trim(emaill).length > 0 && $.trim(passworddd).length > 0){
        $.ajax({
          url:"logueame.php",
          method:"POST",
          data:{emaill:emaill, passworddd:passworddd},
          cache:"false",
          beforeSend:function() {
            $('#loginn').val("Conectando...");
          },
          success:function(data) {
            $('#loginn').val("Iniciar Sesion");
            if (data=="1") {

              $(location).attr('href','restringuir.php');
            } else {
              $("#resuls").html("<div id='alrt' style='width:443px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; color:#000;' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>El Email O La Contraseña No Se Encuentra En El Sistema...</div>");
            }
          }
        });
      };
    });
  });

  </script>
  <style>
  
  #alrt{
    color: #000;
	}</style>
  <br />
<br>
<br>
<br>
<br>
<br>
<br>

