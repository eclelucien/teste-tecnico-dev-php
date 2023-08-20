<?php

class Cliente extends Database{
    protected $table = 'clientes';

    public int $id;
    public string $gender;
    public string $name;
    public int $location_id;
    public string $email;
    public $login;
    public $dob;
    public $registered;
    public string $phone;
    public string $cell;
    public  $picture;
    public string $nat;

    public function findAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM $this->table");
        return $stmt->fetchAll();
    }

}