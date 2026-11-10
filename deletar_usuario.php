<?php
session_start();
require('config.php');
require('conexao.php');

paginaRestrita(@$_SESSION["logado"], "login.php", "Para deleção é necessário estar logado.");

//DELETE FROM usuarios WHERE `usuarios`.`id` = 5
$id = $_GET["id"];

$sql = "DELETE FROM usuarios WHERE `usuarios`.`id` = $id";

$resultado = mysqli_query($conn, $sql);

if($resultado) 
{
    //echo "Deleção realizada com sucesso";
    header("Location: listar-usuarios.php?tipo=1&mensagem=Deleção do usuário id [$id] realizada com sucesso!");
} else {
    echo "Erro durante a deleção: ". mysqli_error();
}

mysqli_close($conn);
