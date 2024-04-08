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

    #Collection onde estão as oportunidades
    $collection = $database->oportunidade;

    #Busca no banco as oportunidades cadastradas
    $cursor = $collection->find();


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
            
            <a id="cadOportunidade" class="btn" href="./cadastroOportunidade.php">Cadastrar Oportunidade de Estágio</a>

            <!-- Título para acesso ao site principal -->
            <h1 class="font-1-l color-c12">Acesse o site principal:</h1>

            <!-- Link para a página principal do site -->
            <a class="btn" href="./index.php">CLIQUE AQUI</a>
        </div>
    </section>

    <section>
        <div class="container oportunidades-table">
            <h2 class="font-1-l color-c12">Oportunidades cadastradas</h2>
            <table>
                <thead>
                    <tr class='grid-table'>
                        <th class="font-1-m color-c12">Nome da oportunidade</th>
                        <th class="font-1-m color-c12">Nome da empresa</th>
                        <th class="font-1-m color-c12">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                        foreach ($cursor as $documento) {
                            echo "<tr class='grid-table'>";
                            echo "    <td class='font-1-xs color-c12'>" . $documento['nomeOportunidade'] . "</td>";
                            echo "    <td class='font-1-xs color-c12'>" . $documento['nomeEmpresa'] . "</td>";
                            echo "    <td class='btns-table'>";
                            echo "        <a class='font-1-xs color-c12' href='../view/edicaoOportunidade.php?id=" . $documento['_id'] . "'>Editar</a>";
                            echo "        <a class='font-1-xs color-c12' href='../view/exclusaoOportunidade.php?id=" . $documento['_id'] . "'>Excluir</a>";
                            echo "    </td>";
                            echo "</tr>";
                        }

                    ?>
                </tbody>
            </table>
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