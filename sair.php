<?php
session_start();
session_destroy();

header("Location: login.php?mensagem=Usuário saiu do sistema.&tipo=1");
?>