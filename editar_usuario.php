<?php
session_start();
require 'conexao.php';
require 'config.php';
$logado = @$_SESSION["logado"];
paginaRestrita($logado, "login.php", "Necessário ter acesso para realizar o Cadastro de Usuário.");
$id = $_GET['id'];

echo criarTopo($logado);
echo '<main>
    <form class="form-login" action="editar-usuario.php?id='.$id.'" method="POST">

        <h2>Editar Usuário</h2>

        <div class="campo">
            <ion-icon name="person-outline"></ion-icon>
            <input 
                class="input-login"
                type="text" 
                name="email" 
                placeholder="Email"
                required
            >
        </div>

        <div class="campo">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input 
            class="input-login"
                type="password" 
                name="senha" 
                placeholder="Senha"
                required
            >
        </div>

        <div class="campo">
            <ion-icon name="create-outline"></ion-icon>
            <input 
            class="input-login"
                type="text" 
                name="nome" 
                placeholder="Nome"
                required
            >
        </div>

        <button type="submit" class="btn ativo">
            <ion-icon name="log-in-outline"></ion-icon>
            Atualizar
        </button>

        <button type="reset" class="btn">
            <ion-icon name="trash-bin-outline"></ion-icon>
            Limpar
        </button>
    </form>
    </main>';
echo criarRodape();