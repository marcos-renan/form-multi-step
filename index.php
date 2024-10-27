<?php
session_start(); //iniciando a sessão

//incluir a conexão com o banco de dados
include_once './conexao.php';

if(!isset($_SESSION['etapa'])) { //se não existir a sessão etapa
  $_SESSION['etapa'] = 1; //cria a sessão etapa
}
 //$_SESSION['etapa'] = 1;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário</title>
  <link rel="stylesheet" href="./bootstrap/bootstrap.min.css"> <!-- link do bootstrap -->
</head>
<body>

 <?php

  //criar variavel para mensagem de erro ou sucesso
  $mensagem = "";

  //receber os dados do formulario
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

  //salvar os dados do usuario
  include_once './cadastrar_usuario.php';
  //salvar os dados do endereço
  include_once './cadastrar_endereco.php';

  //imprimir as mensagens de erro ou sucesso
  echo $mensagem;
  $mensagem = "";

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