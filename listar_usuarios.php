<?php
session_start();
include 'config.php';
require 'conexao.php';
$logado = @$_SESSION["logado"];
paginaRestrita($logado, "login.php", "Necessário ter acesso para realizar o Cadastro de Usuário.");// $conn esta variavel de conexao já está construida

$sql = "SELECT * FROM `usuarios`";

$resultado = mysqli_query($conn, $sql);

//print_r($resultado);
$cards = "";
if(mysqli_num_rows($resultado) >0) {
    while($dados = mysqli_fetch_assoc($resultado)) {
     //print_r($dados);
     $card = '<article class="user-card">

            <div class="card-header">
                <div class="avatar" style="background:#4f46e5;">LE</div>
                <div class="card-title">
                    <h2>'.$dados["nome"].'</h2>
                    <span class="user-id">'.$dados["id"].'</span>
                </div>
            </div>

            <div class="card-body">
                <div class="field">
                    <span class="label">E-mail</span>
                    <span class="value">'.$dados["email"].'</span>
                </div>
                <div class="field">
                    <span class="label">Senha</span>
                    <span class="value password">'.md5($dados["senha"]).'</span>
                </div>
            </div>

            <div class="card-footer">
                <a href="editar_usuario.php?id='.$dados["id"].'" class="btn btn-sm btn-secondary">Editar</a>
                <a href="deletar_usuario.php?id='.$dados["id"].'" class="btn btn-sm btn-danger"
                   onclick="return confirm("Excluir este usuário?")">Excluir</a>
            </div>
        </article>';
        $cards .= $card;
}
} else {
    echo "Nao tem registro";
}
 echo criarTopo($logado);
 echo '
 <style>



.container {
    max-width: 1100px;
    margin: 0 auto;
}

/* Cabeçalho */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    flex-wrap: wrap;
    gap: 12px;
}

.page-header h1 {
    font-size: 1.75rem;
    color: #111827;
}

/* Grade de cards */
.cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
}

/* Card individual */
.user-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08),
                0 4px 12px rgba(0, 0, 0, 0.04);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
}

.user-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.10),
                0 8px 24px rgba(0, 0, 0, 0.06);
}

/* Cabeçalho do card */
.card-header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 20px;
    border-bottom: 1px solid #f3f4f6;
}

.avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-weight: 600;
    font-size: 1rem;
    flex-shrink: 0;
}

.card-title h2 {
    font-size: 1.05rem;
    color: #111827;
    font-weight: 600;
    margin-bottom: 2px;
}

.user-id {
    font-size: 0.8rem;
    color: #6b7280;
    background: #f3f4f6;
    padding: 2px 8px;
    border-radius: 6px;
    font-weight: 500;
}

/* Corpo do card */
.card-body {
    padding: 16px 20px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    flex: 1;
}

.field {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.label {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #6b7280;
    font-weight: 600;
}

.value {
    font-size: 0.92rem;
    color: #374151;
    word-break: break-all;
}

.value.password {
    font-family: monospace;
    letter-spacing: 1px;
    color: #9ca3af;
}

/* Rodapé do card */
.card-footer {
    display: flex;
    gap: 8px;
    padding: 14px 20px;
    border-top: 1px solid #f3f4f6;
    background: #fafafa;
}

.card-footer .btn {
    flex: 1;
}

/* Botões */
.btn {
    display: inline-block;
    padding: 10px 18px;
    border-radius: 8px;
    border: none;
    font-size: 0.9rem;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    transition: background 0.2s, transform 0.1s;
    text-align: center;
}

.btn:active {
    transform: scale(0.97);
}

.btn-primary {
    background: #4f46e5;
    color: #ffffff;
}

.btn-primary:hover {
    background: #4338ca;
}

.btn-sm {
    padding: 8px 12px;
    font-size: 0.82rem;
}

.btn-secondary {
    background: #e5e7eb;
    color: #374151;
}

.btn-secondary:hover {
    background: #d1d5db;
}

.btn-danger {
    background: #fee2e2;
    color: #b91c1c;
}

.btn-danger:hover {
    background: #fecaca;
}
 </style>
 <main>
        <div class="container">
        <center><h1>Usuários</h1></center>
        <br>
    <div class="cards-grid">
    '.$cards.'
    </div>
</div>

    </main>';
    $tipo = $_GET['tipo'];
    $mensagem = $_GET['mensagem'];
 echo criaMensagem($tipo, $mensagem);
 echo criarRodape();