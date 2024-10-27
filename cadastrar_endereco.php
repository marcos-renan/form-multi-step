<?php

//verificar se o usuario clicou em cadastrar endereço
 if(isset($dados['cadEndereco'])){

  //verificar se os campos estão preenchidos
  if(empty($dados['logradouro'])){
    $mensagem = "<p style= 'color:red;'>Necessário preencher o campo Logradouro!</p>";
  }elseif(empty($dados['numero'])){
    $mensagem = "<p style= 'color:red;'>Necessário preencher o campo Número!</p>";
  }else {
    //criar a query para cadastrar no banco de dados
    $query_enderecos = "INSERT INTO enderecos (logradouro, numero, usuario_id) VALUES (:logradouro, :numero, :usuario_id)";

    $cad_enderecos = $conn->prepare($query_enderecos);

    //validação do cadastro do endereço
    $cad_enderecos->bindParam(':logradouro', $dados['logradouro']);
    $cad_enderecos->bindParam(':numero', $dados['numero'],);
    $cad_enderecos->bindParam(':usuario_id', $_SESSION['usuario_id'],);

    //executar a query
    $cad_enderecos->execute();

    //verificar se cadastrou na database
    if($cad_enderecos->rowCount()){

      //salvar o numero da proxima etapa
      $_SESSION['etapa'] = 3;

      //mensagem de sucesso
      $mensagem = "<p style= 'color:green;'>Endereço cadastrado com sucesso!</p>";

    }else {
      $mensagem = "<p style= 'color:red;'>Endereço não cadastrado!</p>";
    }
  }

  }
?>