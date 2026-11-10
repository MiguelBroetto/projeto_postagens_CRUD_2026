<?php
session_start();
require('config.php');
require('conexao.php');


paginaRestrita(@$_SESSION["logado"], "login.php", "Para listar os usuários é necessário ter acesso.");
echo criarTopo(@$_SESSION["logado"]);
verificaMensagem();

// $conn esta variavel de conexao já está construida
$sql = "SELECT * FROM `usuarios`";

$resultado = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultado) >0) {
    echo "<main><table>
    <tr>
        <td>Botões</td>
        <td>ID</td>
        <td>EMAIL</td>
        <td>SENHA</td>
    </tr>";
    
    while($dados = mysqli_fetch_assoc($resultado)) {
     //print_r($dados);
     /*echo "Email:" . $dados["email"] . " e id: ". $dados["id"] . " a senha: ". $dados["senha"] . "";*/
     echo '<tr>
                <td class="acoes">
                    <a class="btn red" href="deletar_usuario.php?id='.$dados["id"].'"><ion-icon name="trash-outline"></ion-icon></a>
                    
                    <a class="btn grey" href="buscar_usuario.php?id='.$dados["id"].'">
                    <ion-icon name="pencil"></ion-icon>
                    </a>        
                </td>    
                <td>'.$dados["id"].'</td>
                <td>'.$dados["email"].'</td>
                <td>'.md5($dados["senha"]).'</td>
            </tr>'; 
    }

    echo '</table></main>';
} else {
    echo "Nao tem registro";
}


//if(mysqli_num_rows($resultado))
echo criarRodape();
?>


    




