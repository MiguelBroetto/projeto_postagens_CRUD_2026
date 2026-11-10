<?php
session_start();
include 'config.php';

echo criarTopo();
verificaMensagem();
echo criaFormularioLogin("login-acao.php");
echo criarRodape();
?>

