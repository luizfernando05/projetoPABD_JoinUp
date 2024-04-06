<?php
// Inclui o arquivo de configuração do banco de dados (contém informações de conexão)
include_once('../model/config.php');

// Verifica se a requisição HTTP é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o nome de usuário (usuarioAdm) e senha (senhaAdm) do formulário enviado via POST
    $usuarioAdm = $_POST["usuarioAdm"];
    $senhaAdm = $_POST["senhaAdm"];

    // Coleção onde estão armazenados os administradores
    $collection = $database->administrador;

    $filtro = [
        'usuarioAdm' => $usuarioAdm,
        'senhaAdm' => $senhaAdm
    ];

    // Executa uma consulta na coleção de administradores
    $adminEncontrado = $collection->findOne($filtro);

    // Verifica se o administrador foi encontrado
    if ($adminEncontrado) {
        // Inicia a sessão para rastrear a autenticação do administrador
        session_start();
        $_SESSION['usuarioAdm'] = $adminEncontrado['usuarioAdm'];

        // Redireciona o administrador para a página principal do administrador após o login bem-sucedido
        header("Location: ../view/indexAdm.php");
        exit(); 
    } else {
        // Exibe uma mensagem de erro se as credenciais de login estiverem incorretas
        echo "Credenciais de login incorretas. Tente novamente.";
    }
}
?>