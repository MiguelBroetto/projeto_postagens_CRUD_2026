<?php

session_start();
include 'config.php';
$logado = @$_SESSION["logado"];

paginaRestrita($logado, "login.php", "Hummmm estou indo pra index");

echo criarTopo($logado);
print_r($_SESSION);
echo criarRodape();

?>