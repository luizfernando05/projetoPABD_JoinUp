<?php
// Definição das informações de conexão com o banco de dados
$db_host = "localhost";         // Host do banco de dados (geralmente "localhost" para servidores locais)
$db_port = "5432";              // Porta do banco de dados PostgreSQL (padrão: 5432)
$db_name = "joinup";            // Nome do banco de dados que você deseja conectar
$db_user = "";          // Nome de usuário do banco de dados
$db_password = "";      // Senha do banco de dados (substitua isso pela senha real)

try {
    // Cria uma instância da classe PDO e estabelece a conexão com o banco de dados
    $conn = new PDO("pgsql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_password);

    // Define o modo de tratamento de erros para lançar exceções em caso de erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Captura exceções PDO que podem ocorrer durante a conexão
    // Em caso de erro, exibe uma mensagem de erro personalizada com a descrição do erro
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
