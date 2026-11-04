<?php
include 'config.php';

echo criarTopo();
echo pesquisaDinamica("https://br.pinterest.com/search/pins/", "Pinterest", "q");
echo criarRodape();
?>

