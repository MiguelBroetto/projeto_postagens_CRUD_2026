<?php
require('conexao.php');
require('config.usuario.php');

// print_r($_POST);

 $emailUsuario = $_POST["email"];
 $senhaUsuario = $_POST["senha"];

 if(cadastrarUsuario($emailUsuario, $senhaUsuario, $conn)) {
    header("Location: listar-usuarios.php?tipo=1&mensagem=Usuário cadastrado com sucesso");
    } else {
    header("Location: cadastrar-usuario.php?tipo=0&mensagem=Erro no cadastro do usuário: ". mysqli_error($conn));
}