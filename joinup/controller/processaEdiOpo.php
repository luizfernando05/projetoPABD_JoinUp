<?php
// Inclui o arquivo de configuração do banco de dados (contém informações de conexão)
include_once('../model/config.php');

// Verifica se a requisição HTTP é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        
        #Collection onde os dados serão atualizados
        $collection = $database->oportunidade;

        // Obtém os dados do formulário enviados via POST
        $nomeOportunidade = $_POST['nomeOportunidade'];
        $cep = $_POST['cep'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $dataInicio = $_POST['dataInicio'];
        $dataFim = $_POST['dataFim'];
        $linkIns = $_POST['linkIns'];
        $usuarioAdm = $_POST['usuarioAdm'];
        $tipo = $_POST['tipo'];
        $requisito = $_POST['requisitos'];
        $nomeEmpresa = $_POST['nomeEmpresa'];
        $setorEmpresa = $_POST['setorEmpresa'];
        $emailEmpresa = $_POST['emailEmpresa'];
        $telefoneEmpresa = $_POST['telefoneEmpresa'];
        $usuarioAdm = $_POST['usuarioAdm'];
        $id = $_POST['id'];

        #Separando os diferentes tipos e requisitos
        $tipos = explode(',', $tipo);
        $requisitos = explode(',', $requisito);

        #Preparando o documento
        $documento = [
            'nomeOportunidade' => $nomeOportunidade,
            'cep' => $cep,
            'estado' => $estado,
            'cidade' => $cidade,
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'linkIns' => $linkIns,
            'tipo' => $tipos,
            'requisitos' => $requisitos,
            'nomeEmpresa' => $nomeEmpresa,
            'setorEmpresa' => $setorEmpresa,
            'emailEmpresa' => $emailEmpresa,
            'telefoneEmpresa' => $telefoneEmpresa,
            'usuarioAdm' => $usuarioAdm
        ];

        #atualizando o documento na base de dados
        $updateResult = $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectID($id)],
            ['$set' => $documento]
        );

        // Redireciona para uma página de sucesso após o cadastro bem-sucedido
        header("Location: ../view/indexAdm.php");
        exit();
    } catch (MongoDB\Exception\Exception $e) {
        // Exibe uma mensagem de erro se ocorrer um erro na conexão ou no processo de cadastro
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }
}

?>