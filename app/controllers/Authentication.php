<?php

class Authentication extends Controller {
    
    public function __construct() {
        $this->userModel = $this->model("User");
        $this->genderModel = $this->model("Gender");
    }

    // Called for loading and post requests
    public function register() {
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            // Load the form data
            $data = [
                "pagetitle" => "Aanmelden",
                "name" => "",
                "email" => "",
                "password" => "",
                "confirmpassword" => "",
                "gender" => "",
                "name_error" => "",
                "email_error" => "",
                "password_error" => "",
                "confirmpassword_error" => "",
                "gender_error" => "",
                "genders" => $this->genderModel->getAllGenders()
            ];

            // Load view
            $this->view("authentication/register", $data);
        } else {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Load the form data
            $data = [
                "pagetitle" => "Aanmelden",
                "name" => trim($_POST['name']),
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "confirmpassword" => trim($_POST['confirmpassword']),
                "gender" => "1",
                "name_error" => "",
                "email_error" => "",
                "password_error" => "",
                "confirmpassword_error" => "",
                "gender_error" => ""
            ];

            // Validate
            if (empty($data['name'])) {
                $data['name_error'] = "Geef uw naam in";
            }

            if (empty($data['email'])) {
                $data['email_error'] = "Geef het email adres in";
            } else {        
                // Check existing email
                if ($this->userModel->checkUserExists($data['email'])){
                    $data['email_error'] = "Email adres is al in gebruik";
                }
            }

            if (empty($data['password'])) {
                $data['password_error'] = "Geef het wachtwoord in";
            } elseif (strlen($data['password']) < 6) {
                $data['password_error'] = "Het wachtwoord moet minstens 6 tekens lang zijn";
            }

            if (empty($data['confirmpassword'])) {
                $data['confirmpassword_error'] = "Herhaal aub het wachtwoord";
            } elseif (strlen($data['password']) < 6) {
                $data['confirmpassword_error'] = "Het herhaalde wachtwoord moet minstens 6 tekens lang zijn";
            } elseif ($data['password'] != $data['confirmpassword']) {
                $data['confirmpassword_error'] = "De wachtwoorden komen niet overeen";
            }

            if (empty($data['name'])) {
                $data['gender_error'] = "Vul uw geslacht in";
            }

            // Check of no errors have been found
            if ((empty($data['name_error'])) && (empty($data['email_error'])) && (empty($data['password_error'])) && (empty($data['confirmpassword_error']) && (empty($data['gender_error'])))) {
                // Encrypt password
                $data['password'] = encrypt($data['password']);

                // Register user
                if ($this->userModel->register($data)) {
                    flash("register_success", "Registratie gelukt, u kunt nu inloggen");
                    redirect("/authentication/login");
                } else {
                    die("Registratie is niet gelukt");
                }
            } else {
                // Load view to display errors
                $this->view("authentication/register", $data);
            }
        }
    }

    // Handle login
    public function login() {
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            // Load the form data
            $data = [
                "pagetitle" => "Inloggen",
                "email" => "",
                "password" => "",
                "email_error" => "",
                "password_error" => "",
            ];

            // Load view
            $this->view("authentication/login", $data);
        } else {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Load the form data
            $data = [
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "email_error" => "",
                "password_error" => "",
            ];
            
            // Check of errors have been found
            if ((empty($data['email_error'])) &&
                    (empty($data['password_error']))) {
                        
                // Check and set logged in user
                // When okay, the row is returned, otherwise false
                $loggedInUser = $this->userModel->login($data["email"], encrypt($data["password"]));

                if ($loggedInUser) {
                    // Login okay, store in session
                    $_SESSION["userid"] = $loggedInUser->id;
                    $_SESSION["useremail"] = $loggedInUser->email;
                    $_SESSION["username"] = $loggedInUser->name;
                    $_SESSION["useradmin"] = $loggedInUser->admin;
                    redirect("dashboard");
                } else {
                    $data["email_error"] = "Email/wachtwoord combinatie is niet correct";
                    $data["password_error"] = "Email/wachtwoord combinatie is niet correct";
                    $data["pagetitle"] = "Aanmelden";
                    $this->view("authentication/login", $data);
                }
            } else {
                // Load view with errors
                $this->view("authentication/login", $data);
            }
        }
    }

    // Handle logout
    public function logout() {
        // Unset sessions and logout the users
        unset($_SESSION["userid"]);
        unset($_SESSION["useremail"]);
        unset($_SESSION["username"]);
        unset($_SESSION["useradmin"]);
        session_destroy();
        redirect("authentication/login");
    }
}
