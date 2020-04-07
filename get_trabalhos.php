<?php

	session_start();

	if(!isset($_SESSION['matricula'])){
		header('Location: index.php');
	}

	//importando o dbclass
	require_once('./controllers/db.class.php');

	$id_usuario = $_SESSION['id_usuario'];

	//definindo um objeto da classe db
	$objDB = new db();

	//criando o link de conexão com o banco de dados
	$linkDB = $objDB->conectaMysql();

	$sql = "SELECT t.nome, t.descricao";
	$sql.= " FROM trabalhos AS t";

	$resultado_id = mysqli_query($linkDB, $sql);

	if($resultado_id){
		
		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			echo '<a href="#" class="list-group-item">';
				echo '<h4 class="list-item-group-heading">'.$registro['nome']'</h4>';
				echo '<p class="list-group-item-text">'.$registro['descricao'].'</p>';
			echo '</a>';
		}

	} else {
		echo('Erro na requisição de trabalhos!!!');
	}

?>