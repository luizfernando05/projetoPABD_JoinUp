<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoinUp</title>

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
    <header class="container">
        <div class="header-all-bg">
            <!-- Logo da página com link para a página inicial -->
            <a href="./index.php"><img src="./images/logoPrimary.svg" alt="Logo da JoinUp."></a>

            <!-- Lista de navegação -->
            <ul class="nav-all">
                <li><a href="#oportunidades" class="font-1-m-b color-c12">oportunidades</a></li>

                <li><a href="#parceiros" class="font-1-m-b color-c12">empresas</a></li>
            </ul>
        </div>
    </header>

    <!-- Conteúdo principal -->
    <main>
        <div  class="container">
            <div id="main-content">
                <!-- Card 1 - Informações sobre oportunidades -->
                <div id="card1">
                    <h1 class="font-1-xxl color-p5">busque a melhor oportunidade para o seu primeiro emprego</h1>
    
                    <p class="font-2-s color-p5">Encontre a vaga de estágio que você sempre sonhou e se insira de fato no mercado de trabalho, aqui você encontrará uma seleção das melhores oportunidades de estágio disponíveis.</p>
                </div>
    
                <!-- Card 2 - Imagem ilustrativa -->
                <div id="card2">
                    <img src="./images/mainImage.svg" alt="Figura de uma mulher como se estivesse presetes a falar algo.">
                </div>
            </div>
        </div>
    </main>

    <!-- Seção de Empresas Parceiras -->
    <section id="parceiros">
        <div id="main-parceiros" class="container">
            <h2 class="font-1-xl color-c12">empresas parceiras:</h2>

            <!-- Lista de logotipos de empresas parceiras -->
            <div id="list-parceiros">
                <div>
                    <img src="./images/parceiros/clean.svg" alt="logo">
                </div>

                <div>
                    <img src="./images/parceiros/eventoConnect.svg" alt="logo">
                </div>

                <div>
                    <img src="./images/parceiros/woww.svg" alt="logo">
                </div>

                <div>
                    <img src="./images/parceiros/marbelo.svg" alt="logo">
                </div>

                <div>
                    <img src="./images/parceiros/simpli.svg" alt="logo">
                </div>

                <div>
                    <img src="./images/parceiros/triplus.svg" alt="logo">
                </div>
            </div>
        </div>
    </section>
    
    <!-- Seção de Oportunidades de Estágio -->
    <section id="oportunidades">
    <div class="container">
        <h2  id="title-sec-opor" class="font-1-xl color-c12">vagas disponíveis:</h2>

        <!-- Cards de Oportunidades de Estágio gerados dinamicamente a partir do PHP -->
        <div class="cards-oportunidades">

        <?php
        // Inclui o arquivo de configuração do banco de dados (contém informações de conexão)
        include_once('../model/config.php');

        try {

            #Collection onde estão as oportunidades
            $collection = $database->oportunidade;

            #Busca no banco as oportunidades cadastradas
            $cursor = $collection->find();

            foreach ($cursor as $documento) {
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
                echo '<a class="btn" href="https://' . $documento['linkIns'] . '">CANDIDATAR-SE</a>';
                echo '</div>';
                echo '</div>';
            }

        } catch (PDOException $e) {
            // Exibe uma mensagem de erro caso ocorra uma exceção no banco de dados
            echo "Erro na consulta: " . $e->getMessage();
        }
        ?>
        </div>

    </div>
</section>

<!-- Rodapé da página -->
<footer>
    <div class="footer-index-bg">
        <div class="container">
            <!-- Logo simplificado da JoinUp -->
            <a href="./index.php"><img src="./images/logoSimple.svg" alt="Logo simplificado joinup"></a>

            <!-- Direitos autorais -->
            <p class="font-1-xs color-c2 copy-footer-index">© joinup, 2023. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>

</body>
</html>