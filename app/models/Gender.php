<?php

class Gender {
    private $database;
    
    // Prepare database for use
    public function __construct() {
        $this->database = new Database;
    }

    // Returns all user genders
    public function getAllGenders() {
        $this->database->prepare("SELECT * FROM genders ORDER BY id");
        return $this->database->getArray();
    }
}
    