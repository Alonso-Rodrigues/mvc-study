<?php
// Base controller 
// To load models and views
class Controller
{
    // To load the models
    public function model($model)
    {
        // to request the file file
        require_once '../app/models/' . $model . '.php';
        // instance the model
        return new $model;
    }
    // To load the views
    public function view($view, $data = [])
    {
        $file = ('../app/views/' . $view . '.php');
        if (file_exists($file)) {
            // To request the file view
            require_once $file;
        } else {
            // The die() function ends the execution of the script
            die('The file does not exist!');
        }
    }
}
