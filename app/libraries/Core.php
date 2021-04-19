<?php

class Core
{
    protected $currentController = "Dashboard";
    protected $currentMethod = "index";
    protected $params = [];

    // Transforms the url string from the $_GET into array items
    public function getUrl() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'],"/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/",$url);
            return $url;
        }
    }

    public function __construct() {
        // Break argument string in array
        $url = $this->getUrl();

        if (isset($url[0])) {
            // Prepare the class name
            $param = ucwords(strtolower($url[0]));
            
            // Check if the controller exists
            if (file_exists("../app/controllers/" . $param . ".php")) {
                // If exists, set as controller
                $this->currentController = $param;
                // Unset the first word
                unset($url[0]);
            }
        }

        // Require the controller
        require_once "../app/controllers/" . $this->currentController . ".php";

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for 2nd part
        if (isset($url[1])) {
            // Prepare the method name
            $param = strtolower($url[1]);

            // Check if method exists in controller
            if (method_exists($this->currentController, $param)) {
                // If exists, set as method
                $this->currentMethod = $param;
                // Unset the first word
                unset($url[1]);
            }
        }

        // Move other params from URL to params array
        $this->params = $url ? array_values($url) : [];

        // Call the method with an array of params
        call_user_func_array([$this->currentController,
                                $this->currentMethod],
                                $this->params);

    }
}
