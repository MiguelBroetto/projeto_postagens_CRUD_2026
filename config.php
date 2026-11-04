<?php

function verificaMensagem() {
    
$tipo = "";
$mensagem = "";

if(isset($_GET["mensagem"]))
{
    $mensagem = $_GET["mensagem"];
}

if(isset($_GET["tipo"]))
{
    $tipo = $_GET["tipo"];
}



if($mensagem != "")
   echo criaMensagem($tipo, $mensagem);

}

function criarTopo($logado = 0) {
    return '<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Postagens - Cadastrar Postagens</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="dflex-center">
            <img src="img/logo.png">
            <h1>Posts-IFES</h1>
        </div>
        '.criaMenu($logado).'
    </header>';
}

function criaFormularioCadastroUsuario() {
    return '<main>
    <form class="form-login" action="inserir_usuario.php" method="POST">

        <h2>Cadastrar Usuário</h2>

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
            <ion-icon name="lock-closed-outline"></ion-icon>
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
            Cadastrar
        </button>

        <button type="reset" class="btn">
            <ion-icon name="trash-bin-outline"></ion-icon>
            Limpar
        </button>
    </form>
    </main>';
}

function criaFormularioLogin($action) {
    return '<main><form class="form-login" action="'.$action.'" method="POST">

        <h2>Formulário de Login</h2>

        <div class="campo">
            <ion-icon name="person-outline"></ion-icon>
            <input 
                class="input-login"
                type="text" 
                name="login" 
                placeholder="Login"
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

        <button type="submit" class="btn ativo">
            <ion-icon name="log-in-outline"></ion-icon>
            Entrar
        </button>

        <button type="reset" class="btn">
            <ion-icon name="trash-bin-outline"></ion-icon>
            Limpar
        </button>
    </form>
    </main>';
}

function criaMenu($logado = 0) {
     /*
$logado = 1 // usuario acertou senha e login apresentar o menu logado
$logado = 0 // usuario errou. apresentar o menu sem logar
    */
    $html = "";
    if($logado == 1) 
    {
        $html = '<nav>
         '.criarLinkMenu("perfil.php", '<ion-icon name="person-outline"></ion-icon>', "Perfil").
         '            
        '.criarLinkMenu("posts.php", '<ion-icon name="add-outline"></ion-icon>', "Cadastrar Postagem").
         ' 
         '.criarLinkMenu("cadastrar-usuario.php", '<ion-icon name="person-add-outline"></ion-icon>', "Cadastrar Usuário").
         '
         '.criarLinkMenu("listar_usuarios.php", '<ion-icon name="list-outline"></ion-icon>', "Listar").
         '      
         '.criarLinkMenu("sair.php", '<ion-icon name="exit-outline"></ion-icon>', "Sair").
         '  
        </nav>';
    } else 
    {
        $html = '<nav>
 '.criarLinkMenu("index.php", "<ion-icon name='home-outline'></ion-icon>", "Início").'   
        '.criarLinkMenu("posts.php", "<ion-icon name='paper-plane-outline'></ion-icon>", "Postagens").'     
        '.criarLinkMenu("login.php", '<ion-icon name="lock-closed-outline"></ion-icon>', "Acessar").'                        
        '.criarLinkMenu("google.php", '<ion-icon name="logo-google"></ion-icon>', "Google").'                         
        '.criarLinkMenu("pinterest.php", '<ion-icon name="logo-pinterest"></ion-icon>', "Pinterest").'                         
        '.criarLinkMenu("contato.php", '<ion-icon name="paper-plane-outline"></ion-icon>', "Contato").'  
 </nav>';
    }


    return $html;
   
}
/* MENU SEM LOGAR


 MENU LOGADO

*/

function criarRodape() {
    $rodape = '
   
    
    <footer class="dflex-center">
        <p>&copy; 2026 Postagens. Todos os direitos reservados.</p>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>    

    <script>
    const botoesFechar = document.querySelectorAll(".fechar");
    botoesFechar.forEach(function(botao) {
        botao.addEventListener("click", function() {
            const mensagem = botao.closest(".mensagem");
            mensagem.remove();
        });
    });
    </script>
    
    </body>
    </html>';
    return $rodape;
}

function linkAtivo($link) {
    $resposta = "";
    $paginaAtual = basename($_SERVER['PHP_SELF']);
    if($link == $paginaAtual) 
        $resposta = "ativo";
    else 
        $resposta = "";


    return $resposta;
}

function criarLinkMenu($link, $icone, $nome) {
    $html = ' <a class="btn '.linkAtivo($link).'" href="'.$link.'">
                '.$icone.' '.$nome.'
            </a>';
    return $html;
}


function pesquisaDinamica($action, $nome, $inputname) {
$html = ' <main>
<form class="form-login" action="'.$action.'" method="GET">

        <h2>Pesquise no '.$nome.'</h2>

        <div class="dflex-center">
            <div class="campo">            
                <input 
                    class="input-login"
                    type="text" 
                    name="'.$inputname.'" 
                    placeholder="Digite sua consulta"
                    required
                >
            </div>

            <button type="submit" class="btn ativo">
                <ion-icon name="search-outline"></ion-icon>
                Pesquisar
            </button>

            <button type="reset" class="btn">
                <ion-icon name="trash-bin-outline"></ion-icon>
                Limpar
            </button>
        </div>
    </form>
</main>';

return $html;
}

function criaMensagem($tipo, $mensagem) {
    $html = "";
    if ($mensagem != "") {
        if($tipo == 0) {
            $html = '<div class="mensagem erro">
        <ion-icon name="alert-circle-outline"></ion-icon>
        <span>'.$mensagem.'</span>
        <button class="fechar">
            <ion-icon name="close-outline"></ion-icon>
        </button>
    </div>';
        } else if($tipo == 1) {
            $html = '<div class="mensagem sucesso">
        <ion-icon name="checkmark-circle-outline"></ion-icon>
        <span>'.$mensagem.'</span>
        <button class="fechar">
            <ion-icon name="close-outline"></ion-icon>
        </button>
    </div>';
        }        
    }
    return $html;
}

function paginaRestrita($logado, $pagina = "login.php", $mensagem = "Necessário fazer login para acessar página restrita") {
    if($logado == 0) {
        header("Location: $pagina?mensagem=$mensagem&tipo=0");
    }
}

?>

