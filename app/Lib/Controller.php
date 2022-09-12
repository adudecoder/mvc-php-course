<?php

    /**
     * Base controller
     * Load models and views
     */

    class Controller {

        // Load the models
        public function model($model) {
            // Requires template file
            require_once '../app/Models/'.$model.'.php';
            // Instance the model
            return new $model;
        }
        
        // Load the views
        public function view($view, $dados = []) {
            $file = ('../app/Views/'.$view.'.php');
            
            if (file_exists($file)) {
                // Requires view file
                require_once $file;
            } else {
                // The die() function ends the script execution
                die('View file not exists');
            }
        }

    }

?>