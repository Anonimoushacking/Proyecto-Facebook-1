<?php
	session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();
?><?php

$pegaUser = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `email` = ?");
						$pegaUser->execute(array($_SESSION["email"]));
	$agora = date('Y-m-d H:i:s');
							$limite = date('Y-m-d H:i:s', strtotime('+2 min'));
							$update = BD::conn()->prepare("UPDATE `usuarios` SET `horario` = ?, `limite` = ? WHERE `email` = ?");
							if( $update->execute(array($agora, $limite, $_SESSION["email"])) ){
								while($row = $pegaUser->fetchObject()){
									 $_SESSION['email_logado'] = $_SESSION["email"];
	                                  $_SESSION["id_user"] = $_SESSION["id_user"];
									header("Location: chat.php");
								}
							}
						

?>
