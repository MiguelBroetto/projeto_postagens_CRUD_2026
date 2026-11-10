<?php
// CRUD postagem
include('conexao.php');

function buscar_postagem($identificador) {
    $postagem = "";
    $sql = "SELECT * FROM `postagem` WHERE id = $identificador";
    $resultado = mysqli_query($conn, $sql);
    if(mysqli_num_rows($resultado)>0) {          
        while($dados = mysqli_fetch_assoc($resultado)) {
            $postagem =  $dados;
        }
    }
    
    return $postagem;
}

function criaFormularioCadastroPostagem() {    
    return '
<main>
    <form class="form-login"
          action="inserir_postagem.php"
          method="POST">

        <h2>Cadastrar Postagem</h2>

        <div class="campo">
            <label for="titulo">Título</label>
            <input
                class="input-login"
                type="text"
                name="titulo"
                id="titulo"
                placeholder="Título da postagem"
                required
            >
        </div>

        <div class="campo">
            <label for="descricao">Descrição</label>
            <textarea
                class="input-login"
                name="descricao"
                id="descricao"
                rows="5"
                placeholder="Digite a descrição da postagem"
                required
            ></textarea>
        </div>

        <button type="submit" class="btn ativo">
            <ion-icon name="save-outline"></ion-icon>
            Cadastrar
        </button>

        <button type="reset" class="btn">
            <ion-icon name="trash-bin-outline"></ion-icon>
            Limpar
        </button>

    </form>
</main>';
}

function cadastrarPostagem($titulo, $descricao, $idUsuario, $conn) {    
    // $conn esta variavel de conexao já está construida        
    $sql = "INSERT INTO `postagem` (`id`, `titulo`, `descricao`, `data`, `autor`) VALUES (NULL, '$titulo', '$descricao', NOW(), '$idUsuario');";
    //echo $sql;

    $resultado = mysqli_query($conn, $sql);

    return $resultado;
}

function deletarPostagem($id, $conn) {
    $sql = "DELETE FROM postagem WHERE `postagem`.`id` = $id;";
    
    $resultado = mysqli_query($conn, $sql);

    return $resultado;
}

function listarPostagem($conn) {
    $html = "";
    $sql = "SELECT * FROM `postagem`";

$resultado = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultado) >0) {
     $html .= "<main><table>
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
      $html .= '<tr>
                <td class="acoes">
                    <a class="btn red" href="deletar_postagem.php?id='.$dados["id"].'"><ion-icon name="trash-outline"></ion-icon></a>
                    
                    <a class="btn grey" href="buscar_postagem.php?id='.$dados["id"].'">
                    <ion-icon name="pencil"></ion-icon>
                    </a>        
                </td>    
                <td>'.$dados["id"].'</td>
                <td>'.$dados["titulo"].'</td>
                <td>'.$dados["descricao"].'</td>
                <td>'.$dados["data"].'</td>
                <td>'.$dados["autor"].'</td>                
            </tr>'; 
    }

     $html .= '</table></main>';
} else {
     $html .= "Nao tem registro";
}
    return $html;
}



function editarPostagem($id, $titulo, $descricao, $data, $idUsuario, $conn) {
    
    $sql = "UPDATE `postagem` SET `titulo` = '$titulo', `descricao` = '$descricao', `data` = '$data', `autor` = '$idUsuario' WHERE `postagem`.`id` = $id;";

    $resultado = mysqli_query($conn, $sql);

    return $resultado;
}

function criarFormularioEdicaoPostagem($idPostagem, $tituloPostagem, $descricaoPostagem) {
    return '
<main>
    <form class="form-login"
          action="editar_postagem.php"
          method="POST">

        <h2>Editar Postagem</h2>

        <div class="campo">
            <label for="titulo">Título</label>
            <input
                class="input-login"
                type="text"
                name="titulo"
                id="titulo"
                placeholder="Título da postagem"
                required
                value="'.$tituloPostagem.'"
            >
        </div>

        <div class="campo">
            <label for="descricao">Descrição</label>
            <textarea
                class="input-login"
                name="descricao"
                id="descricao"
                rows="5"
                placeholder="Digite a descrição da postagem"
                required
                value="'.$descricaoPostagem.'"
            ></textarea>
        </div>

        <button type="submit" class="btn ativo">
            <ion-icon name="save-outline"></ion-icon>
            Cadastrar
        </button>

        <button type="reset" class="btn">
            <ion-icon name="trash-bin-outline"></ion-icon>
            Limpar
        </button>

    </form>
</main>';
}

/*
editarPostagem(1, 'Starlink do Leo', 'Acessivel R$ 9,99', '2026-10-29 14:26:19', 3, $conn))
listarPostagem($conn);
deletarPostagem(7, $conn);
cadastrarPostagem("titulo miltin", "descricao miltin", 25, $conn);
*/
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