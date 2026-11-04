<?php
session_start();

//print_r($_POST);

$nome = $_POST['login'];
$senha = $_POST['senha'];
$senha_cript = md5($_POST ['senha']);

if($nome == "Broetto" && $senha_cript == md5("123")) {
    //echo "ACERTOU E VC ESTÁ LOGADO";
    $_SESSION["logado"] = 1;
    $_SESSION["nome"] = $nome;

    header("Location: perfil.php");
    
} else {
    //echo "ERROU";
    $_SESSION["logado"] = 0;      
    header("Location: login.php?mensagem=Errou a senha ou login&tipo=0");
}
 
?>