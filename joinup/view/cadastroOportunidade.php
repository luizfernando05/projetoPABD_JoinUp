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
    <title>Cadastro de Oportunidade | joinup.admin</title>

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
            <div class="logo-adm"><a href="./indexAdm.php"><img src="./images/logoAdm.svg"" alt="Logo JoinUp Administrador"></a></div>
        </div>
    </header>

    <!-- Conteúdo da página de cadastro de oportunidade -->
    <section>
        <div class="container"  id="cadOportunidade">
            <h1 class="font-1-l color-c12">Cadastro de Oportunidade:</h1>
            <form id="form-cad-oportunidade" action="../controller/processaCadOpo.php" method="post">

                <div id="cadInfoOportunidade">

                    <!-- Nome da oportunidade -->
                    <label class="font-1-s color-c12" for="nomeOportunidade">Nome da oportunidade:</label>
                    <input type="text" id="nomeOportunidade" name="nomeOportunidade" placeholder="Insira aqui o nome da oportunidade..." required>

                    <!-- CEP -->
                    <label class="font-1-s color-c12" for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" placeholder="00000000">

                    <!-- Estado -->
                    <label class="font-1-s color-c12" for="estado">Estado:</label>
                    <input type="text" id="estado" name="estado" placeholder="Insira aqui o nome do estado...">

                    <!-- Cidade -->
                    <label class="font-1-s color-c12" for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Insira aqui o nome da cidade...">

                    <!-- Data de Início -->
                    <label class="font-1-s color-c12" for="dataInicio">Data de Início:</label>
                    <input type="date" id="dataInicio" name="dataInicio" required>

                    <!-- Data de Término -->
                    <label class="font-1-s color-c12" for="dataFim">Data de Término:</label>
                    <input type="date" id="dataFim" name="dataFim" required>

                    <!-- Link de Inscrição -->
                    <label class="font-1-s color-c12" for="linkIns">Link de Inscrição:</label>
                    <input type="text" id="linkIns" name="linkIns" required placeholder="Insira aqui o link de inscrição...">

                    <!-- Tipo de Oportunidade -->
                    <label class="font-1-s color-c12" for="tipo">Tipo de Oportunidade (separe por vírgula, se houver mais de um):</label>
                    <input type="text" id="tipo" name="tipo" required placeholder="Remoto, presencial, híbrido...">

                    <!-- Requisitos da Oportunidade -->
                    <label class="font-1-s color-c12" for="requisitos">Requisitos da Oportunidade (separe por vírgula, se houver mais de um):</label>
                    <input type="text" id="requisitos" name="requisitos" placeholder="Insira aqui os requisitos da oportunidade...">

                    <!-- CNPJ da Empresa -->
                    <label class="font-1-s color-c12" for="cnpjEmpresa">CNPJ da Empresa:</label>
                    <input type="text" id="cnpjEmpresa" name="cnpjEmpresa" required placeholder="00000000000000">

                    <!-- Usuário Administrador (preenchido automaticamente com o valor da sessão) -->
                    <label class="font-1-s color-c12" for="usuarioAdm">Usuário Administrador:</label>
                    <input type="text" id="usuarioAdm" name="usuarioAdm" value="<?php echo $_SESSION['usuarioAdm']; ?>"  required>
                </div>

                <!-- Botão para enviar o formulário de cadastro -->
                <button id="btn-cad-oportunidade" class="btn" type="submit">Cadastrar Oportunidade</button>
            </form>
        </div>
    </section>

    <!-- Rodapé da página -->
    <footer>
        <div class="content-foot">
            <div id="logo-text">
                <!-- Logo de texto da JoinUp com link para a página de login do administrador -->
                <a href="./loginAdm.html"><img src="./images/logoAdm-text.svg" alt="Logo da JoinUp em versão de texto"></a>
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