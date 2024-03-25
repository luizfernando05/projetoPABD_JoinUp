<?php
    // Inicia a sessão PHP
    session_start();

    // Verifica se a variável de sessão 'usuarioAdm' está definida
    if (!isset($_SESSION['usuarioAdm'])) {
        // Redireciona para a página de login do administrador se o usuário não estiver autenticado
        header("Location: loginAdm.php");
        exit();
    }

    // Inclui o arquivo de configuração do modelo (presumivelmente contém configurações do sistema)
    include_once('../model/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | joinup.admin</title>

    <!-- Inclui o arquivo CSS de estilo -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- Define o ícone da página na guia do navegador -->
    <link rel="icon" href="./images/favincon.png" type="image/x-icon">

    <!-- Pré-conecta-se aos servidores do Google Fonts para baixar as fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Importa as fontes 'Poppins' e 'Roboto' do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Cabeçalho da página -->
    <header class="header-adm-bg">
        <div class="container">
            <!-- Logo da página com link para a página de login do administrador -->
            <div class="logo-adm"><a href="./telaLoginAdm.html"><img src="./images/logoAdm.svg" alt="Logo JoinUp Administrador"></a></div>
        </div>
    </header>

    <section>
        <div class="container"  id="main-content-admpage">
            <!-- Título de saudação -->
            <h1 class="font-1-l color-c12">Olá, o que iremos cadastrar hoje?</h1>
            
            <!-- Links para páginas de cadastro -->
            <a id="cadEmpresa" class="btn" href="./cadastroEmpresa.php">Cadastrar Empresa</a>
            
            <a id="cadOportunidade" class="btn" href="./cadastroOportunidade.php">Cadastrar Oportunidade de Estágio</a>

            <!-- Título para acesso ao site principal -->
            <h1 class="font-1-l color-c12">Acesse o site principal:</h1>

            <!-- Link para a página principal do site -->
            <a class="btn" href="./index.php">CLIQUE AQUI</a>
        </div>
    </section>

    <!-- Rodapé da página -->
    <footer>
        <div class="content-foot">
            <!-- Logo da JoinUp em versão de texto com link para a página de login do administrador -->
            <div id="logo-text">
                <a href="./loginAdm.html"><img src="./images/logoAdm-text.svg" alt="Logo da JoinUp em versão de texto"></a>
            </div>

            <!-- Texto de direitos autorais e logotipo -->
            <div id="text-foot">
                <span class="font-1-xs color-c2">© joinup, 2023. Todos os direitos reservados.</span>
                <img src="./images/logoLuizFernandov1.svg" alt="">
            </div>
        </div>
    </footer>

</body>
</html>