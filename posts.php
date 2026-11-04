<?php
session_start();
include 'config.php';
$logado = @$_SESSION["logado"];
paginaRestrita($logado, "login.php", "Necessário ter acesso para realizar o Cadastro de Usuário.");

$main = '    <main>
<article>
    <h2>Título da Postagem 1</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>
</article>        
</main>';

echo criarTopo($logado);
echo $main;
echo criarRodape();
?>