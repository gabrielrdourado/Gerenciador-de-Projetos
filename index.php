<?php

    //capturando o variavel transmitido por get na url
    $error = isset($_GET['error']) ? $_GET['error'] : 0;
    $sucesso_cadastro = isset($_GET['sucesso_cadastro']) ? $_GET['sucesso_cadastro'] : 0;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleLogin.css">
    <title>MultMidia Projeto - Login</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

    <?php
        if($sucesso_cadastro == 1){
            echo "<script type='text/javascript'>alert('Usuário cadastrado com sucesso!');</script>";
        }
    ?>

    <div class="container">

        <div class="logo">
            <a href="#">Gerenciador de Projetos</a>
        </div>

        <div class="loginBox">
            <form id="formLogin" action="validar_acesso.php" method="post" style="display:inline">
                
                <img src="images/Login/userImage.jpg"/>
                <input id="userField" type="text" name="matricula" placeholder="Sua matrícula...">

                <br>
                
                <img src="images/Login/passwordImage.jpg"/>
                <input id="passwordField" type="password" name="senha" placeholder="Sua senha...">
                
                <br>
                
                    <div class="rmbPassword">
                        <input id="chkRmbPassword" type="checkbox" name="chkRememberPassword">
                        <label id="lblRmbPassword">Lembrar senha</label>
    
                        <a  id="aInscrevase" href="inscrevase.php">Cadastra-se</a>
    
                    </div>
                <br>
    
                <button id="btLogin" type="buttom">Logar</button>

                <?php
                    if($error == 1){
                        echo "<script type='text/javascript'>alert('Matrícula e/ou senha inválido(s)!');</script>";
                    }
                ?>

            </form>
        </div>
    </div>
    <footer>
        <script src="./js/jquery.js"></script>
        <script src="./js/validate.js"></script>
    </footer>
</body>
</html>