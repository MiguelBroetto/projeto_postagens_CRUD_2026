<?php
// CRUD postagem
include('conexao.php');


function cadastrarPostagem($titulo, $descricao, $idUsuario, $conn) {    
    // $conn esta variavel de conexao já está construida        
    $sql = "INSERT INTO `postagem` (`id`, `titulo`, `descricao`, `dta`, `idUsuario`) VALUES (NULL, '$titulo', '$descricao', NOW(), '$idUsuario');";
    
    $resultado = mysqli_query($conn, $sql);

    return $resultado;
}

function deletarPostagem($id, $conn) {
    $sql = "DELETE FROM postagem WHERE `postagem`.`id` = $id;";
    
    $resultado = mysqli_query($conn, $sql);

    return $resultado;
}

function listarPostagem($conn) {
    $sql = "SELECT * FROM `postagem`";

$resultado = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultado) >0) {
    echo "<main><table>
    <tr>
        <td>Botões</td>
        <td>ID</td>
        <td>titulo</td>
        <td>descricao</td>
        <td>dta</td>
        <td>usuario</td>
    </tr>";
    
    while($dados = mysqli_fetch_assoc($resultado)) {
     //print_r($dados);
     /*echo "Email:" . $dados["email"] . " e id: ". $dados["id"] . " a senha: ". $dados["senha"] . "";*/
     echo '<tr>
                <td>
                    <a class="btn red" href="deletar_usuario.php?id='.$dados["id"].'"><ion-icon name="trash-outline"></ion-icon></a>
                    
                    <a class="btn" href="buscar_usuario.php?id='.$dados["id"].'">
                    <ion-icon name="pencil"></ion-icon>
                    </a>        
                </td>    
                <td>'.$dados["id"].'</td>
                <td>'.$dados["titulo"].'</td>
                <td>'.$dados["descricao"].'</td>
                <td>'.$dados["dta"].'</td>
                <td>'.$dados["idUsuario"].'</td>                
            </tr>'; 
    }

    echo '</table></main>';
} else {
    echo "Nao tem registro";
}

}



function editarPostagem($id, $titulo, $descricao, $dta, $idUsuario, $conn) {
    
    $sql = "UPDATE `postagem` SET `titulo` = '$titulo', `descricao` = '$descricao', `dta` = '$dta', `idUsuario` = '$idUsuario' WHERE `postagem`.`id` = $id;";

    $resultado = mysqli_query($conn, $sql);

    return $resultado;
}


// editarPostagem(1, 'Starlink do Leo', 'Acessivel R$ 9,99', '2026-10-29 14:26:19', 3, $conn))
// listarPostagem($conn);
// deletarPostagem(7, $conn);
// cadastrarPostagem("titulo miltin", "descricao miltin", 25, $conn);

//cadastrarPostagem($titulo, $descricao, $idUsuario, $conn);
/*INSERT INTO `postagem` (`id`, `titulo`, `descricao`, `dta`, `idUsuario`) VALUES (NULL, 'titulo aqui', 'descricao aqui', NOW(), '25');*/ 
//deletarPostagem($id, $conn);
/*DELETE FROM postagem WHERE `postagem`.`id` = 6*/
//listarPostagem();
/*SELECT * FROM `postagem`*/
//listarPostagemUsuario();
/*SELECT * FROM `postagem` WHERE `idUsuario` = 19*/
//editarPostagem();
/*
UPDATE `postagem` SET `titulo` = 'Aprendendo Coisas da Vida', `descricao` = '- Como melhorar saude mental\r\n- Como cultivar nossas amizades\r\n- Como acordar bem e conseguir passar o dia não mal.\r\n', `dta` = '2026-10-30 10:29:16' WHERE `postagem`.`id` = 4;
*/


?>