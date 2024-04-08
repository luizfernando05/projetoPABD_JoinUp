<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador | joinup.admin</title>

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
            <div class="logo-adm"><a href="./loginAdm.html"><img src="./images/logoAdm.svg" alt="Logo JoinUp Administrador"></a></div>
        </div>
    </header>

    <!-- Seção de login do administrador -->
    <section id="login-adm">
        <div class="container" id="form-login-adm-bg">
            <!-- Formulário de login -->
            <form id="form-login-adm" action="../controller/atoLoginAdm.php" method="post">

                <!-- Campo de entrada para o nome de usuário -->
                <label class="font-1-s" for="usuarioAdm">Nome de usuário:</label>
                <input type="text" id="usuarioAdm" name="usuarioAdm" required>
    
                <!-- Campo de entrada para a senha -->
                <label class="font-1-s" for="senhaAdm">Senha:</label>
                <input type="password" id="senhaAdm" name="senhaAdm" required>
                
                <!-- Botão de submissão do formulário de login -->
                <button id="btn-login-adm" class="btn" type="submit">Fazer Login</button>
    
            </form>
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
            </div>
        </div>
    </footer>

</body>
</html>