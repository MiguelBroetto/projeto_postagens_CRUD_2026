<?php
include('conexao.php');
include('config.usuario.php');

$usuario = buscarLogin("miltin", "1234", $conn);
if($usuario != "") {
    echo "encotrou usuario";
    print_r($usuario);
} else {
    echo "não encontrou";
}
//print_r($usuario);

?>