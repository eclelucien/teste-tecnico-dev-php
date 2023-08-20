<?php

use Eclesiaste\TesteTecnicoDevPhp\config\Database;

class Cliente extends Database{
    protected $table = 'clientes';

    private int $id;
    private string $gender;
    private string $name;
    private int $location_id;
    private string $email;
    private $login;
    private $dob;
    private $registered;
    private string $phone;
    private string $cell;
    private $picture;
    private string $nat;

    public function findAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM $this->table");
        return $stmt->fetchAll();
    }

}