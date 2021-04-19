<?php

class Cars extends Controller
{        
    public function __construct() {
        $this->carsModel = $this->model("Car");
    }
        
    public function index() {
        // Get all cars from the table
        $cars = $this->carsModel->getAllCars();

        $data = [
            "title" => "Auto's",
            "description" => "Hier zijn alle auto's te vinden",
            "pagetitle" => "Auto's",
            "cars" => $cars
        ];

        $this->view("pages/cars", $data);
    }
}
