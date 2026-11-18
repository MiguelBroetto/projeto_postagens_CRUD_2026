<?php
require 'config.php';
require 'conexao.php';
require 'config.postagem.php';

//echo linkAtivo("postagens.php");

echo criarTopo();
echo criarCardsPostagens($conn);

?>

<?php
echo criarRodape();
?>