<?php
    // Inclui o arquivo de configuração do banco de dados (contém informações de conexão)
    include_once('../model/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        try {
        
            #Collection onde os dados serão inseridos
            $collection = $database->oportunidade; 
            
            #Id do documento que será deletado
            $id = $_GET["_id"];

            #Deleta o documento pelo id
            $deleteResult = $collection->deleteOne(['_id' => $id]);
            
            // Redireciona para uma página de sucesso após o cadastro bem-sucedido
            header("Location: ../view/cadastroSucesso.php");
            exit();
        } catch (MongoDB\Exception\Exception $e) {
            // Exibe uma mensagem de erro se ocorrer um erro na conexão ou no processo de cadastro
            die("Erro na conexão com o banco de dados: " . $e->getMessage());        
        }
    }





?>