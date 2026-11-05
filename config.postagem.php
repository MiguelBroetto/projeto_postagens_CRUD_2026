<?php
// CRUD postagem
include 'conexao.php';

function cadastrarPostagem($autor, $titulo, $desc, $conn){
    $sql = "INSERT INTO `postagem` (`autor`, `titulo`, `descricao`, `data`) VALUES ('$autor', '$titulo', '$desc', current_timestamp())";

    $result = "";

if ($result = mysqli_query($conn, $sql)) {
    //Post realizado
    header("Location: posts.php?tipo=1&mensagem=Post cadastrado com sucesso!");
} else {
    //Post não realizado
    header("Location: posts.php?tipo=0&mensagem=Erro na publicação do post! ". mysqli_error($conn));
}

}


// function deletarPostagem($id, $conn){

    

// };

/*
listarPostagem();

listarPostagemUsuario();


editarPostagem();
*/
?>