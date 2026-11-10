<?php
require('conexao.php');
require('config.usuario.php');

//print_r($_POST);

$email = $_POST["email"];//"leo@ifes.edu.br";
$senha = $_POST["senha"];//"1234";

if(cadastrarUsuario($email, $senha, $conn)) {
    header("Location: listar-usuarios.php?tipo=1&mensagem=Usuário cadastrado com sucesso");    
} else {
    header("Location: cadastrar-usuario.php?tipo=0&mensagem=Erro no cadastro do usuário: ". mysqli_error($conn));
}