 <script>
    $(document).ready(function(){
$('#rep_password').keyup(checkPasswordMatch);
$('#rep_password').on('change',checkPasswordMatch);


});
</script>
<script>
 $(document).ready(function(){
$('#correo').keyup(checkemail);
$('#correo').on('change',checkemail);
})
</script>
    <script>
$(document).ready(function(){
$('#passwordd').keyup(checkPasswordMatch2);
$('#passwordd').on('change',checkPasswordMatch2);
})
function checkemail(){
	$("#coe").fadeIn();
username=document.getElementById("correo").value;
				var exp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				if(exp.test(document.getElementById("correo").value)){
					$("#coe").load("email_seg.php", {username: username});
					var dato=$('#dato').val();
					if(dato=='1'){
						$("#coe").fadeIn();
                    datosCorrectos=false;
					}else{
						
					}
				}
}


function checkPasswordMatch2(){
	var repeatpass=document.getElementById("rep_password").value;
	var repeatclave= repeatpass.length;
	
	if(repeatclave>0){
		var password = $('#passwordd').val();
		var confirmarpassword = $('#rep_password').val();
		if(password != confirmarpassword){
			$("#results").fadeIn();
			$("#results").html("<div id='alerts' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><span class='icon-cross'></span> Contraseñas No Coinciden...</div>");
		}else{
			$("#results").fadeIn();
		$("#results").html("<div id='alerts' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><span class='icon-checkmark'></span> Contraseñas Coinciden...</div>");
		}
	}

}
function checkPasswordMatch(){
		var password = $('#passwordd').val();
		var confirmarpassword = $('#rep_password').val();
		if(password != confirmarpassword){
			$("#results").fadeIn();
			$("#results").html("<div id='alerts' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><span class='icon-cross'></span> Contraseñas No Coinciden...</div>");
		}else{
			$("#results").fadeIn();
		$("#results").html("<div id='alerts' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><span class='icon-checkmark'></span> Contraseñas Coinciden...</div>");
	}
}
</script>
    <script type="text/javascript">
			function revisarnombre_apelli(elemento){
				if(elemento.value==''){
				elemento.className='errorr';
				}else{
					elemento.className='field';
				}
			}
			function revisar(elemento){
				if(elemento.value==''){
				elemento.className='error';
				}else{
					elemento.className='field';
				}
			}
			
			function revisaNumero(elemento){
				if(elemento.value!==''){
					var data = elemento.value;
					if(isNaN(data)){
						elemento.className='error';
					}else{
						elemento.className='field';
					}
				}
			}
			function revisarEmail(elemento){
				if(elemento.value!==''){

					var data = elemento.value;
					var exp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					if(!exp.test(data)){
						elemento.className='error';
					}else{
						elemento.className='field';
					}	
				}
			}

			function revisaNumeroCant(elemento, min){
				if(elemento.value!==''){ 
					var data = elemento.value;
					if(data.length<min || data.length>min){
						elemento.className='error';
					}else{
						elemento.className='field';
					}
				}
			}
