<?php
if(isset($_POST['conversacom'])){
	include_once "../defines.php";
	require_once('../classes/BD.class.php');
	BD::conn();

	$mensagens = array();
	$id_conversa = (int)$_POST['conversacom'];
	$online = (int)$_POST['online'];

	$pegaConversas = BD::conn()->prepare("SELECT * FROM `mensagens` WHERE (`id_de` = ? AND `id_para` = ?) OR (`id_de` = ? AND `id_para` = ?) ORDER BY `id` DESC");
	$pegaConversas->execute(array($online, $id_conversa, $id_conversa, $online));

	while($row = $pegaConversas->fetch()){
		$fotouser = '';
		if($online == $row['id_de']){
			$janela_de = $row['id_para'];

		}elseif($online == $row['id_para']){
			$janela_de = $row['id_de'];

			$pegaFoto = BD::conn()->prepare("SELECT `foto`,`sexo` FROM `usuarios` WHERE `id` = '$row[id_de]'");
			$pegaFoto->execute();

			while($usr = $pegaFoto->fetch()){
				
				if($usr['foto'] == ''){
					if($usr['sexo'] == 'Hombre'){
					$fotouser = 'Hombre.jpg';
				}else{
					$fotouser = 'Mujer.jpg';
				}
				}else{
				$fotouser =$usr['foto'];	
				}
			}
		}

		$emotions = array(':)', ':@', '8)', ':D', ':3', ':(', ';)',')1',')2',')3',')4',')5',')6',')7',')8',')9',')0');
		$imgs = array(
			'<img src="emotions/Em1/1.png" width="20"/>',
			'<img src="emotions/Em1/2.png" width="20"/>',
			'<img src="emotions/Em1/2.png" width="20"/>',
			'<img src="emotions/Em1/4.png" width="20"/>',
			'<img src="emotions/Em1/5.png" width="20"/>',
			'<img src="emotions/Em1/6.png" width="20"/>',
			'<img src="emotions/Em1/7.png" width="20"/>',
			'<img src="emotions/Em1/8.png" width="20"/>',
			'<img src="emotions/Em1/9.png" width="20"/>',
			'<img src="emotions/Em1/10.png" width="20"/>',
			'<img src="emotions/Em1/11.png" width="20"/>',
			'<img src="emotions/Em1/12.png" width="20"/>',
			'<img src="emotions/Em1/13.png" width="20"/>',
			'<img src="emotions/Em1/14.png" width="20"/>',
			'<img src="emotions/Em1/15.png" width="20"/>',
			'<img src="emotions/Em1/16.png" width="20"/>',
			'<img src="emotions/Em1/17.png" width="20"/>'
		);
		$msg = str_replace($emotions, $imgs, $row['mensagem']);
		$mensagens[] = array(
			'id' => $row['id'],
			'mensagem' => utf8_encode($msg),
			'fotoUser' => $fotouser,
			'id_de' => $row['id_de'],
			'id_para' => $row['id_para'],
			'janela_de' => $janela_de
		);

	}
	die( json_encode($mensagens) );
}
?>