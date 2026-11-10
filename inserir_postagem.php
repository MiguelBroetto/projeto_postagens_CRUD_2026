<?php
session_start();
require("config.php");
require("config.postagem.php");

$logado = @$_SESSION["logado"];

paginaRestrita($logado,"login.php","Necessário ter acesso para cadastrar postagem.");

$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$idUsuario = $_SESSION["id"];


 if(cadastrarPostagem($titulo, $descricao, $idUsuario, $conn)) {
     header("location: listar-postagem.php?tipo=1&mensagem=Postagem cadastrada com sucesso");    
} else {
    header("location: cadastrar-postagem.php?tipo=0&mensagem=Erro no cadastro da postagem: ". mysqli_error($conn));
}

/*
Inserir aqui os post que vem do criaFormularioCadastroPostagem() 
e usar a função 
 cadastrarPostagem($titulo, $descricao, $idUsuario, $conn)

 Utilize o inserir-usuarios.php como exemplo
*/

//  print_r($_POST);
//  print_r($_SESSION);
//  echo "Cadastrou a postagem com sucesso";
?>