function revisaselect(elemento){
				if(elemento.value=='0'){
						elemento.className='fieldds';
					}else{
						elemento.className='fieldd';
					}
			}

			function validar(){
				var datosCorrectos=true;
				var error="";
				if(document.getElementById("nombre").value==""){
					datosCorrectos=false;
					var nombre=document.getElementById("nombre");
					nombre.className='errorr';
				}
				
				if(document.getElementById("telefono").value==""){
					datosCorrectos=false;
					error="\n Debes Poner Un Tenelefono";
				}
				
				if(document.getElementById("apellidos").value==""){
					datosCorrectos=false;
					var apellidos=document.getElementById("apellidos");
					apellidos.className='errorr';
				}
                   if(document.getElementById("correo").value==""){
					datosCorrectos=false;
					var correo=document.getElementById("correo");
					correo.className='error';
				}
				 if(document.getElementById("passwordd").value==""){
					datosCorrectos=false;
					var passwordd=document.getElementById("passwordd");
					passwordd.className='error';
				}
				
				 
				
				 if(document.getElementById("rep_password").value==""){
					datosCorrectos=false;
					var rep_password=document.getElementById("rep_password");
					rep_password.className='error';
				}
			
			
            var passw=$('#passwordd').val();
			var rep_passw=$('#rep_password').val();
			 if(document.getElementById("passwordd").value!=""){
				  if(document.getElementById("rep_password").value!=""){
				if(passw==rep_passw){
				$("#results").hide();	
			}
				  }
			 }
				if(passw!=rep_passw){
					datosCorrectos=false;
				var passwordd=document.getElementById("passwordd");
					passwordd.className='error';
				var rep_password=document.getElementById("rep_password");
					rep_password.className='error';
					$("#results").fadeIn();
					$("#results").html("<div id='alerts' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><span class='icon-cross'></span> Contraseñas No Coinciden...</div>");
			}
				if(document.getElementById("sexo").value=="0"){
					datosCorrectos=false;
					var sexo=document.getElementById("sexo");
					sexo.className='fieldds';
				}
				if(document.getElementById("pais").value=="0"){
					datosCorrectos=false;
					var pais=document.getElementById("pais");
					pais.className='fieldds';
				}
				if(isNaN(document.getElementById("telefono").value)){
					datosCorrectos=false;
					var telefono=document.getElementById("telefono");
					telefono.className='error';
				}
				if((document.getElementById("telefono").value=='')){
					datosCorrectos=false;
					var telefono=document.getElementById("telefono");
					telefono.className='errorr';
				}
				if((document.getElementById("dia").value=='0')){
					datosCorrectos=false;
					var dia=document.getElementById("dia");
					dia.className='fieldds';
				}
				if((document.getElementById("mes").value=='0')){
					datosCorrectos=false;
					var mes=document.getElementById("mes");
					mes.className='fieldds';
				}
				if((document.getElementById("ao").value=='0')){
					datosCorrectos=false;
					var ao=document.getElementById("ao");
					ao.className='fieldds';
				}
				if((document.getElementById("ao").value>'2012')){
					datosCorrectos=false;
					var ao=document.getElementById("ao");
					ao.className='fieldds';
					alert('fecha mala');
				}
				if((document.getElementById("telefono").value.length<10)||(document.getElementById("telefono").value.length>10)){
					datosCorrectos=false;
				}
				
				username=document.getElementById("correo").value;
				var exp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				if(exp.test(document.getElementById("correo").value)){
					$("#coe").load("email_seg.php", {username: username});
					var dato=$('#dato').val();
					if(dato=='1'){
                    datosCorrectos=false;
					$("#coe").fadeIn();
					}else{
$("#coe").hide();
					}
				}
					
				var exp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				if(!exp.test(document.getElementById("correo").value)){
					datosCorrectos=false;
				}

				
				if(!datosCorrectos){
					  $("#resultt").fadeIn();
				$("#resultt").html("<div id='alert' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>Debe Completar Todos Los Campos Correctamente Para Que Su Registro Sea Exitoso...</div>");
				 $("#result").hide();
				 	$("#form_seg").fadeOut();	
				}else{
					$("#coe").fadeOut();
					$("#form_seg").fadeIn();	
					$("#results").fadeOut();
					$("#resultt").fadeOut();
			var code=$('#code').val();
			  var texto=$('#texto').val();
			if(texto!=""){
			if(texto==code){
			
			}else{
			
			}
					
				}
				
				}
				
				return datosCorrectos;
				
			}

</script>
<form action="">
<div class="columns">
				<br>
                <br>
					<div class="field-container" style="width:100%;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:30px;color:#000;">
						<b>Registrate es gratis</b>
					</div>	
                    <span style="text-shadow: 1px 0px 0px #000;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:16px;color:#428bca;"><i>Unete para que difrutes con tus amigos.</i></span>
                    </div>
                   <table>
 <tr>
  <th width="100%">
  <div class="field-container">
				</div>
  </th>
  </tr>
