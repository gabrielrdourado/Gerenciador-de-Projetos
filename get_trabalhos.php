<?php

	session_start();

	if(!isset($_SESSION['matricula'])){
		header('Location: index.php');
	}

	//importando o dbclass
	require_once('controllers/db.class.php');

	//definindo um objeto da classe db
	$objDB = new db();

	//criando o link de conexão com o banco de dados
	$linkDB = $objDB->conectaMysql();

	$sql = "SELECT t.nome, t.descricao, a.nome_arquivo, a.nome_trabalho";
	$sql.= " FROM trabalhos AS t JOIN arquivos AS a;";

	$resultado_id = mysqli_query($linkDB, $sql);

	if($resultado_id){
		
		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			echo '<a href="#" class="list-group-item" style="text-decoration:none; color:black;">';
				echo '<h4 class="list-item-group-heading" style="font-size:30px; text-transform:uppercase;">'.$registro['nome'].'</h4>';
				echo '<p class="list-group-item-text style="font-size:12px; font-weight:normal; text-transform:capitalize;">'.$registro['descricao'].'</p>';
				echo '<img src="arquivosUpados/';
				if ($registro['nome'] == $registro['nome_trabalho']) {
					echo ''.$registro['nome_arquivo'].'';
				}
				echo '"/>';
			echo '</a>';
		}

	} else {
		echo('Erro na requisição de trabalhos!!!');
	}
?>

