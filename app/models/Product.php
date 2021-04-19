<?php

class Product {
    private $database;
    
    // Prepare database for use
    public function __construct() {
        $this->database = new Database;
    }
    
    // returns all products
    public function getAllProducts() {
        $this->database->prepare("SELECT * FROM products ORDER BY id");
        return $this->database->getArray();
    }

    // finds a product via id
    public function findProductById($id) {
        $this->database->prepare("SELECT * FROM products WHERE id = :id");
        $this->database->bind(':id', $id);
        return $this->database->getArray();
    }

    public function deleteProductById($id) {
        if ($this->database->prepare("DELETE FROM products WHERE id = ' . $id . '") === TRUE) {
            return "Record deleted successfully";
        } else {
            return "Error deleting record: " . $this->database->error;
        }
    }
}
    