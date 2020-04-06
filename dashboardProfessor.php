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
    <title>Dashboard</title>
</head>
<body>
    <div class="containerMenu">
        <nav class="vertical-menu">
            <div class="menuLogo">
                <a href="#">Gerenciador de projetos</a>
            </div>

            <div class="menuIcons">
                <a href="dashboardProfessor.php"><img src="images/Dashboard/dashboardIcone.png"/>Consultar</a>
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
            <img id="userArrow" src="images/Dashboard/setaIcone.png"/>
        </header>

    </div>
</body>
</html>