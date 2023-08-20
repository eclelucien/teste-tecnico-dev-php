<?php


class ServiceGeral extends Database {
    static $api_url = "https://randomuser.me/api/?results=20";

    public function getClients() {
        $response = file_get_contents(self::$api_url);
        $data = json_decode($response, true);

        foreach ($data['results'] as $user) {
            $gender = $user['gender'];
            $name = json_encode($user['name']);
            $email = $user['email'];
            $login = json_encode($user['login']);
            $dob = json_encode($user['dob']);
            $registered = json_encode($user['registered']);
            $phone = $user['phone'];
            $cell = $user['cell'];
            $picture = json_encode($user['picture']);
            $nat = $user['nat'];

            $location = $user['location'];
            $street = json_encode($location['street']);
            $city = $location['city'];
            $state = $location['state'];
            $country = $location['country'];
            $postcode = $location['postcode'];
            $coordinates = json_encode($location['coordinates']);
            $timezone = json_encode($location['timezone']);

            $locationSql = "INSERT INTO locations (street, city, state, country, postcode, coordinates, timezone) 
                            VALUES ('$street', '$city', '$state', '$country', '$postcode', '$coordinates', '$timezone')";
            
            if ($this->pdo->query($locationSql) !== TRUE) {
                echo "Error: " . $locationSql . "<br>" . $this->pdo->errorInfo();
            }

            $locationId = $this->pdo->lastInsertId();

            $clientSql = "INSERT INTO clientes (gender, name, location_id, email, login, dob, registered, phone, cell, picture, nat) 
                          VALUES ('$gender', '$name', '$locationId', '$email', '$login', '$dob', '$registered', '$phone', '$cell', '$picture', '$nat')";
            
            if ($this->pdo->query($clientSql) !== TRUE) {
                echo "Error: " . $clientSql . "<br>" . $this->pdo->errorInfo();
            }
        }
    }
}