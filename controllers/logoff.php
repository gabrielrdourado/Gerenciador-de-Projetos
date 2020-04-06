<?php

	session_start();

	unset($_SESSION['matricula']);
	unset($_SESSION['nome']);

	header('Location: ../index.php');

?>