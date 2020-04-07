<?php 
	
	//importando o dbclass
	require_once('db.class.php');

	//resgatando as informações do form q foi passado
	$nomeAluno = $_POST['nomeAluno'];
	$matriculaAluno = $_POST['matriculaAluno'];

	$matricula_existe = false;
	$nome_existe = false;

	//definindo um objeto da classe db
	$objDB = new db();

	//criando o link de conexão com o banco de dados
	$linkDB = $objDB->conectaMysql();

	//-----------------------------------VERIFICANDO-----------------------------------//
	//verificando matricula
	$sql = "SELECT * FROM alunos WHERE matricula = '$matriculaAluno'";

	if($retornoSql = mysqli_query($linkDB, $sql)){
		$dadosAluno = mysqli_fetch_array($retornoSql);

		if (isset($dadosAluno['matricula'])) {
			$matricula_existe = true;
		}

	} else {
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarAluno.php'>
			<script type=\"text/javascript\">
				alert(\"Erro ao verificar dados\");
			</script>
		";
	}

	//verificando nome
	$sql = "SELECT * FROM alunos WHERE nome = '$nomeAluno'";

	if($retornoSql = mysqli_query($linkDB, $sql)){
		$dadosAluno = mysqli_fetch_array($retornoSql);

		if (isset($dadosAluno['nome'])) {
			$nome_existe = true;
		}

	} else {
		echo 'Erro ao verificar dados';
	}

	if ($matricula_existe || $nome_existe) {

		$retorno_get = '';

		if ($matricula_existe) {
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarAluno.php'>
				<script type=\"text/javascript\">
					alert(\"Matricula já existe\");
				</script>
			";
		}

		if ($nome_existe) {
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarAluno.php'>
				<script type=\"text/javascript\">
					alert(\"Nome já existe\");
				</script>
			";
		}

		die();
	}
	//-----------------------------------FIM VERIFICAÇÃO-----------------------------------//


	//variavel com a linha em SQL de inserção dos dados no BD
	$sql = "insert into alunos(matricula, nome) values ('$matriculaAluno', '$nomeAluno')";

	if(mysqli_query($linkDB, $sql)){
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarAluno.php'>
			<script type=\"text/javascript\">
				alert(\"Sucesso ao registrar o aluno\");
			</script>
		";
	} else {
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarAluno.php'>
			<script type=\"text/javascript\">
				alert(\"Erro ao registrar usuário\");
			</script>
		";
	}

?>