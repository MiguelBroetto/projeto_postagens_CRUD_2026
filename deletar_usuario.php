<?php
require 'conexao.php';

//DELETE FROM usuarios WHERE `usuarios`.`id` = 5
$id = $_GET["id"];

$sql = "DELETE FROM usuarios WHERE `usuarios`.`id` = $id";

$resultado = mysqli_query($conn, $sql);

if($resultado) 
{ //deleção realizada com sucesso
    header("Location: listar_usuarios.php?mensagem=Deleção realizada com sucesso!&tipo=1");
} else {
    //deleção não realizada
    header("Location: listar_usuarios.php?mensagem=Erro ao deletar!&tipo=0");
}

mysqli_close($conn);