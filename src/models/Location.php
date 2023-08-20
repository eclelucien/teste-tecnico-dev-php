<?php

use Eclesiaste\TesteTecnicoDevPhp\config\Database;

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

}