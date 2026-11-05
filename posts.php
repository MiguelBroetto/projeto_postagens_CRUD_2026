<?php
session_start();
include 'conexao.php';
include 'config.postagem.php';
include 'config.php';

$logado = @$_SESSION["logado"];
paginaRestrita($logado, "login.php", "Necessário ter acesso para realizar o Cadastro de Usuário.");

$titulo = @$_POST["titulo"];
$descricao = @$_POST["descricao"];

if (!empty($titulo) && !empty($descricao)) {
    cadastrarPostagem($_SESSION['id'], $titulo, $descricao, $conn);
}

$main = '    

<main>
    <section class="form-container">
        <h2>Cadastrar Postagem</h2>

        <form method = "POST" action="posts.php">

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" placeholder="Digite o título da postagem" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" placeholder="Digite a descrição da postagem"></textarea>
            </div>

            <div class="buttons">
                <button type="submit" class="btn-cadastrar">
                    Cadastrar Postagem
                </button>

                <button type="reset" class="btn-limpar">
                    Limpar Campos
                </button>
            </div>
        </form>
    </section>

    <style>
    main {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
    font-family: Arial, sans-serif;
}

.form-container {
    width: 100%;
    max-width: 500px;
    padding: 30px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.form-container h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 18px;
}

.form-group label {
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
}

.form-group input,
.form-group textarea {
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
    outline: none;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #007bff;
}

.form-group textarea {
    min-height: 120px;
    resize: vertical;
}

.buttons {
    display: flex;
    gap: 10px;
    margin-top: 25px;
}

.buttons button {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-cadastrar {
    background-color: #007bff;
    color: white;
}

.btn-cadastrar:hover {
    background-color: #0056b3;
}

.btn-limpar {
    background-color: #dc3545;
    color: white;
}

.btn-limpar:hover {
    background-color: #a71d2a;
}

@media (max-width: 480px) {
    .buttons {
        flex-direction: column;
    }
}
</style>
</main>';

echo criarTopo($logado);
echo $main;
echo criarRodape();
?>