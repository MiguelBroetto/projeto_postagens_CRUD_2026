<?php

function cadastrarUsuario($emailUsuario, $senhaUsuario, $conn) {    
    // $conn esta variavel de conexao já está construida        
    $sql = "INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES (NULL, '$emailUsuario', '$senhaUsuario');";
    
    $resultado = mysqli_query($conn, $sql);

    return $resultado;
}



function editarUsuario($idUsuario, $emailUsuario, $senhaUsuario, $conn) {
    
    $sql = "UPDATE `usuarios` SET `email` = '$emailUsuario', `senha` = '$senhaUsuario' WHERE `usuarios`.`id` = $idUsuario";

    $resultado = mysqli_query($conn, $sql);

    return $resultado;
}

function buscarUsuario($id, $conn) {
    $dados = "";
    $sql = "SELECT * FROM `usuarios` WHERE id = $id";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) >0) {
        $dados = mysqli_fetch_assoc($resultado);
    //     print_r($dados);
        //echo "Email:" . $dados["email"] . " e id: ". $dados["id"] . " a senha: ". $dados["senha"] . "";    
    } 
    return $dados;
}

function buscarLogin($email, $senha, $conn) {
    $dados = "";
    $sql = "SELECT * FROM `usuarios` WHERE `email` LIKE '$email' AND `senha` LIKE '$senha'";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) >0) {
        $dados = mysqli_fetch_assoc($resultado);
    //     print_r($dados);
        //echo "Email:" . $dados["email"] . " e id: ". $dados["id"] . " a senha: ". $dados["senha"] . "";    
    } 
    return $dados;
}

function criarFormularioEdicaoUsuario($idUsuario, $emailUsuario, $senhaUsuario) {
    return '
<main>
    <form class="form-login" action="editar_usuario.php" method="POST">

        <h2>Editar Usuário</h2>

        <div class="campo">
            <ion-icon name="key-outline"></ion-icon>
            <input 
                class="input-login"
                type="text" 
                name="id" 
                value="'.$idUsuario.'"
                placeholder="id"
                required
            >
        </div>

        <div class="campo">
            <ion-icon name="person-outline"></ion-icon>
            <input 
                class="input-login"
                type="text" 
                name="email" 
                placeholder="Email"
                value="'.$emailUsuario.'"
                required
            >
        </div>

        <div class="campo">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input 
            class="input-login"
                type="text" 
                name="senha" 
                placeholder="Senha"
                value="'.$senhaUsuario.'"
                required
            >
        </div>

        <button type="submit" class="btn ativo">
            <ion-icon name="pencil-outline"></ion-icon>
            Editar
        </button>

        <button type="reset" class="btn">
            <ion-icon name="trash-bin-outline"></ion-icon>
            Limpar
        </button>
    </form>
    </main>';
}