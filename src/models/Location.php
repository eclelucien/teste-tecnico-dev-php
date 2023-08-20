<?php

class Location {
    protected $table = 'locations';

    public int $id;
    public  $street;
    public string $city;
    public int $state;
    public string $country;
    public int $postcode;
    public $coordinates;
    public $timezone;

}