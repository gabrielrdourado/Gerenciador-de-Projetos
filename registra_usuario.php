<?php 
	
	//importando o dbclass
	require_once('db.class.php');

	//resgatando as informações do form q foi passado
	$matricula = $_POST['matricula'];
	$nome = $_POST['nome'];
	$senha = md5($_POST['senha']);

	$matricula_existe = false;
	$nome_existe = false;

	//definindo um objeto da classe db
	$objDB = new db();

	//criando o link de conexão com o banco de dados
	$linkDB = $objDB->conectaMysql();

	//-----------------------------------VERIFICANDO-----------------------------------//
	//verificando matricula
	$sql = "SELECT * FROM usuarios WHERE matricula = '$matricula'";

	if($retornoSql = mysqli_query($linkDB, $sql)){
		$dadosUsuario = mysqli_fetch_array($retornoSql);

		if (isset($dadosUsuario['matricula'])) {
			$matricula_existe = true;
		}

	} else {
		echo 'Erro ao verificar dados';
	}

	//verificando nome
	$sql = "SELECT * FROM usuarios WHERE nome = '$nome'";

	if($retornoSql = mysqli_query($linkDB, $sql)){
		$dadosUsuario = mysqli_fetch_array($retornoSql);

		if (isset($dadosUsuario['nome'])) {
			$nome_existe = true;
		}

	} else {
		echo 'Erro ao verificar dados';
	}

	if ($matricula_existe || $nome_existe) {

		$retorno_get = '';

		if ($matricula_existe) {
			$retorno_get.='erro_matricula=1&';
		}

		if ($nome_existe) {
			$retorno_get.='erro_nome=1&';
		}

		header('Location: inscrevase.php?'.$retorno_get);
		die();
	}
	//-----------------------------------FIM VERIFICAÇÃO-----------------------------------//


	//variavel com a linha em SQL de inserção dos dados no BD
	$sql = "insert into usuarios(matricula, nome, senha) values ('$matricula', '$nome', '$senha')";

	if(mysqli_query($linkDB, $sql)){
		header('Location: index.php?sucesso_cadastro=1');
	} else {
		echo 'Erro ao registrar o usuário!';
	}

?>