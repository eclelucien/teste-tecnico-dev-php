<?php

require_once 'config/Database.php';

try {
    $db = new Database();
    $db->createTables();

    echo "Sucesso: banco de dados criado. \n";
} catch (PDOException $e) {
    echo "Erro: problema para criar o banco de dados. \n";
    echo "Mensagem: " . $e->getMessage() . "\n";
}