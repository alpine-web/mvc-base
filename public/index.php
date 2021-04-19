<?php

// Error reporting 1=on, 0=off
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session for user access
session_start();

// Require autoloader
require_once "../app/bootstrap.php";

// Init Core library
$core = new Core();