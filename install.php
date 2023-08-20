<?php

require_once 'config/Database.php';
require_once './src/services/ServiceGeral.php';


try {
    $db = new Database();
    $service = new ServiceGeral();
    $db->createTables();
    $service->getClients();


    echo "Sucesso: banco de dados criado. \n";
} catch (PDOException $e) {
    echo "Erro: problema para criar o banco de dados. \n";
    echo "Mensagem: " . $e->getMessage() . "\n";
}