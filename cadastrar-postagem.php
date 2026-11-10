<?php
session_start();
require("config.php");
require("config.postagem.php");

$logado = @$_SESSION["logado"];

paginaRestrita($logado,"login.php","Necessário ter acesso para cadastrar postagem.");

echo criarTopo($logado);
verificaMensagem();
echo criaFormularioCadastroPostagem();
echo criarRodape();
?>