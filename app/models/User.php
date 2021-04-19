<?php

class User {
    private $database;
    
    // Prepare database for use
    public function __construct() {
        $this->database = new Database;
    }

    // Find user by email
    public function checkUserExists($email) {
        // Create and execute query
        $this->database->prepare("SELECT * FROM users WHERE email = :email");
        $this->database->bind(":email", $email);
        $this->database->getRow();

        // Check the rowcount
        if ($this->database->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Register user
    public function register($data) {
        // Create and execute query
        $this->database->prepare("INSERT INTO users (name, email, password, gender) VALUES (:name, :email, :password, :gender)");
        $this->database->bind(":name", $data['name']);
        $this->database->bind(":email", $data['email']);
        $this->database->bind(":password", $data['password']);
        $this->database->bind(":gender", $data['gender']);

        if ($this->database->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Log the user in
    public function login($email, $password) {
        // Create and execute query
        $this->database->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $this->database->bind(":email", $email);
        $this->database->bind(":password", $password);
        return $this->database->getRow();
    }

    // Returns all users
    public function getAllUsers() {
        $this->database->prepare("SELECT * FROM users ORDER BY id");
        return $this->database->getArray();
    }

    // Finds a user via their id
    public function findUserById($id) {
        $this->database->prepare("SELECT * FROM users WHERE id = :id");
        $this->database->bind(':id', $id);
        return $this->database->getArray();
    }

    public function deleteUserById($id) {
        if ($this->database->prepare("DELETE FROM users WHERE id = ' . $id . '") === TRUE) {
            return "Record deleted successfully";
        } else {
            return "Error deleting record: " . $this->database->error;
        }
    }
    
}
    