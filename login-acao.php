<?php
session_start();
include('conexao.php');
include('config.usuario.php');

//print_r($_POST);

$nome = $_POST['login'];
$senha = $_POST['senha'];
$senha_cript = md5($senha);


$usuario = buscarLogin($nome, $senha, $conn);

/*if($email == "pedro" && $senha_cript == "81dc9bdb52d04dc20036dbd8313ed055") */
if($usuario != "") {
    //echo "ACERTOU E VC ESTÁ LOGADO";
    $_SESSION["logado"] = 1;
    $_SESSION["nome"] = $nome;
    $_SESSION["id"] = $usuario["id"];
   // $_SESSION["usuario"] = $usuario;

    header("Location: perfil.php");
    
} else {
    //echo "ERROU";
    $_SESSION["logado"] = 0;      
    header("Location: login.php?mensagem=Errou a senha ou login&tipo=0");
}
 
?>