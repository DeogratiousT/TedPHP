<?php

    /**
     * Base Controller class
     * 
     * Loads Models and Views 
     * */ 
    class Controller{
        // Load Model
        public function model($model)
        {
            // change $mode case
            $model = ucwords($model);
            
            // check if model exists
            if (file_exists('../app/models/' . $model . '.php')) {
                // Require model file
                require_once '../app/models/' . $model . '.php';

                // Instantiate Model
                return new $model();
            }
        }

        // Load View with data
        public function view($view, $data = [])
        {
            // check if view exists
            if (file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            }else{
                die('View Does not exist');
            }
        }
    }