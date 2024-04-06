<?php
require 'config.php'; // Inclua o arquivo de configuração

// Coleção onde você quer inserir os documentos
$collection = $database->minhaColecao;

// Documento que você quer inserir
$documento = [
    'titulo' => 'Meu primeiro documento',
    'conteudo' => 'Este é um exemplo de conteúdo para o meu primeiro documento no MongoDB.',
    'autor' => 'João Silva',
];

try {
    // Insere o documento na coleção
    $insertOneResult = $collection->insertOne($documento);

    // Imprime o ID do documento inserido
    echo "Documento inserido com ID: " . $insertOneResult->getInsertedId();
} catch (MongoDB\Exception\Exception $e) {
    die("Erro ao inserir o documento: " . $e->getMessage());
}
?>