</table>
			<div class="columns">
				
					<div class="field-container">
						<i class="fa fa-user-circle-o fa-lg" style="color:#000;"></i>
						<input type="text" class="field" id="nombre"  autocomplete="off" onBlur="revisarnombre_apelli(this)" onKeyUp="revisarnombre_apelli(this)" placeholder="Nombre"> <br/>	
					</div>	

				
					<div class="field-container">
						<i class="fa fa-user-circle-o fa-lg" style="color:#000;"></i>
						<input type="text" class="field" id="apellidos" autocomplete="off" placeholder="Apellidos" onBlur="revisarnombre_apelli(this)" onKeyUp="revisarnombre_apelli(this)" > <br/>
					</div>
			</div>
			
			
			

			
			<div class="field-container">
            <p></p>
				<i class="fa fa-envelope-o fa-lg" style="color:#000;"></i>
				<input type="text" class="field" id="correo" autocomplete="off" onBlur="revisar(this); revisarEmail(this)" onKeyUp="revisar(this); revisarEmail(this)" placeholder="Correo Electronico"> <br/>
			</div>
 <div class="field-container">
				<span id="coe"></span>
			</div>
			<div class="field-container">
				<p></p>
				<i class="fa icon-key fa-lg" style="color:#000;"></i>
				<input type="password" autocomplete="off" class="field" onBlur="revisar(this);revisarpassword(this)" id="passwordd" onKeyUp="revisar(this);revisarpassword(this)" onChange="revisar(this);revisarpassword(this)" placeholder="Contraseña"> <br/>
			</div>
			<div class="field-container">
				 <p></p>
				<i class="fa icon-key fa-lg" style="color:#000;"></i>
				<input type="password" autocomplete="off" class="field" onBlur="revisar(this);revisarpassword(this)" id="rep_password" onKeyUp="revisar(this);revisarpassword(this)" onChange="revisar(this);revisarpassword(this)" placeholder="Repita Su Contraseña"> <br/>
			</div>
            <div class="field-container">
				<span id="results"></span>
			</div>
            <div class="field-container">
				 <p></p>
				<i class="fa fa-flag fa-lg" style="color:#000;"></i>
				<select type="text" id="pais" class="fieldd" onBlur="revisaselect(this)" onChange="revisaselect(this)" onkeyup="revisaselect(this)" style="width:90%;">
                    <option value="0">Pais...</option>
                    <option value="Afghanistan" >Afghanistan</option>
                            <option value="Albania" >Albania</option>
                            <option value="Algeria" >Algeria</option>
                            <option value="American Samoa" >American Samoa</option>
                            <option value="Andorra" >Andorra</option>
                            <option value="Angola" >Angola</option>
                            <option value="Anguilla" >Anguilla</option>
                            <option value="Antarctica" >Antarctica</option>
                            <option value="Antigua and Barbuda" >Antigua and Barbuda</option>
                            <option value="Argentina" >Argentina</option>
                            <option value="Armenia" >Armenia</option>
                            <option value="Aruba" >Aruba</option>
                            <option value="Ascension Island" >Ascension Island</option>
                            <option value="Australia" >Australia</option>
                            <option value="Austria" >Austria</option>
                            <option value="Azerbaijan" >Azerbaijan</option>
                            <option value="Bahamas" >Bahamas</option>
                            <option value="Bahrain" >Bahrain</option>
                            <option value="Bangladesh" >Bangladesh</option>
                            <option value="Barbados" >Barbados</option>
                            <option value="Belarus" >Belarus</option>
                            <option value="Belgium" >Belgium</option>
                            <option value="Belize" >Belize</option>
                            <option value="Benin" >Benin</option>
                            <option value="Bermuda" >Bermuda</option>
                            <option value="Bhutan" >Bhutan</option>
                            <option value="Bolivia" >Bolivia</option>
                            <option value="Bosnia and Herzegovina" >Bosnia and Herzegovina</option>
                            <option value="Botswana" >Botswana</option>
                            <option value="Bouvet Island" >Bouvet Island</option>
                            <option value="Brazil" >Brazil</option>
                            <option value="British Indian Ocean Territory" >British Indian Ocean Territory</option>
                            <option value="British Virgin Islands" >British Virgin Islands</option>
                            <option value="Brunei Darussalam" >Brunei Darussalam</option>
                            <option value="Bulgaria" >Bulgaria</option>
                            <option value="Burkina Faso" >Burkina Faso</option>
                            <option value="Burundi" >Burundi</option>
                            <option value="Cambodia" >Cambodia</option>
                            <option value="Cameroon" >Cameroon</option>
                            <option value="Canada" >Canada</option>
                            <option value="Cape Verde" >Cape Verde</option>
                            <option value="Cayman Islands" >Cayman Islands</option>
                            <option value="Central African Republic" >Central African Republic</option>
                            <option value="Chad" >Chad</option>
                            <option value="Chile" >Chile</option>
                            <option value="China" >China</option>
                            <option value="Christmas Island" >Christmas Island</option>
                            <option value="Cocos (Keeling) Island" >Cocos (Keeling) Island</option>
                            <option value="Colombia" >Colombia</option>
                            <option value="Comoros" >Comoros</option>
                            <option value="Congo, Democratic Republic of" >Congo, Democratic Republic of</option>
                            <option value="Congo, Republic of" >Congo, Republic of</option>
                            <option value="Cook Islands" >Cook Islands</option>
                            <option value="Costa Rica" >Costa Rica</option>
                            <option value="Croatia" >Croatia</option>
                            <option value="Cuba" >Cuba</option>
                            <option value="Cyprus" >Cyprus</option>
                            <option value="Czech Republic" >Czech Republic</option>
                            <option value="Denmark" >Denmark</option>
                            <option value="Djibouti" >Djibouti</option>
                            <option value="Dominica" >Dominica</option>
                            <option value="Dominican Republic" >Dominican Republic</option>
                            <option value="Ecuador" >Ecuador</option>
                            <option value="Egypt" >Egypt</option>
                            <option value="El Salvador" >El Salvador</option>
                            <option value="Equatorial Guinea" >Equatorial Guinea</option>
                            <option value="Eritrea" >Eritrea</option>
                            <option value="Estonia" >Estonia</option>
                            <option value="Ethiopia" >Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)" >Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands" >Faroe Islands</option>
                            <option value="Fiji" >Fiji</option>
                            <option value="Finland" >Finland</option>
                            <option value="France" >France</option>
                            <option value="French Guiana" >French Guiana</option>
                            <option value="French Polynesia" >French Polynesia</option>
                            <option value="French Southern Territories" >French Southern Territories</option>
                            <option value="Gabon" >Gabon</option>
                            <option value="Gambia" >Gambia</option>
                            <option value="Georgia" >Georgia</option>
                            <option value="Georgia and Sandwich Islands">Georgia and Sandwich Islands</option>
                            <option value="Germany" >Germany</option>
                            <option value="Ghana" >Ghana</option>
                            <option value="Gibraltar" >Gibraltar</option>
                            <option value="Greece" >Greece</option>
                            <option value="Greenland" >Greenland</option>
                            <option value="Grenada" >Grenada</option>
                            <option value="Guadeloupe" >Guadeloupe</option>
                            <option value="Guam" >Guam</option>
                            <option value="Guatemala" >Guatemala</option>
                            <option value="Guernsey" >Guernsey</option>
                            <option value="Guinea" >Guinea</option>
                            <option value="Guinea-Bissau" >Guinea-Bissau</option>
                            <option value="Guyana" >Guyana</option>
                            <option value="Haiti" >Haiti</option>
                            <option value="Heard and McDonald Islands" >Heard and McDonald Islands</option>
                            <option value="Honduras" >Honduras</option>
                            <option value="Hong Kong" >Hong Kong</option>
                            <option value="Hungary" >Hungary</option>
                            <option value="Iceland" >Iceland</option>
                            <option value="India" >India</option>
                            <option value="Indonesia" >Indonesia</option>
                            <option value="Iran" >Iran</option>
                            <option value="Iraq" >Iraq</option>
                            <option value="Ireland" >Ireland</option>
                            <option value="Isle of Man" >Isle of Man</option>
                            <option value="Israel" >Israel</option>
                            <option value="Italy" >Italy</option>
                            <option value="Jamaica" >Jamaica</option>
                            <option value="Japan" >Japan</option>
                            <option value="Jersey" >Jersey</option>
                            <option value="Jordan" >Jordan</option>
                            <option value="Kazakhstan" >Kazakhstan</option>
                            <option value="Kenya" >Kenya</option>
                            <option value="Kiribati" >Kiribati</option>
                            <option value="Korea, North" >Korea, North</option>
                            <option value="Korea, South" >Korea, South</option>
                            <option value="Kuwait" >Kuwait</option>
                            <option value="Kyrgyzstan" >Kyrgyzstan</option>
                            <option value="Laos" >Laos</option>
                            <option value="Latvia" >Latvia</option>
                            <option value="Lebanon" >Lebanon</option>
                            <option value="Lesotho" >Lesotho</option>
                            <option value="Liberia" >Liberia</option>
                            <option value="Libya" >Libya</option>
                            <option value="Liechtenstein" >Liechtenstein</option>
                            <option value="Lithuania" >Lithuania</option>
                            <option value="Luxembourg" >Luxembourg</option>
                            <option value="Macau" >Macau</option>
                            <option value="Macedonia" >Macedonia</option>
                            <option value="Madagascar" >Madagascar</option>
                            <option value="Malawi" >Malawi</option>
                            <option value="Malaysia" >Malaysia</option>
                            <option value="Maldives" >Maldives</option>
                            <option value="Mali" >Mali</option>
                            <option value="Malta" >Malta</option>
                            <option value="Marshall Islands" >Marshall Islands</option>
                            <option value="Martinique" >Martinique</option>
                            <option value="Mauritania" >Mauritania</option>
                            <option value="Mauritius" >Mauritius</option>
                            <option value="Mayotte" >Mayotte</option>
                            <option value="Mexico" >Mexico</option>
                            <option value="Micronesia" >Micronesia</option>
                            <option value="Moldova" >Moldova</option>
                            <option value="Monaco" >Monaco</option>
                            <option value="Mongolia" >Mongolia</option>
                            <option value="Montserrat" >Montserrat</option>
                            <option value="Morocco" >Morocco</option>
                            <option value="Mozambique" >Mozambique</option>
                            <option value="Myanmar" >Myanmar</option>
                            <option value="Namibia" >Namibia</option>
                            <option value="Nauru" >Nauru</option>
                            <option value="Nepal" >Nepal</option>
                            <option value="Netherlands" >Netherlands</option>
                            <option value="Netherlands Antilles" >Netherlands Antilles</option>
                            <option value="New Caledonia" >New Caledonia</option>
                            <option value="New Zealand" >New Zealand</option>
                            <option value="Nicaragua" >Nicaragua</option>
                            <option value="Niger" >Niger</option>
                            <option value="Nigeria" >Nigeria</option>
                            <option value="Niue" >Niue</option>
                            <option value="Norfolk Island" >Norfolk Island</option>
                            <option value="Northern Mariana Islands" >Northern Mariana Islands</option>
                            <option value="Norway" >Norway</option>
                            <option value="Oman" >Oman</option>
                            <option value="Pakistan" >Pakistan</option>
                            <option value="Palau" >Palau</option>
                            <option value="Palestinian Territory, Occupied" >Palestinian Territory, Occupied</option>
                            <option value="Panama" >Panama</option>
                            <option value="Papua New Guinea" >Papua New Guinea</option>
                            <option value="Paraguay" >Paraguay</option>
                            <option value="Peru" >Peru</option>
                            <option value="Philippines" >Philippines</option>
                            <option value="Pitcairn Island" >Pitcairn Island</option>
                            <option value="Poland" >Poland</option>
                            <option value="Portugal" >Portugal</option>
                            <option value="Puerto Rico" >Puerto Rico</option>
                            <option value="Qatar" >Qatar</option>
                            <option value="Reunion" >Reunion</option>
                            <option value="Romania" >Romania</option>
                            <option value="Russia" >Russia</option>
                            <option value="Rwanda" >Rwanda</option>
                            <option value="Saint Helena" >Saint Helena</option>
                            <option value="Saint Kitts and Nevis" >Saint Kitts and Nevis</option>
                            <option value="Saint Lucia" >Saint Lucia</option>
                            <option value="Saint Pierre and Miquelon" >Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and the Grenadines" >Saint Vincent and the Grenadines</option>
                            <option value="Samoa" >Samoa</option>
                            <option value="San Marino" >San Marino</option>
                            <option value="Sao Tome and Principe" >Sao Tome and Principe</option>
                            <option value="Saudia Arabia" >Saudia Arabia</option>
                            <option value="Senegal" >Senegal</option>
                            <option value="Serbia" >Serbia</option>
                            <option value="Seychelles" >Seychelles</option>
                            <option value="Sierra Leone" >Sierra Leone</option>
                            <option value="Singapore" >Singapore</option>
                            <option value="Slovakia" >Slovakia</option>
                            <option value="Slovenia" >Slovenia</option>
                            <option value="Solomon Islands" >Solomon Islands</option>
                            <option value="Somalia" >Somalia</option>
                            <option value="South Africa" >South Africa</option>
                            <option value="Spain" >Spain</option>
                            <option value="Sri Lanka" >Sri Lanka</option>
                            <option value="Sudan" >Sudan</option>
                            <option value="Suriname" >Suriname</option>
                            <option value="Svalbard and Jan Mayen Islands" >Svalbard and Jan Mayen Islands</option>
                            <option value="Swaziland" >Swaziland</option>
                            <option value="Sweden" >Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria" >Syria</option>
                            <option value="Taiwan" >Taiwan</option>
                            <option value="Tajikistan" >Tajikistan</option>
                            <option value="Tanzania" >Tanzania</option>
                            <option value="Thailand" >Thailand</option>
                            <option value="Timor-Leste" >Timor-Leste</option>
                            <option value="Togo" >Togo</option>
                            <option value="Tokelau" >Tokelau</option>
                            <option value="Tonga" >Tonga</option>
                            <option value="Trinidad and Tobago" >Trinidad and Tobago</option>
                            <option value="Tunisia" >Tunisia</option>
                            <option value="Turkey" >Turkey</option>
                            <option value="Turkmenistan" >Turkmenistan</option>
                            <option value="Turks and Caicos Islands" >Turks and Caicos Islands</option>
                            <option value="Tuvalu" >Tuvalu</option>
                            <option value="Uganda" >Uganda</option>
                            <option value="Ukraine" >Ukraine</option>
                            <option value="United Arab Emirates" >United Arab Emirates</option>
                            <option value="United Kingdom" >United Kingdom</option>
                            <option value="United States of America" >United States of America</option>
                            <option value="United States Virgin Islands" >United States Virgin Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="US Minor Outlying Islands" >US Minor Outlying Islands</option>
                            <option value="USSR" >USSR</option>
                            <option value="Uzbekistan" >Uzbekistan</option>
                            <option value="Vanuatu" >Vanuatu</option>
                            <option value="Vatican City State" >Vatican City State</option>
                            <option value="Venezuela" >Venezuela</option>
                            <option value="Vietnam" >Vietnam</option>
                            <option value="Wallis and Futuna Islands" >Wallis and Futuna Islands</option>
                            <option value="Western Sahara" >Western Sahara</option>
                            <option value="Yemen" >Yemen</option>
                            <option value="Yugoslavia" >Yugoslavia</option>
                            <option value="Zambia" >Zambia</option>
                            <option value="Zimbabwe" >Zimbabwe</option>

                     </select><br/>
			</div>
			<div class="columns">
    <div class="field-container">
					<p></p>	
					<i class="fa fa-user fa-lg" style="color:#000;"></i>
					<select type="text" id="sexo" class="fieldd" onBlur="revisaselect(this)" onChange="revisaselect(this)" onkeyup="revisaselect(this)" style="width:81%;">
                    <option value="0">Sexo...</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                     </select><br/>
				</div>

				
				<div class="field-container">
					<p></p>	
					<i class="fa fa-phone fa-lg" style="color:#000;"></i>
					<input type="text" class="field" style="width:82%;" id="telefono" onBlur="revisar(this); revisaNumero(this); revisaNumeroCant(this, 10)" onKeyUp="revisar(this);revisaNumero(this); revisaNumeroCant(this, 10)" autocomplete="off" placeholder="Telefono"> <br/>
				</div>	
			</div>
            <div class="column">
                    <table width="100%" cellspacing="1" cellpadding="1">
                    <tr>
                    <td colspan="3">
                    	<p align="center" style="margin-top:8px;">Fecha De Nacimiento:</p>	
                    </td>
                    </tr>
  <tr>
    <th scope="col" width="33.3%"><div class="field-container">	
					<i class="fa fa-gift fa-lg" style="color:#000;"></i>
					<select type="text" id="dia" style="width: 70%;" onBlur="revisaselect(this)" onChange="revisaselect(this)" onkeyup="revisaselect2(this)" class="fieldd">
                    <option value="0">Dia</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="1">10</option>
                    <option value="1">11</option>
                    <option value="2">12</option>
                    <option value="3">13</option>
                    <option value="4">14</option>
                    <option value="5">15</option>
                    <option value="6">16</option>
                    <option value="7">17</option>
                    <option value="8">18</option>
                    <option value="9">19</option>
                    <option value="10">20</option>
                    <option value="1">21</option>
                    <option value="2">22</option>
                    <option value="3">23</option>
                    <option value="4">24</option>
                    <option value="5">25</option>
                    <option value="6">26</option>
                    <option value="7">27</option>
                    <option value="8">28</option>
                    <option value="9">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                     </select><br/>
				</div></th>
    <th scope="col" width="33.3%"><div class="field-container">
					<i class="fa fa-gift fa-lg" style="color:#000;"></i>
					<select type="text" id="mes" style="width: 70%;" onBlur="revisaselect(this)" onChange="revisaselect(this)" onkeyup="revisaselect(this)" class="fieldd">
                    <option value="0">Mes</option>
                    <option value="enero">Enero</option>
                    <option value="febrero">Febrero</option>
                     <option value="marzo">Marzo</option>
                    <option value="abril">Abril</option>
                     <option value="mayo">Mayo</option>
                    <option value="junio">Junio</option>
                     <option value="julio">Julio</option>
                    <option value="agosto">Agosto</option>
                     <option value="septiembre">Septiembre</option>
                        <option value="octubre">Octubre</option>
                    <option value="noviembre">Noviembre</option>
                    <option value="diciembre">Diciembre</option>
                     </select><br/>
				</div></th>
    <th scope="col" width="33.3%"><div class="field-container">	
					<i class="fa fa-gift fa-lg" style="color:#000;"></i>
					<select type="text" id="ao"  style="width: 70%;" onBlur="revisaselect(this)" onChange="revisaselect(this)" onkeyup="revisaselect(this)" class="fieldd">
                    <option value="0">Año</option>
                   <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                    <option value="1991">1991</option>
                    <option value="1990">1990</option>
                    <option value="1989">1989</option>
                    <option value="1988">1988</option>
                    <option value="1987">1987</option>
                    <option value="1986">1986</option>
                    <option value="1985">1985</option>
                    <option value="1984">1984</option>
                    <option value="1983">1983</option>
                    <option value="1982">1982</option>
                    <option value="1981">1981</option>
                    <option value="1980">1980</option>
                    <option value="1979">1979</option>
                    <option value="1978">1978</option>
                    <option value="1977">1977</option>
                    <option value="1976">1976</option>
                    <option value="1975">1975</option>
                    <option value="1974">1974</option>
                    <option value="1973">1973</option>
                    <option value="1972">1972</option>
                    <option value="1971">1971</option>
                    <option value="1970">1970</option>
                    <option value="1969">1969</option>
                    <option value="1968">1968</option>
                    <option value="1967">1967</option>
                    <option value="1966">1966</option>
                    <option value="1965">1965</option>
                    <option value="1964">1964</option>
                    <option value="1963">1963</option>
                    <option value="1962">1962</option>
                    <option value="1961">1961</option>
                    <option value="1960">1960</option>
                    <option value="1959">1959</option>
                     <option value="1958">1958</option>
                    <option value="1957">1957</option>
                    <option value="1956">1956</option>
                    <option value="1955">1955</option>
                    <option value="1954">1954</option>
                    <option value="1953">1953</option>
                    <option value="1952">1952</option>
                    <option value="1951">1951</option>
                    <option value="1950">1950</option>
                    <option value="1949">1949</option>
                    <option value="1948">1948</option>
                    <option value="1947">1947</option>
                    <option value="1946">1946</option>
                    <option value="1945">1945</option>
                    <option value="1944">1944</option>
                    <option value="1943">1943</option>
                    <option value="1942">1942</option>
                    <option value="1941">1941</option>
                    <option value="1940">1940</option>
                    <option value="1939">1939</option>
                    <option value="1938">1938</option>
                    <option value="1937">1937</option>
                    <option value="1936">1936</option>
                    <option value="1935">1935</option>
                    <option value="1934">1934</option>
                    <option value="1933">1933</option>
                    <option value="1932">1932</option>
                    <option value="1931">1931</option>
                    <option value="1930">1930</option>
                    <option value="1929">1929</option>
                    <option value="1928">1928</option>
                    <option value="1927">1927</option>
                    <option value="1926">1926</option>
                    <option value="1925">1925</option>
                    <option value="1924">1924</option>
                    <option value="1923">1923</option>
                    <option value="1922">1922</option>
                    <option value="1921">1921</option>
                    <option value="1920">1920</option>
                     <option value="1919">1919</option>
                    <option value="1918">1918</option>
                    <option value="1917">1917</option>
                    <option value="1916">1916</option>
                    <option value="1915">1915</option>
                    <option value="1914">1914</option>
                    <option value="1913">1913</option>
                    <option value="1912">1912</option>
                    <option value="1911">1911</option>
                    <option value="1910">1910</option>
                    <option value="1909">1909</option>
                    <option value="1908">1908</option>
                    <option value="1907">1907</option>
                    <option value="1906">1906</option>
                    <option value="1905">1905</option>
                     </select><br/>
				</div></th>
  </tr>
  <tr>
  <th colspan="3"><p></p></th>
  </tr>
  <tr>
  <th colspan="3"><span style="color:#333;">Al hacer clic en "Abrir una cuenta", aceptas las <a href="#">Condiciones</a> y confirmas que leíste nuestra Política de datos.</span></th>
  </tr>
  <tr>
  <th colspan="3"><div class="field-container">
				<p></p>	
					<input type="button" id="abrir_cuenta"  class="btn btn-primary" style="width:98.5%;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:17px;" value="Abrir una cuenta"> <br/>
                     <br/>
				</div></th>
  </tr>
  </table>
  <div id="form_seg" style="display:none;">
  <table>
  <tr>
  <th colspan="3"><div class="field-container">
				<span style="color:#000; font-size:16px;">Control de seguridad</span>
                <br>
               <span style="font-size:12px; font-family:inherit;color:#000;"> Este campo es obligatorio.</span>
               <br>	
               <span style="font-size:12px; font-family:inherit;color:#000;"> ¿No puedes leerlas?</span> <span><a href="javascript:void(0);" style="font-size:12px; font-family:inherit;" id="generar">Prueba con otras palabras.</a></span>
                <span id="mytext"></span>
               </div></th>
  </tr>
  <tr>
  <tr>
  <th colspan="3"><div class="field-container">
				<span class="alert" id="palabra" style="position:absolute; border:1px dashed #000; font-size:14px; width:29.7%;color:#000;padding:10px;background:#FFF;text-align:center;"></span>
                <br>
				</div>
                <br></th>
  </tr>
