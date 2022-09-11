<?php 

class Routes {

    public function __construct()
    {
        //echo 'Heyy, first class';
        $this -> url();

        var_dump($this -> url());
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