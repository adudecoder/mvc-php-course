<?php 

    /*
        Class routes
        Create URLs, load controllers, methods and parameters
        URL FORMAT - /controller/method/parameters
    */

class Routes {

    // Class attributes
    private $controller = 'Pages';
    private $method = 'index';
    private $parameters = [];

    public function __construct()
    {
        // If the url exists, throws the url function into the $url variable
        $url = $this -> url() ? $this -> url() : [0];

        // Check controller exists
        // ucwords - Convert the first character of each word to uppercase
        if (file_exists('../app/Controllers/'.ucwords($url[0]).'.php')) {
            // If exists, instance as controller
            $this -> controller = ucwords($url[0]);
            // unset - Destroy a specific variable
            unset($url[0]);
        }

        // Require controller
        require_once '../app/Controllers/'.$this -> controller.'.php';
        // Controller Instance
        $this -> controller = new $this -> controller;

        // Checks if the method exists, second part of the url
        if (isset($url[1])) {
            // method_exists - Check if class method exists
            if (method_exists($this -> controller, $url[1])) {
                $this -> method = $url[1];
                unset($url[1]);
            }
        }

        // Check parameters exist
        // If it exists, it returns an array with the values, if not, it returns an empty array
        // array_values - Returns all values from an array
        $this -> parameters = $url ? array_values($url) : [];
        // call_user_func_array - Call a user function type with an array of parameters
        call_user_func_array([$this -> controller, $this -> method], $this -> parameters);

    }

    // Returns the URL in an array
    private function url() {
        // The filter FILTER_SANITIZE_URL removes all illegal characters from a URL
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

        // Verify if a URL exists
        if (isset($url)) {
            // trim - Strip space at the beginning and end of a string
            // rtrim - Strip whitespace (or other characters) from the end of the string
            $url = trim(rtrim($url, '/'));
            $url = explode('/', $url);
            // explode - Splits a string into strings, returns an array

            return $url;
        }
    }

}
