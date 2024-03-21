<?php

/*
Route Class
Creates URLs, loads controllers, methods and parameters
URL format - /controlador/method/parameters
*/

class Route
{   // Class attributes
    private $controller = "pages";
    private $method = "index";
    private $parameters = [];

    public function __construct()
    {   // If the URL exists, play the URL function in the $url variable
        $url = $this->url() ? $this->url() : [0];
        // Checks if the controller exists
        // ucwords - converts the first character of each word to uppercase
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // If it exists, it will be set as controller
            $this->controller = ucwords($url[0]);
            // unset - destroys the specific variable
            unset($url[0]);
        }
        // Requires the controller
        require_once '../app/controllers/' . $this->controller . '.php';
        // Instantiates the controller
        $this->controller = new $this->controller;
        // Checks if the method exists, second part of the URL
        if (isset($url[1])) {
            // method_exists – checks if the class method exists
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        // If exists return an array with the values if not return an empty array
        // array_values - returns all values from an array
        $this->parameters = $url ? array_values($url) : [];
        // call_user_func_array - calls a given user function with an array of parameters
        call_user_func_array([$this->controller, $this->method], $this->parameters);
    }
    // Returns the url in an array
    private function url()
    {
        // The FILTER_SANITIZE_URL - removes all illegal characters from a url
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        // Checks if the url exists
        if (isset($url)) {
            // trim - removes space at the beginning and end of a string
            // rtrim - removes white space (or other characters) from the end of the string
            $url = trim(rtrim($url, '/'));
            // explode - splits a string into strings, returns an array
            $url = explode('/', $url);
            return $url;
        }
    }
}
