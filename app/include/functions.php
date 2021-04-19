<?php

// Encrypt user password (don't use md5 in production pls)
function encrypt($password) {
    return md5($password);
}

// Method to check if the page is currently active and set navbar item on active class
function isNavPageActive($page) {
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == URLROOT . $page ? "active" : "";
}

// Simple page redirect
function redirect($page) {
    header('location: ' . URLROOT . "/" . $page);
}

// Create error popups
function flash($name, $message = "", $class="alert alert-success") {
    if (!empty($name)) {
        if (!empty($message)) {
            // If the message is filled, set the value
            $_SESSION[$name . "_message"] = $message;
            $_SESSION[$name . "_class"] = $class;
        } else {
            // No message passed, so display attemp
            if (!empty($_SESSION[$name . "_message"])) {
                $class = !empty($_SESSION[$name . "_class"]) ?
                $_SESSION[$name . "_class"] : "";
                echo "<div class=\"" . $class . "\" id=\"msgflash\">" . $_SESSION[$name."_message"] . "</div>";
                unset($_SESSION[$name . "_message"]);
                unset($_SESSION[$name . "_class"]);
            }
        }
    }
}