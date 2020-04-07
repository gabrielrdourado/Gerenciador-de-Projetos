<?php

    session_start();

    if(!isset($_SESSION['matricula'])){
        header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleDashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="containerMenu">
        <nav class="vertical-menu">
            <div class="menuLogo">
                <a href="#">Gerenciador de Projetos</a>
            </div>

            <div class="menuIcons">
                <a href="dashboard.php"><img src="images/Dashboard/dashboardIcone.png"/>Consultar</a>
                <a href="criarAluno.php"><img src="images/Dashboard/matriculasIcone.png"/>Criar Aluno</a>
                <a href="criarTrabalho.php"><img src="images/Dashboard/turmasIcone.png"/>Criar Trabalho</a>
              </div>
        </nav>
    </div>

    <div class="containerCentro">
        <header>
            <p id="descricao">Dashboard/</p>
            <img id="userImg" src="images/Dashboard/usuarioIcone.png"/>
            <div>
                <p id="user"><?php echo $_SESSION['nome']; ?></p>
                
                <p id="userAdm">Professor</p>
            </div>
            <a href="/controllers/logoff.php" style="margin-top: 10px; margin-left: 20px; text-decoration: none; color: black; font-family: Roboto;">Sair</a>
        </header>

        <h2>Consulta de Trabalhos <small id="txtSmall"> </b>Consulte aqui os trabalhos criados por você.<b> </small> </h2> 

        <div class="cadastro">

        </div>

    </div>
    <script type="text/javascript">

    $(document).ready(function(){
        function atualizaTweets(){
					$.ajax({
						url: 'get_trabalhos.php',
						success: function(data){
							$('#cadastro').html(data);
						}
					});
				}

				atualizaTweets();
    });
    </script>

</body>
</html>