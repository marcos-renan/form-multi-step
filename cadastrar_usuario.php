<?php

//verificar se o usuario clicou em cadastrar
 if(isset($dados['cadUsuario'])){
  var_dump($dados);

  //verificar se os campos estão preenchidos
  if(empty($dados['nome'])){
    $mensagem = "<p style= 'color:red;'>Necessário preencher o campo Nome!</p>";
  }elseif(empty($dados['email'])){
    $mensagem = "<p style= 'color:red;'>Necessário preencher o campo E-mail!</p>";
  }else {
    
  }

  }
?>