<?php
	//iniciando sessão
	session_start();

	//importando o dbclass
	require_once('db.class.php');

	//resgatando as informações do form q foi passado
	$matricula = $_POST['matricula'];
	$senha = md5($_POST['senha']);

	//definindo um objeto da classe db
	$objDB = new db();

	//criando o link de conexão com o banco de dados
	$linkDB = $objDB->conectaMysql();

	//variavel com a linha em SQL de verificação de usuário registrado no BD
	$sql = "SELECT id, matricula, nome, professor FROM usuarios WHERE matricula='$matricula' AND senha='$senha'";

	//resgatando informações que o select retorna
	$resourceLogin = mysqli_query($linkDB, $sql);

	if($resourceLogin){

		//transformando as informações em array
		$dadosUsuario = mysqli_fetch_array($resourceLogin, MYSQLI_ASSOC);

		if (is_null($dadosUsuario['matricula'])){
			header('Location: ../index.php?error=1');
		} else {

			$_SESSION['id_usuario'] = $dadosUsuario['id'];
			$_SESSION['matricula'] = $dadosUsuario['matricula'];
			$_SESSION['nome'] = $dadosUsuario['nome'];

			if ($dadosUsuario['professor'] == 0) {
				header('Location: ../dashboardAluno.php');
			}
			if ($dadosUsuario['professor'] == 1) {
				header('Location: ../dashboardProfessor.php');
			}

		}

	} else {

		echo 'Erro na execução da consulta de usuário no banco de dados!';

	}

?>