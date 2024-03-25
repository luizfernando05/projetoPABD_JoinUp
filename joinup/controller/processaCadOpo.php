<?php
// Inclui o arquivo de configuração do banco de dados (contém informações de conexão)
include_once('../model/config.php');

// Verifica se a requisição HTTP é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Cria uma conexão PDO com o banco de dados usando as informações de configuração
        $conn = new PDO("pgsql:host=$db_host;port=$db_port;dbname=$db_name;user=$db_user;password=$db_password");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
        $requisitos = $_POST['requisitos'];
        $cnpjEmpresa = $_POST['cnpjEmpresa'];

        // Inserir dados na tabela oportunidade
        $queryOportunidade = "INSERT INTO sistema.oportunidade (nomeOportunidade, cep, estado, cidade, dataInicio, dataFim, linkIns, usuarioAdm)
            VALUES (:nomeOportunidade, :cep, :estado, :cidade, :dataInicio, :dataFim, :linkIns, :usuarioAdm)";
        $stmtOportunidade = $conn->prepare($queryOportunidade);
        $stmtOportunidade->bindParam(':nomeOportunidade', $nomeOportunidade);
        $stmtOportunidade->bindParam(':cep', $cep);
        $stmtOportunidade->bindParam(':estado', $estado);
        $stmtOportunidade->bindParam(':cidade', $cidade);
        $stmtOportunidade->bindParam(':dataInicio', $dataInicio);
        $stmtOportunidade->bindParam(':dataFim', $dataFim);
        $stmtOportunidade->bindParam(':linkIns', $linkIns);
        $stmtOportunidade->bindParam(':usuarioAdm', $usuarioAdm);
        $stmtOportunidade->execute();

        // Obtenha o ID gerado automaticamente pelo banco de dados
        $idOportunidade = $conn->lastInsertId();

        // Inserir dados na tabela oporEmp (relação entre oportunidade e empresa)
        $queryOporEmp = "INSERT INTO sistema.oporEmp (cnpjEmpresa, idOportunidade)
            VALUES (:cnpjEmpresa, :idOportunidade)";
        $stmtOporEmp = $conn->prepare($queryOporEmp);
        $stmtOporEmp->bindParam(':cnpjEmpresa', $cnpjEmpresa);
        $stmtOporEmp->bindParam(':idOportunidade', $idOportunidade);
        $stmtOporEmp->execute();

        // Inserir dados nas tabelas tipoOportunidade e requisitosOportunidade
        $tipos = explode(',', $tipo);
        $requisitos = explode(',', $requisitos);

        foreach ($tipos as $tipo) {
            $tipo = trim($tipo);
            if (!empty($tipo)) {
                inserirTipo($conn, $idOportunidade, $tipo);
            }
        }

        foreach ($requisitos as $requisito) {
            $requisito = trim($requisito);
            if (!empty($requisito)) {
                inserirRequisito($conn, $idOportunidade, $requisito);
            }
        }

        // Fecha a conexão com o banco de dados
        $conn = null;
        // Redireciona para uma página de sucesso após o cadastro bem-sucedido
        header("Location: ../view/cadastroSucesso.php");
        exit();
    } catch (PDOException $e) {
        // Exibe uma mensagem de erro se ocorrer um erro na conexão ou no processo de cadastro
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }
}

// Função para inserir um tipo de oportunidade na tabela tipoOportunidade
function inserirTipo($conn, $idOportunidade, $tipo) {
    // Consulta SQL para inserir na tabela tipoOportunidade
    $queryTipoOportunidade = "INSERT INTO sistema.tipoOportunidade (tipo, idOportunidade) VALUES (:tipo, :idOportunidade)";
    $stmtTipoOportunidade = $conn->prepare($queryTipoOportunidade);
    $stmtTipoOportunidade->bindParam(':tipo', $tipo);
    $stmtTipoOportunidade->bindParam(':idOportunidade', $idOportunidade);
    $stmtTipoOportunidade->execute();
}

// Função para inserir um requisito de oportunidade na tabela requisitoOportunidade
function inserirRequisito($conn, $idOportunidade, $requisito) {
    // Consulta SQL para inserir na tabela requisitoOportunidade
    $queryRequisitoOportunidade = "INSERT INTO sistema.requisitoOportunidade (requisito, idOportunidade) VALUES (:requisito, :idOportunidade)";
    $stmtRequisitoOportunidade = $conn->prepare($queryRequisitoOportunidade);
    $stmtRequisitoOportunidade->bindParam(':requisito', $requisito);
    $stmtRequisitoOportunidade->bindParam(':idOportunidade', $idOportunidade);
    $stmtRequisitoOportunidade->execute();

}
?>