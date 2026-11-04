<?php

include 'conexao.php';
include 'config.php';

$email = $_POST['email'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$id = $_GET['id'];

$sql = "UPDATE `usuarios` SET `email` = '$email', `senha` = '$senha' , `nome` = '$nome' WHERE `usuarios`.`id` = $id";
$resultado = mysqli_query($conn, $sql);

if($resultado) 
{
    header("Location: listar_usuarios.php?tipo=1&mensagem=Usuário atualizado com sucesso");
} else {
     header("Location: listar_usuarios.php?tipo=0&mensagem=Erro na atualização de dados do usuário: ". mysqli_error($conn));
}
mysqli_close($conn);