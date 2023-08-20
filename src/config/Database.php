<?php

namespace Eclesiaste\TesteTecnicoDevPhp\config;

use PDO;
use PDOException;

class Database {
    
    private $host = "db";
    private $username = "ecle";
    private $password = "password";
    private $database = "testepratica";
    public $pdo;

    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->database";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function createTables() {
        $sqlFile = 'src/config/database.sql';
        if (file_exists($sqlFile)) {
            $sql = file_get_contents($sqlFile);
            $this->pdo->exec($sql);
        } else {
            echo "Arquivo $sqlFile nao encontrado. \n";
        }
    }
}