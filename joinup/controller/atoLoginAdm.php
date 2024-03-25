<?php
// Inclui o arquivo de configuração do banco de dados (contém informações de conexão)
include_once('../model/config.php');

// Verifica se a requisição HTTP é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o nome de usuário (usuarioAdm) e senha (senhaAdm) do formulário enviado via POST
    $usuarioAdm = $_POST["usuarioAdm"];
    $senhaAdm = $_POST["senhaAdm"];

    // Define a consulta SQL para verificar as credenciais do administrador
    $query = "SELECT usuarioAdm FROM sistema.administrador WHERE usuarioAdm = :usuarioAdm AND senhaAdm = :senhaAdm";

    // Prepara a consulta SQL para evitar injeção de SQL e vincula os parâmetros
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':usuarioAdm', $usuarioAdm, PDO::PARAM_STR);
    $stmt->bindParam(':senhaAdm', $senhaAdm, PDO::PARAM_STR);

    // Executa a consulta SQL
    $stmt->execute();

    // Verifica se a consulta retornou algum resultado (linha)
    if ($stmt->rowCount() > 0) {
        // Inicia a sessão para rastrear a autenticação do administrador
        session_start();
        $_SESSION['usuarioAdm'] = $usuarioAdm;

        // Redireciona o administrador para a página principal do administrador após o login bem-sucedido
        header("Location: ../view/indexAdm.php");
        exit(); 
    } else {
        // Exibe uma mensagem de erro se as credenciais de login estiverem incorretas
        echo "Credenciais de login incorretas. Tente novamente.";
    }

    // Fecha o cursor do banco de dados e encerra a conexão
    $stmt->closeCursor();
    $conn = null; 
}
?>