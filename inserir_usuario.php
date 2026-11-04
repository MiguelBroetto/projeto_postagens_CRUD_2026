<?php

require 'conexao.php';

function criarUsuario($email, $senha, $nome, $conn){

$sql = "INSERT INTO `usuarios` (`email`, `senha`, `nome`) VALUES ('$email', '$senha', '$nome')";
$result = "";

if ($result = mysqli_query($conn, $sql)) {
    //cadastro realizado
    header("Location: cadastrar-usuario.php?tipo=1&mensagem=Usuário cadastrado com sucesso");
} else {
    //cadastro não realizado
    header("Location: cadastrar-usuario.php?tipo=0&mensagem=Erro no cadastro do usuário: ". mysqli_error($conn));
}

}

$email = $_POST["email"];//"leo@ifes.edu.br";
$senha = $_POST["senha"];//"1234";
$nome = $_POST["nome"];//"1234";

echo criarUsuario($email, $senha, $nome, $conn);