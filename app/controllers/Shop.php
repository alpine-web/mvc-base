<?php

class Shop extends Controller
{
    public function __construct() {
        $this->productModel = $this->model("Product");
    }
        
    public function index() {
        // Get all products from the table
        $products = $this->productModel->getAllProducts();

        $data = [
            "title" => "Shop",
            "description" => "Welkom in de shop",
            "products" => $products,
            "pagetitle" => "Producten"
        ];

        $this->view("pages/shop", $data);
    }

    public function product($id) {
        // Find a product based on the id
        $product = $this->productModel->findProductById($id);

        $data = ["product" => $product,
                    "pagetitle" => $product[0]->product_name];

        $this->view("pages/product", $data);
    }
}
