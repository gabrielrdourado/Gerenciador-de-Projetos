<?php 
	
	//capturando o error transmitido por get na url
	$erro_matricula = isset($_GET['erro_matricula']) ? $_GET['erro_matricula'] : 0;
    $erro_nome = isset($_GET['erro_nome']) ? $_GET['erro_nome'] : 0;

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>MultMidia Projeto</title>
		
		<link rel="stylesheet" type="text/css" href="css/styleInscrevase.css">

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	

	    <script type="text/javascript">
	        var bleep = new Audio();
	        bleep.src = "sounds/bleep.mp3";
	    </script>

	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="index.php">Voltar para Home</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    		<h3>Inscreva-se já.</h3>
	    		<br />
				<form method="post" action="controllers/registra_usuario.php" id="formCadastrarse">
					<div class="form-group">
						<input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matrícula" required="requiored">
						<?php 
							if($erro_matricula == 1){
								echo '<font color="#FF0000">Matrícula já cadastrada!</font>';
							}
						?>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="requiored">
						<?php 
							if($erro_nome == 1){
								echo '<font color="#FF0000">Nome já cadastrado!</font>';
							}
						?>
					</div>
					
					<div class="form-group">
						<input type="password" autocomplete="new-password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
					</div>
					
					<button type="submit" onmousedown="bleep.play()" class="btn btn-primary form-control">Inscreva-se</button>
				</form>
			</div>
			<div class="col-md-4"></div>

			<div class="clearfix"></div>
			<br />
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>

		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>

