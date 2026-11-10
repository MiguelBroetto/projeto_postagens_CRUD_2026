<?php

$conn = mysqli_connect("localhost", "root", "", "projeto_Postagens_2026");

if(!$conn) {
    die("Falha na conexão: ". mysqli_connect_error());
} 
