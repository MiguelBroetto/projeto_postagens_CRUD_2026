<?php
require('conexao.php');
require('config.postagem.php');

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$_SESSION["logado"] = @$_SESSION["logado"];


if(editarPostagem($id, $titulo, $descricao, $conn)) 
{
    header("location: listar-postagem.php?tipo=1&mensagem=Edição realizada com sucesso");
} else {
    header("location: listar-postagem.php?tipo=0&mensagem=Erro durante a edição: ". mysqli_error());
}

mysqli_close($conn);