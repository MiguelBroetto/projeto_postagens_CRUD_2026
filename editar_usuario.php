<?php
require('conexao.php');
require('config.usuario.php');

$id = $_POST["id"];
$email = $_POST["email"];
$senha = $_POST["senha"];

if(editarUsuario($id, $email, $senha, $conn)) 
{
    header("location: listar-usuarios.php?tipo=1&mensagem=Edição realizada com sucesso");
} else {
    header("location: listar-usuarios.php?tipo=0&mensagem=Erro durante a edição: ". mysqli_error());
}

mysqli_close($conn);
