<?php

namespace Eclesiaste\TesteTecnicoDevPhp\services;

use Eclesiaste\TesteTecnicoDevPhp\config\Database;
use Eclesiaste\TesteTecnicoDevPhp\helpers\Helper;
use Eclesiaste\TesteTecnicoDevPhp\models\Cliente;
use Eclesiaste\TesteTecnicoDevPhp\models\Location;

class UserManagement extends Database {
   
    public function getClients() {
        $helper = new Helper();
        $response = $helper->callApi();
        $data = json_decode($response, true);
        foreach ($data['results'] as $user) {
            $exists = $this->clientExistsByEmail($user['email']);
            if (!$exists) {
                $this->insertIntoDatabase($user);
                return true;
            }
        }
        return false;
    }

    public function insertIntoDatabase($user) {
        $cliente = new Cliente();
        $location = new Location();
        $locationId = $location->insertLocation($user['location']);
        $cliente->insertClient($user, $locationId);
        return true;
    }
    
    public function clientExistsByEmail($email) {
        $cliente = new Cliente();
        return $cliente->getbyEmail($email) > 0;
    }

    
}