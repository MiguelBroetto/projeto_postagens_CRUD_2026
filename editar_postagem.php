<?php
require('conexao.php');
require('config.postagem.php');

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];

if(editarPostagem($id, $titulo, $descricao, $data, $idUsuario, $conn)) 
{
    header("location: listar-postagens.php?tipo=1&mensagem=Edição realizada com sucesso");
} else {
    header("location: listar-postagens.php?tipo=0&mensagem=Erro durante a edição: ". mysqli_error());
}

mysqli_close($conn);
