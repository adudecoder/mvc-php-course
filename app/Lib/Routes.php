<?php 

class Routes {

    private $controller = 'Pages';

    public function __construct()
    {
        $url = $this -> url() ? $this -> url() : [0];

        if (file_exists('../app/Controllers/'.ucwords($url[0]).'.php')) {
            $this -> controller = ucwords($url[0]);
            unset($url[0]);
        }

        require_once '../app/Controllers/'.$this -> controller.'.php';
        $this -> controller = new $this -> controller;

        var_dump($this);
    }

    private function url() {
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

        if (isset($url)) {

            $url = trim(rtrim($url, '/'));
            $url = explode('/', $url);

            return $url;
        }
    }

}

?>