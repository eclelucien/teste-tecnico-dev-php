<?php

use Eclesiaste\TesteTecnicoDevPhp\config\Database;

class Location extends Database{
    
    protected $table = 'locations';

    public int $id;
    public  $street;
    public string $city;
    public int $state;
    public string $country;
    public int $postcode;
    public $coordinates;
    public $timezone;

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

}