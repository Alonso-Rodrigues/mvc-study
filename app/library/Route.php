<?php

class Route
{
    private $controller = "Pages";
    private $method = "index";

    public function __construct()
    {
        $url = $this->url() ? $this->url() : [0];

        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->controller = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        var_dump($this);
    }

    private function url()
    {
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        if (isset($url)) {
            $url = trim(rtrim($url, '/'));
            $url = explode('/', $url);
            return $url;
        }
    }
}
