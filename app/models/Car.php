<?php

class Car {
    private $database;
    
    // Prepare database for use
    public function __construct() {
        $this->database = new Database;
    }

    // Returns all user cars
    public function getAllCars() {
        $this->database->prepare("SELECT * FROM cars ORDER BY id");
        return $this->database->getArray();
    }
}
    