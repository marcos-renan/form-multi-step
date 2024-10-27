<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'marcos';
$port = 3306;

try{
  //conexão com a porta
  $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

  //teste
  //echo "Conexão com banco de dados realizado com sucesso!";
}
catch(PDOException $err){
  //mensagem de erro ao tentar conectar
  echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}