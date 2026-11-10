<?php
session_start();
require('config.php');
require('conexao.php');
require('config.postagem.php');


paginaRestrita(@$_SESSION["logado"], "login.php", "Para listar os usuários é necessário ter acesso.");

echo criarTopo(@$_SESSION["logado"]);
verificaMensagem();

echo listarPostagem($conn);

echo criarRodape();
?>