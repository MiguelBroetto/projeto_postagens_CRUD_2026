<?php
session_start();
require('config.php');
require('conexao.php');
require('config.postagem.php');


$logado = @$_SESSION["logado"];
paginaRestrita($logado, "login.php", "Necessário ter acesso para realizar o Cadastro de Usuário.");

//echo criarTopo();
// $conn esta variavel de conexao já está construida
$id = $_GET["id"];
$postagem = buscar_postagem($id);
if($postagem != "") {
    //echo "Achei a postagem ". $postagem["id"] . " com o titulo ". $postagem["titulo"];
    echo criarTopo($logado);
    verificaMensagem();
    echo criarFormularioEdicaoPostagem($postagem["id"], $postagem["titulo"], $postagem["descricao"]);    
    echo criarRodape();
} else {
    header("location: listar-postagens.php?tipo=0&mensagem=Postagem com id [$id] não foi encontrado.");
}
?>


    




