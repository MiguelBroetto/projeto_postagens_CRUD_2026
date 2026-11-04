<?php
session_start();

$mensagem = "";
$tipo = "";

if(isset($_GET["mensagem"]))
{
    $mensagem = $_GET["mensagem"];
}

if(isset($_GET["tipo"]))
{
    $tipo = $_GET["tipo"];
}

include 'config.php';

echo criarTopo();

if($mensagem != "")
   echo criaMensagem($tipo, $mensagem);


echo criaFormularioLogin("login-acao.php");
echo criarRodape();
?>

