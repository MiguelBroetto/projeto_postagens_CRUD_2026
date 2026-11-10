<?php
session_start();
require('config.php');
require('conexao.php');
require('config.postagem.php');


paginaRestrita(@$_SESSION["logado"], "login.php", "Para deleção é necessário estar logado.");

$id = $_GET["id"];
$resultado = deletarPostagem($id, $conn);

if($resultado) 
{
    //echo "Deleção realizada com sucesso";
    header("Location: listar-postagem.php?tipo=1&mensagem=Deleção da Postagem id [$id] realizada com sucesso!");
} else {
    echo "Erro durante a deleção: ". mysqli_error();
}

mysqli_close($conn);
