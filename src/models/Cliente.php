<?php

namespace Eclesiaste\TesteTecnicoDevPhp\models;
use Eclesiaste\TesteTecnicoDevPhp\config\Database;
use Exception;
use PDO;

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

    public function insertClient($user, $locationId) {
        try {
            $gender = $user['gender'];
            $name = !is_null($user['name']) ? json_encode($user['name']) : null;
            $email = $user['email'];
            $login = !is_null($user['login']) ? json_encode($user['login']) : null;
            $dob = !is_null($user['dob']) ? json_encode($user['dob']) : null;
            $registered = !is_null($user['registered']) ? json_encode($user['registered']) : null;
            $phone = $user['phone'];
            $cell = $user['cell'];
            $picture = !is_null($user['picture']) ? json_encode($user['picture']) : null;
            $nat = $user['nat'];
        
            $clientSql = "INSERT INTO clientes (gender, name, location_id, email, login, dob, registered, phone, cell, picture, nat) 
                            VALUES (:gender, :name, :locationId, :email, :login, :dob, :registered, :phone, :cell, :picture, :nat)";
            $clientStmt = $this->pdo->prepare($clientSql);
            $clientStmt->bindParam(':gender', $gender, PDO::PARAM_STR);
            $clientStmt->bindParam(':name', $name, PDO::PARAM_STR);
            $clientStmt->bindParam(':locationId', $locationId, PDO::PARAM_INT);
            $clientStmt->bindParam(':email', $email, PDO::PARAM_STR);
            $clientStmt->bindParam(':login', $login, PDO::PARAM_STR);
            $clientStmt->bindParam(':dob', $dob, PDO::PARAM_STR);
            $clientStmt->bindParam(':registered', $registered, PDO::PARAM_STR);
            $clientStmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $clientStmt->bindParam(':cell', $cell, PDO::PARAM_STR);
            $clientStmt->bindParam(':picture', $picture, PDO::PARAM_STR);
            $clientStmt->bindParam(':nat', $nat, PDO::PARAM_STR);
            $clientStmt->execute();
            return true;
        } catch (\Throwable $th) {
            throw new Exception("Não foi possivel recuperar os clientes");
        }
    }

    public function getByEmail($email) {
        $query = "SELECT COUNT(*) FROM clientes WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

}