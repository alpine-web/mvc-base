<?php

class Admin extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model("User");
        $this->productModel = $this->model("Product");

        // Check if user is admin, if not send back to dashboard/home
        if (!$_SESSION["useradmin"] == 1) {
            redirect("dashboard");
        }
    }

    public function index() {
        $data = [
            "title" => "Administratie",
            "description" => "Welkom op het admin dashboard, selecteer een optie vanuit het menu om verder te gaan",
            "pagetitle" => "Administratie"
        ];

        $this->view("pages/admin/dashboard", $data);
    }

    public function users() {
        $users = $this->userModel->getAllUsers();

        $data = [
            "title" => "Gebruikers",
            "description" => "Hier kun je de geregistreerde gebruikers beheren",
            "pagetitle" => "Gebruikers beheren",
            "users" => $users
        ];

        $this->view("pages/admin/users", $data);
    }

    public function user($id) {
        $user = $this->userModel->findUserById($id);

        $data = [
            "user" => $user,
            "pagetitle" => $user[0]->name
        ];

        $this->view("pages/admin/user", $data);
    }

    public function addUser() {
        $data = [
            "pagetitle" => "Gebruiker toevoegen"
        ];

        $this->view("pages/admin/addUser", $data);
    }

    public function deleteUser($id) {
        if (!empty($this->productModel->findUserById($id))) {
            try {
                $this->productModel->deleteUserById($id);
                redirect("/admin/products");
            } catch (\Throwable $th) {
                return "Er is iets fout gegaan";
            }
        }
    }

    public function products() {
        $products = $this->productModel->getAllProducts();

        $data = [
            "title" => "Producten",
            "description" => "Hier kun je de producten van de shop beheren",
            "pagetitle" => "Producten beheren",
            "products" => $products
        ];

        $this->view("pages/admin/products", $data);
    }

    public function product($id) {
        $product = $this->productModel->findProductById($id);

        $data = [
            "product" => $product,
            "pagetitle" => $product[0]->product_name
        ];

        $this->view("pages/admin/product", $data);
    }

    public function addProduct() {
        $data = [
            "pagetitle" => "Product toevoegen"
        ];

        $this->view("pages/admin/addUser", $data);
    }

    public function deleteProduct($id) {
        if (!empty($this->productModel->findProductById($id))) {
            try {
                $this->prodructModel->deleteProductById($id);
                redirect("/admin/products");
            } catch (\Throwable $th) {
                return "Er is iets fout gegaan";
            }
        }
    }
}
