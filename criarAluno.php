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
    <link rel="stylesheet" href="css/styleCriarAluno.css">
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

        <h2>Cadastro de Alunos <small id="txtSmall"> </b>Cadastre aqui os alunos de suas turmas<b> </small> </h2> 

            <div class="cadastro">
                <form id="formLogin" action="controllers/validar_acesso.php" method="post" style="display:inline">
                        
                    <label for="trabalho">Nome do Aluno:</label>
                    <input id="nomeAluno" type="text" name="nomeAluno" placeholder="Nome do Aluno">
    
                    <br>
    
                    <label for="matricula">Matricula:</label>
                    <input id="matriculaAluno" type="text" name="matriculaAluno" placeholder="Matricula do Aluno">
    
                    <br>
                    <br>
    
                    <button id="btCadastrarAluno" type="buttom">Cadastrar Aluno</button>
    
                </form>
            </div>

    </div>
</body>
</html>