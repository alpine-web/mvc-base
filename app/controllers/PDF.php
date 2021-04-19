<?php

use Dompdf/Dompdf;

class PDF extends Controller
{
    public function __construct()
    {
        $this->pdf      = new Dompdf();
    }

    public function index()
    {
        $data = [
            "title" => "PDF",
            "description" => "Welkom op het PDF dashboard",
            "pagetitle" => "PDF"
        ];

        $this->view("pages/pdf", $data);
    }

    public function first()
    {
        $this->pdf->loadHtml('hello world');
    }
}
