<?php
session_start(); //iniciando a sessão

if(!isset($_SESSION['etapa'])) { //se não existir a sessão etapa
  $_SESSION['etapa'] = 1; //cria a sessão etapa
}
$_SESSION['etapa'] = 2;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário</title>
  <link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body>

 <?php

    if($_SESSION['etapa'] == 1) { //se a etapa for igual a 1
      include('usuario.php'); //inclui a usuario.php
    }
    else if($_SESSION['etapa'] == 2) { //se a etapa for igual a 2
      include('endereco.php'); //inclui a endereco.php
    }
    else if($_SESSION['etapa'] == 3) { //se a etapa for igual a 3
      include('empresa.php'); //inclui a empresa.php
    }
    else { //se não
      include('usuario.php'); //inclui a usuario.php
    }

 ?>

</body>
</html>