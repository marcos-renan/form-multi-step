<?php

//verificar se o usuario clicou em cadastrar
 if(isset($dados['cadUsuario'])){

  //verificar se os campos estão preenchidos
  if(empty($dados['nome'])){
    $mensagem = "<p style= 'color:red;'>Necessário preencher o campo Nome!</p>";
  }elseif(empty($dados['email'])){
    $mensagem = "<p style= 'color:red;'>Necessário preencher o campo E-mail!</p>";
  }else {
    //criar a query para cadastrar no banco de dados
    $query_usuario = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";

    $cad_usuario = $conn->prepare($query_usuario);

    //validação do cadastro do usuario
    $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);

    //executar a query
    $cad_usuario->execute();

    //verificar se cadastrou na database
    if($cad_usuario->rowCount()){

      //recuperar o ultimo id inserido
      $_SESSION['usuario_id'] = $id_usuario = $conn->lastInsertId();

      //salvar o numero da proxima etapa
      $_SESSION['etapa'] = 2;

      //mensagem de sucesso
      $mensagem = "<p style= 'color:green;'>Usuário cadastrado com sucesso!</p>";

    }else {
      $mensagem = "<p style= 'color:red;'>Usuário não cadastrado!</p>";
    }
  }

  }
?>