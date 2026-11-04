<?php
session_start();
require("config.php");
$logado = @$_SESSION["logado"];
paginaRestrita($logado, "login.php", "Necessário ter acesso para realizar o Cadastro de Usuário.");

echo criarTopo($logado);
verificaMensagem();
echo criaFormularioCadastroUsuario();
echo criarRodape();
?>