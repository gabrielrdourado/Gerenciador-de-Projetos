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
    <link rel="stylesheet" href="css/stylecriarTrabalho.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="containerMenu">
        <nav class="vertical-menu">
            <div class="menuLogo">
                <a href="#">Gerenciador de projetos</a>
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

        <h2>Cadastro de Trabalhos <small id="txtSmall"> </b>Cadastre aqui os trabalhos de suas turmas<b> </small> </h2> 

        <div class="cadastro">
            <form id="formLogin" action="controllers/validar_acesso.php" method="post" style="display:inline">
                    
                <label for="trabalho">Nome do Trabalho:</label>
                <input id="nomeTrabalho" type="text" name="nomeTrabalho" placeholder="Nome do Trabalho">

                <br>

                <label for="matricula">Descrição do Trabalho:</label>
                <br>
                <input id="descricaoTrabalho" type="text" name="descricaoTrabalho" placeholder="Descrição do Trabalho">

                <br>

                <input id="arquivos" type="file" name="arquivos">

                <br>
                <br>

                <button id="btCadastrarTrabalho" type="buttom">Cadastrar Trabalho</button>

            </form>
        </div>


    </div>
</body>
</html>