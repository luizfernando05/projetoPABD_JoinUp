<?php
require '../vendor/autoload.php';

$mongo_host = "localhost";
$mongo_port = "27017";
$mongo_db = "joinup";
$mongo_user = "";
$mongo_password = "";

try {
    $mongoClient = new MongoDB\Client("mongodb://$mongo_host:$mongo_port");

    $database = $mongoClient->$mongo_db;

    // echo "Conexão com o banco de dados estabelecida com sucesso.";

} catch (MongoDB\Exception\Exception $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>