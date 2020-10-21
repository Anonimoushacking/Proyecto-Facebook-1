 <?php 
session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();
	
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` = ?");
				$pegaUsuarios->execute(array($_GET['id']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					$sexo = $row['sexo'];
					$nome = $row['nome'];
					$apellidos = $row['apellidos'];
					$blocks = explode(',', $row['blocks']);
					$agora = date('Y-m-d H:i:s');
					$telefono=$row['telefono'];
					$email=$row['email'];
					$dia=$row['dia'];
						$mes=$row['mes'];
						$ao=$row['ao'];
						$pais=$row['pais'];
					if(!in_array($_SESSION['id_user'], $blocks)){
						$status = 'on';
						if($agora >= $row['limite']){
							$status = 'off';
						}
					} }?>
	<table width="570" border="0">
  <tr>
    <td scope="col" colspan="2"><center>Informacion De <?php echo utf8_encode($nome);?></center></td>
  </tr>
  <tr>
    <td width="168">Nombre Completo:</td>
    <td><?php echo utf8_encode($nome);?></td>
  </tr>
  <tr>
    <td>Apellidos:</td>
    <td><?php echo utf8_encode($apellidos);?></td>
  </tr>
  <tr>
    <td>Sexo:</td>
    <td><?php echo $sexo;?></td>
  </tr>
  <tr>
    <td>Correo Electronico:</td>
    <td><?php echo $email;?></td>
  </tr>
  <tr>
    <td>Telefono:</td>
    <td><?php echo $telefono;?></td>
  </tr>
   <tr>
    <td>Fecha De Nacimiento</td>
    <td><?php echo $dia.' '.$mes.' Del '.$ao;?></td>
  </tr>
   <tr>
    <td>Pais:</td>
    <td><?php echo $pais;?></td>
  </tr>
</table>