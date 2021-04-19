<?php

// Autoload core libraries
spl_autoload_register(function($class) {
    require_once "libraries/" . $class . ".php";
});

// Load config
require_once "config/config.php";

// Load extra functions
require_once '../app/include/functions.php';
require_once '../app/include/dompdf/autoload.inc.php';