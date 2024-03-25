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
            <!-- Logo da página com link para a página principal do administrador -->
            <div class="logo-adm"><a href="./indexAdm.php"><img src="./images/logoAdm.svg" alt="Logo JoinUp Administrador"></a></div>
        </div>
    </header>

    <!-- Seção de cadastro de empresa -->
    <section>
        <div class="container"  id="cadEmp">
            <h1 class="font-1-l color-c12">Cadastro de empresa:</h1>
            <form id="form-cad-infoEmp" action="../controller/processaCadEmp.php" method="post">

                <!-- Div para informações sobre a empresa -->
                <div id="cadInfoEmp">
                    <span class="font-2-xs color-c12">Informações sobre a empresa:</span>

                    <!-- Campo para o nome da empresa -->
                    <label class="font-1-s color-c12" for="nomeEmpresa">Insira o nome da empresa:</label>
                    <input type="text" id="nomeEmpresa" name="nomeEmpresa" placeholder="Insira aqui o nome da empresa..." required>

                    <!-- Campo para o CNPJ da empresa -->
                    <label class="font-1-s color-c12" for="cnpjEmpresa">Insira o CNPJ da empresa:</label>
                    <input type="number" id="cnpjEmpresa" name="cnpjEmpresa" placeholder="00000000000000" required>

                    <!-- Campo para o setor de atuação da empresa -->
                    <label class="font-1-s color-c12" for="setorEmpresa">Insira o setor de atuação da empresa:</label>
                    <input type="text" id="setorEmpresa" name="setorEmpresa" placeholder="Insira aqui o setor da empresa..." required>
                </div>

                <!-- Div para informações de contato da empresa -->
                <div id="cadInfoContEmp">
                    <span class="font-2-xs color-c12">Informações de contato da empresa:</span>

                    <!-- Campo para o e-mail de contato da empresa -->
                    <label class="font-1-s color-c12" for="emailEmpresa">Insira o e-mail de contato da empresa:</label>
                    <input type="text" id="emailEmpresa" name="emailEmpresa" placeholder="email@email.com" required>

                    <!-- Campo para o telefone de contato da empresa -->
                    <label class="font-1-s color-c12" for="telefoneEmpresa">Insira o telefone de contato da empresa:</label>
                    <input type="number" id="telefoneEmpresa" name="telefoneEmpresa" placeholder="999999999" required>

                    <!-- Usuário Administrador (preenchido automaticamente com o valor da sessão) -->
                    <label class="font-1-s color-c12" for="usuarioAdm">Usuário Administrador:</label>
                    <input type="text" id="usuarioAdm" name="usuarioAdm" value="<?php echo $_SESSION['usuarioAdm']; ?>"  required>
                </div>

                <!-- Botão para enviar o formulário de cadastro da empresa -->
                <button id="btn-login-adm" class="btn" type="submit">Cadastrar</button>
            </form>
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
                <img src="./images/logoLuizFernandov1.svg" alt="">
            </div>
        </div>
    </footer>

</body>
</html>