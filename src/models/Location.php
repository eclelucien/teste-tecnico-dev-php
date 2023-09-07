<?php

namespace Eclesiaste\TesteTecnicoDevPhp\models;

use Eclesiaste\TesteTecnicoDevPhp\config\Database;
use Exception;
use PDO;

class Location extends Database{
    
    protected $table = 'locations';

    private int $id;
    private  $street;
    private string $city;
    private int $state;
    private string $country;
    private int $postcode;
    private $coordinates;
    private $timezone;

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        $this->id = $row['id'];
        $this->street = $row['street'];
        $this->city = $row['city'];
        $this->state = $row['state'];
        $this->country = $row['country'];
        $this->postcode = $row['postcode'];
        $this->timezone = $row['timezone'];
        return $this;
    }

    public function insertLocation($location) {
        try {
            $street = !is_null($location['street']) ? json_encode($location['street']) : null;
            $city = $location['city'];
            $state = $location['state'];
            $country = $location['country'];
            $postcode = $location['postcode'];
            $coordinates = !is_null($location['coordinates']) ? json_encode($location['coordinates']) : null;
            $timezone = !is_null($location['timezone']) ? json_encode($location['timezone']) : null;
            $locationSql = "INSERT INTO locations (street, city, state, country, postcode, coordinates, timezone) 
                            VALUES (:street, :city, :state, :country, :postcode, :coordinates, :timezone)";
            $locationStmt = $this->pdo->prepare($locationSql);
            $locationStmt->bindParam(':street', $street, PDO::PARAM_STR);
            $locationStmt->bindParam(':city', $city, PDO::PARAM_STR);
            $locationStmt->bindParam(':state', $state, PDO::PARAM_STR);
            $locationStmt->bindParam(':country', $country, PDO::PARAM_STR);
            $locationStmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
            $locationStmt->bindParam(':coordinates', $coordinates, PDO::PARAM_STR);
            $locationStmt->bindParam(':timezone', $timezone, PDO::PARAM_STR);
            $locationStmt->execute();
        
            return $this->pdo->lastInsertId();
        } catch (\Throwable $th) {
            throw new Exception("Não foi possivel recuperar os clientes");
        }
    }


}