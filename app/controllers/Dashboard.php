<?php

class Dashboard extends Controller
{        
    public function index() {
        $data = [
            "title" => "Dashboard",
            "description" => "Welkom op het dashboard",
            "pagetitle" => "Dashboard"
        ];

        $this->view("pages/index", $data);
    }
}
