<?php
session_start();
require('config.php');
require('conexao.php');
require('config.usuario.php');


$logado = @$_SESSION["logado"];
paginaRestrita($logado, "login.php", "Necessário ter acesso para realizar o Cadastro de Usuário.");


//echo criarTopo();
// $conn esta variavel de conexao já está construida
$id = $_GET["id"];
$usuario = buscarUsuario($id, $conn);
if($usuario != "") {
    //echo "Achei o usuario ". $usuario["id"] . " com o email ". $usuario["email"];
    echo criarTopo($logado);
    verificaMensagem();
    echo criarFormularioEdicaoUsuario($usuario["id"], $usuario["email"], $usuario["senha"]);    
    echo criarRodape();
} else {
    header("location: listar-usuarios.php?tipo=0&mensagem=Usuário [$id] não foi encontrado.");
}

?>