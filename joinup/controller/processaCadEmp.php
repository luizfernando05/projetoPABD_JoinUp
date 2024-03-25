<?php
// Inclui o arquivo de configuração do banco de dados (contém informações de conexão)
include_once('../model/config.php');

// Função para cadastrar uma empresa no banco de dados
function cadastrar_empresa($nome, $cnpj, $setor, $email, $telefone, $usuarioAdm) {
    global $conn;

    try {
         // Define a consulta SQL para inserir os dados da empresa no banco de dados
        $query = "INSERT INTO sistema.empresa (cnpjEmpresa, nomeEmpresa, setorEmpresa, emailEmpresa, telefoneEmpresa, usuarioAdm) VALUES (:cnpj, :nome, :setor, :email, :telefone, :usuarioAdm)";
        $stmt = $conn->prepare($query);

        // Vincula os parâmetros da consulta SQL aos valores fornecidos
        $stmt->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':setor', $setor, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $telefone, PDO::PARAM_INT);
        $stmt->bindParam(':usuarioAdm', $usuarioAdm, PDO::PARAM_STR);

        // Executa a consulta SQL para inserir os dados da empresa
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        // Retorna uma mensagem de erro se ocorrer um erro durante o cadastro
        return "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
}

// Verifica se a requisição HTTP é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário enviados via POST
    $nome = $_POST["nomeEmpresa"];
    $cnpj = $_POST["cnpjEmpresa"];
    $setor = $_POST["setorEmpresa"];
    $email = $_POST["emailEmpresa"];
    $telefone = $_POST["telefoneEmpresa"];
    $usuarioAdm = $_POST["usuarioAdm"]; 

    // Chama a função cadastrar_empresa para inserir os dados da empresa no banco de dados
    $resultado = cadastrar_empresa($nome, $cnpj, $setor, $email, $telefone, $usuarioAdm);

    // Verifica o resultado do cadastro
    if ($resultado === true) {
        // Redireciona para uma página de sucesso após o cadastro bem-sucedido
        header("Location: ../view/cadastroSucesso.php");
        exit();
    } else {
         // Redireciona para uma página de erro com a mensagem de erro após um erro no cadastro
        header("Location: cadastro_erro.php?mensagem=" . urlencode($resultado));
        exit();
    }
}
?>