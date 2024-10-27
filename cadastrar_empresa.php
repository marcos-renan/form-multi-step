<?php

//verificar se o usuario clicou em cadastrar empresa
 if(isset($dados['cadEmpresa'])){

  //verificar se os campos estão preenchidos
  if(empty($dados['razao_social'])){
    $mensagem = "<p style= 'color:red;'>Necessário preencher o campo Razão social!</p>";
  }elseif(empty($dados['cnpj'])){
    $mensagem = "<p style= 'color:red;'>Necessário preencher o campo CNPJ!</p>";
  }else {
    //criar a query para cadastrar no banco de dados
    $query_empresa = "INSERT INTO empresas (razao_social, cnpj, usuario_id) VALUES (:razao_social, :cnpj, :usuario_id)";

    $cad_empresa = $conn->prepare($query_empresa);

    //validação do cadastro da empresa
    $cad_empresa->bindParam(':razao_social', $dados['razao_social']);
    $cad_empresa->bindParam(':cnpj', $dados['cnpj'],);
    $cad_empresa->bindParam(':usuario_id', $_SESSION['usuario_id'],);

    //executar a query
    $cad_empresa->execute();

    //verificar se cadastrou na database
    if($cad_empresa->rowCount()){

      //salvar o numero da proxima etapa
      $_SESSION['etapa'] = 1;

      //mensagem de sucesso
      $mensagem = "<p style= 'color:green;'>Empresa cadastrado com sucesso!</p>";

    }else {
      $mensagem = "<p style= 'color:red;'>Empresa não cadastrado!</p>";
    }
  }

  }
?>