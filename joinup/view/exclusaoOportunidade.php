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
    <title>Exclusão de Oportunidade | joinup.admin</title>

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

    <!-- Conteúdo da página de edição de oportunidade -->
    <section>
        <div class="container"  id="cards-oportunidades">
            <h1 class="font-1-l color-c12">Exclusão de Oportunidade:</h1>
            <?php
                // Inclui o arquivo de configuração do banco de dados (contém informações de conexão)
                include_once('../model/config.php');

                try {

                    #Collection onde estão as oportunidades
                    $collection = $database->oportunidade;
                    
                    #Id do documento que será excluido
                    $id = $_GET["id"];

                    #Busca no banco a oportunidade que será excluida
                    $documento = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);

                    echo '<div class="card-opor">';
                    echo '<h3 class="font-1-m-b color-c12">' . $documento['nomeOportunidade'] . '</h3>';
                    echo '<div class="info-gerais">';
                    echo '<span class="font-1-xs color-c12">' . $documento['nomeEmpresa'] . '</span>';
        
                    foreach ($documento['tipo'] as $tipo) {
                        echo '<span class="font-1-xs color-c12">' . $tipo . '</span>';
                    }
          
                    echo '<span class="font-1-xs color-c12">' . $documento['cidade'] . ', ' . $documento['estado'] . '</span>';
                    echo '</div>';
                    echo '<div class="cards-opor-info">';
                    echo '<div class="opor-preRequi">';
                    echo '<h4 class="font-1-s color-c12">Pré-requisitos:</h4>';
              
                    foreach ($documento['requisitos'] as $requisito) {
                        echo '<span class="font-2-xs color-c12">' . $requisito . '<br></span>';
                    }
            
                    echo '</div>';
                    echo '<div class="opor-datas">';
                    echo '<h4 class="font-1-s color-c12">Datas da seleção:</h4>';
                    echo '<span class="font-2-xs color-c12 date-span">Início da seleção: ' . $documento['dataInicio'] . '</span>';
                    echo '<span class="font-2-xs color-c12 date-span">Fim da seleção: ' . $documento['dataFim'] . '</span>';
                    echo '</div>';
                    echo '<div class="info-emp">';
                    echo '<h4 class="font-1-s color-c12">Informações da empresa:</h4>';
                    echo '<span class="font-2-xs color-c12 span-info-emp">Área de atuação: ' . $documento['setorEmpresa'] . '</span>';
                    echo '<span class="font-2-xs color-c12 span-info-emp">E-mail para contato: ' . $documento['emailEmpresa'] . '</span>';
                    echo '<span class="font-2-xs color-c12 span-info-emp">Telefone para contato: ' . $documento['telefoneEmpresa'] . '</span>';
                    echo '</div>'; 
                    echo '<a class="btn" href="../controller/processaExcOpo.php?id=' . $documento['_id'] . '">EXCLUIR</a>';
                    echo '<a class="btn" href="../view/indexAdm.php">Cancelar</a>';
                    echo '</div>';
                    echo '</div>';
                } catch (PDOException $e) {
                    // Exibe uma mensagem de erro caso ocorra uma exceção no banco de dados
                    echo "Erro na consulta: " . $e->getMessage();
                }
            ?>
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
            </div>
        </div>
    </footer>

</body>
</html>