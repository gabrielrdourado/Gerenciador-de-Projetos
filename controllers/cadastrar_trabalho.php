<?php

	//importando o dbclass
	require_once('db.class.php');

	//resgatando as informações do form q foi passado
	$arquivo1 = $_FILES['arquivo1']['name'];
	$arquivo2 = $_FILES['arquivo2']['name'];
	$nomeTrabalho = $_POST['nomeTrabalho'];
	$descricaoTrabalho = $_POST['descricaoTrabalho'];

	$trabalho_existe = false;

	//definindo um objeto da classe db
	$objDB = new db();

	//criando o link de conexão com o banco de dados
	$linkDB = $objDB->conectaMysql();
	
	//Pasta onde o arquivo vai ser salvo
	$_UP['pasta'] = '../arquivosUpados/';
	
	//Tamanho máximo do arquivo em Bytes
	$_UP['tamanho'] = 1024*1024*100*10; //5mb * 10mb = 50mb
	
	//Array com a extensões permitidas
	$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif', 'mp4', 'pdf', 'txt');
	
	//Renomeiar
	$_UP['renomeia'] = false;
	
	//Array com os tipos de erros de upload do PHP
	$_UP['erros'][0] = 'Não houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
	
	//inicio inclusao arquivo 1
	if ($arquivo1 != null) {
		//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
		if($_FILES['arquivo1']['error'] != 0){
			die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo1']['error']]);
			exit; //Para a execução do script
		}
		
		//Faz a verificação da extensao do arquivo
		$explode = explode('.', $_FILES['arquivo1']['name']);
		$extensao = strtolower(end($explode));
		if(array_search($extensao, $_UP['extensoes'])=== false){		
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarTrabalho.php'>
				<script type=\"text/javascript\">
					alert(\"A imagem não foi cadastrada. (extesão inválida)\");
				</script>
			";
		}
		
		//Faz a verificação do tamanho do arquivo
		else if ($_UP['tamanho'] < $_FILES['arquivo1']['size']){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarTrabalho.php'>
				<script type=\"text/javascript\">
					alert(\"Arquivo muito grande.\");
				</script>
			";
		}
		
		//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
		else{
			//Primeiro verifica se deve trocar o nome do arquivo
			if($_UP['renomeia'] == true){
				//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
				$nome_final = time().'.jpg';
			}else{
				//mantem o nome original do arquivo
				$nome_final = $_FILES['arquivo1']['name'];
			}
			//Verificar se é possivel mover o arquivo para a pasta escolhida
			if(move_uploaded_file($_FILES['arquivo1']['tmp_name'], $_UP['pasta']. $nome_final)){
				//Upload efetuado com sucesso, exibe a mensagem
				$query = mysqli_query($linkDB, "INSERT INTO arquivos (
				nome_arquivo, nome_trabalho) VALUES('$nome_final', '$nomeTrabalho')");
			}else{
				//Upload não efetuado com sucesso, exibe a mensagem
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarTrabalho.php'>
					<script type=\"text/javascript\">
						alert(\"Imagem não foi cadastrada com Sucesso.\");
					</script>
				";
			}
		}
	}//fim inclusao arquivo 1

	//inicio inclusao arquivo 2
	if ($arquivo2 != null) {
		//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
		if($_FILES['arquivo2']['error'] != 0){
			die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo2']['error']]);
			exit; //Para a execução do script
		}
		
		//Faz a verificação da extensao do arquivo
		$explode = explode('.', $_FILES['arquivo2']['name']);
		$extensao = strtolower(end($explode));
		if(array_search($extensao, $_UP['extensoes'])=== false){		
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarTrabalho.php'>
				<script type=\"text/javascript\">
					alert(\"A imagem não foi cadastrada. (extesão inválida)\");
				</script>
			";
		}
		
		//Faz a verificação do tamanho do arquivo
		else if ($_UP['tamanho'] < $_FILES['arquivo2']['size']){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarTrabalho.php'>
				<script type=\"text/javascript\">
					alert(\"Arquivo muito grande.\");
				</script>
			";
		}
		
		//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
		else{
			//Primeiro verifica se deve trocar o nome do arquivo
			if($_UP['renomeia'] == true){
				//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
				$nome_final = time().'.jpg';
			}else{
				//mantem o nome original do arquivo
				$nome_final = $_FILES['arquivo2']['name'];
			}
			//Verificar se é possivel mover o arquivo para a pasta escolhida
			if(move_uploaded_file($_FILES['arquivo2']['tmp_name'], $_UP['pasta']. $nome_final)){
				//Upload efetuado com sucesso, exibe a mensagem
				$query = mysqli_query($linkDB, "INSERT INTO arquivos (
				nome_arquivo, nome_trabalho) VALUES('$nome_final', '$nomeTrabalho')");
			}else{
				//Upload não efetuado com sucesso, exibe a mensagem
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarTrabalho.php'>
					<script type=\"text/javascript\">
						alert(\"Imagem não foi cadastrada com Sucesso.\");
					</script>
				";
			}
		}
	}//fim inclusao arquivo 2

	//incluindo nome e descriçao do trabalho
		//-----------------------------------VERIFICANDO-----------------------------------//
	//verificando trabalho
	$sql = "SELECT * FROM trabalhos WHERE nome = '$nomeTrabalho'";

	if($retornoSql = mysqli_query($linkDB, $sql)){
		$dadosTrabalho = mysqli_fetch_array($retornoSql);

		if (isset($dadosTrabalho['nome'])) {
			$trabalho_existe = true;
		}

	} else {
		echo 'Erro ao verificar dados';
	}

	if ($trabalho_existe) {

		$retorno_get = '';

		if ($trabalho_existe) {
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarTrabalho.php'>
				<script type=\"text/javascript\">
					alert(\"Trabalho já existe.\");
				</script>
			";
		}

		die();
	}
	//-----------------------------------FIM VERIFICAÇÃO-----------------------------------//


	//variavel com a linha em SQL de inserção dos dados no BD
	$sql = "insert into trabalhos(nome, descricao) values ('$nomeTrabalho', '$descricaoTrabalho')";

	if(mysqli_query($linkDB, $sql)){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarTrabalho.php'>
				<script type=\"text/javascript\">
					alert(\"Trabalho cadastrado com sucesso!!!\");
				</script>
			";
	} else {
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/criarTrabalho.php'>
			<script type=\"text/javascript\">
				alert(\"Erro ao cadastrar o trabalho.\");
			</script>
		";
	}	
	
?>