<th colspan="2">
<div class="field-container">
<br>
 <p style="position:absolute; margin-top:5px; margin-bottom:-8px;">Ingresa el texto que ves arriba.</p>
 <br>
 <p></p>
 <i class="fa fa-paypal fa-lg" style="color:#000;">
 </i>
                <input type="text" id="texto" class="field" style="width:82%;top:5px;" placeholder="Texto..."> 
                 </th>
  </tr>
  <tr><td colspan="2"><span id="resulx"></span></td></tr>
  <tr>
  <th width="100%">
   <br>
  <div class="field-container">
					<input type="button" id="registro"  class="btn btn-primary" style="width:145%;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:17px;" value="Registrate"> <br/>
				</div>
  </th>
  </tr>
</table>
</div>
</div>	
		</form>
		 <script>
	$(document).ready(function() {
		$('#palabra').load('pp.php');
		  $("#generar").on("click", function(){
			   $('#palabra').load('pp.php');
		  }) 
		 
	   $("#abrir_cuenta").on("click", function(){
				return validar();
			})
			 $("#abrir_cuenta").on("click", function(){
				$('#alt').hide();
			
			})
			 
	  $("#registro").on("click", function(){
				return validar();
			})
			$("#registro").on("click", function(){
				var code=$('#code').val();
			  var texto=$('#texto').val();
			 if(texto!=""){
			if(texto==code){
				 $("#resulx").html("<div id='resx' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><span class='icon-checkmark'></span> La Palabra Ingresada Es Correcta</div>");
			}else{
		 $("#resulx").html("<div id='resx'  class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><span class='icon-cross'></span> La Palabra Ingresada No Es Correcta</div>");
		 }
			 }else{
				 $("#resulx").html("<div id='resx'  class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><span class='icon-cross'></span> Ingresa El Texto Que Ves Arriba.</div>");
			 }
			})
			 $("#recuperar").on("click", function(){
				 $('#result').hide();
				$('#formularios').load('recuperar_cuenta.php');
			})
			$("#sesion").on("click", function(){
				 $('#result').hide();
				$('#formularios').load('sesion.php');
			})
			 $("#registrarse").on("click", function(){
			 $('#formularios').load('form_index.php');
			})
			
			
			 $('#registro').click(function(){
				   var correo=$('#correo').val();
			  var nombre=$('#nombre').val();
			  var apellidos=$('#apellidos').val();
			  var telefono=$('#telefono').val();
			  var password=$('#passwordd').val();
			  var pais=$('#pais').val();
			   var dia=$('#dia').val();
			  var mes=$('#mes').val();
			  var ao=$('#ao').val();
			   var sexo=$('#sexo').val();
			   var code=$('#code').val();
			  var texto=$('#texto').val();
			if(texto!=""){
			if(texto==code){
			if($.trim(nombre).length > 0 && $.trim(correo).length > 0){
				$('#guardando').fadeIn(function(){
					 $("#form_seg").fadeOut();	
$('#co').load('insertar_registro.php',{nombre: nombre,apellidos: apellidos,correo: correo,password: password,sexo:sexo,pais:pais,telefono:telefono,dia:dia,mes:mes,ao:ao});
})
			}else{
			}	
				}
			
         
      };
	 })
			
			
    $('#login').click(function(){
      var email = $('#email').val();
      var password = $('#password').val();
      if($.trim(email).length > 0 && $.trim(password).length > 0){
        $.ajax({
          url:"logueame.php",
          method:"POST",
          data:{email:email, password:password},
          cache:"false",
          beforeSend:function() {
            $('#login').val("Conectando...");
          },
          success:function(data) {
            $('#login').val("Iniciar Sesion");
            if (data=="1") {

              $(location).attr('href','restringuir.php');
            } else {
				 $("#result").fadeIn();
              $("#result").html("<div id='alert' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>El Email O La Contraseña No Se Encuentra En El Sistema...</div>");
			  $("#resultt").hide();
            }
          }
        });
      };
    });
  });
</script>