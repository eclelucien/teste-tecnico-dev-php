<?php

namespace Eclesiaste\TesteTecnicoDevPhp\services;

use Eclesiaste\TesteTecnicoDevPhp\config\Database;
use Eclesiaste\TesteTecnicoDevPhp\helpers\Helper;
use PDO;

class ServiceGeral extends Database {
   
    public function getClients() {
        $helper = new Helper();
        $response = $helper->callApi();
        $data = json_decode($response, true);
        foreach ($data['results'] as $user) {
            $exists = $this->clientExistsByEmail($user['email']);
            var_dump($exists);
            if (!$exists) {
                $this->insertIntoDatabase($user);
            }
        }
    }

    private function insertIntoDatabase($user) {
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
    
        $location = $user['location'];
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
    
        $locationId = $this->pdo->lastInsertId();
    
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
    }
    

    public function clientExistsByEmail($email) {
        $query = "SELECT COUNT(*) FROM clientes WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->fetchColumn();
        return $count > 0;
    }
}