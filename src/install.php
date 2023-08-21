<?php

require_once 'vendor/autoload.php';


use Eclesiaste\TesteTecnicoDevPhp\config\Database;
use Eclesiaste\TesteTecnicoDevPhp\services\UserManagement;
use Exception;

// class Installation{
//     public function execute(){
//         try {
//             $db = new Database();
//             $service = new UserManagement();
//             $db->createTables();
//             $service->getClients();
//             echo "Sucesso: banco de dados criado. \n";
//         } catch (PDOException $e) {
//             echo "Erro: problema para criar o banco de dados. \n";
//             echo "Mensagem: " . $e->getMessage() . "\n";
//         }
//     }
// }

// $inst = new Installation();
// $inst->execute();

try {
    $db = new Database();
    $service = new UserManagement();
    $db->createTables();
    $service->getClients();

    echo "Sucesso: banco de dados criado. \n";
} catch (Exception $e) {
    echo "Erro: problema para criar o banco de dados. \n";
    echo "Mensagem: " . $e->getMessage() . "\n";
}