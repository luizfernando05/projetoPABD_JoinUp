<?php
    // Inicia a sessão para verificar a autenticação do usuário
    session_start();

    // Verifica se o usuário não está autenticado, redirecionando-o para a página de login
    if (!isset($_SESSION['usuarioAdm'])) {
        header("Location: loginAdm.php");
        exit();
    }

    // Inclui o arquivo de configuração do banco de dados (contém informações de conexão)
    include_once('../model/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa | joinup.admin</title>

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

    <!-- Conteúdo da página de confirmação de cadastro -->
    <section>
        <div class="container" id="cadEmpSucesso">
            <h1 class="font-1-l color-c12">Cadastro realizado com sucesso!</h1>
            <p class="font-1-m color-c12">A empresa ou oportunidade foi cadastrada com sucesso em nosso sistema.</p>
            <!-- Link para voltar à página principal do administrador -->
            <a href="./indexAdm.php" class="btn">Voltar para a página principal</a>
        </div>
    </section>

    <!-- Rodapé da página -->
    <footer>
        <div class="content-foot">
            <div id="logo-text">
                <!-- Logo de texto da JoinUp com link para a página de login do administrador -->
                <a href="./loginAdm.php"><img src="./images/logoAdm-text.svg" alt="Logo da JoinUp em versão de texto"></a>
            </div>

            <div id="text-foot">
                <!-- Informações de direitos autorais e créditos -->
                <span class="font-1-xs color-c2">© joinup, 2023. Todos os direitos reservados.</span>
            </div>
        </div>
    </footer>

</body>
</html>