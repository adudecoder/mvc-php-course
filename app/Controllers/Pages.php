<?php

    class Pages extends Controller {

        public function index() {

            $data = [
                'pageTitle' => 'First Page',
                'description' => 'Blog'
            ];

            $this -> view('pages/home', $data);
        }
        
        public function about() {
            
            $data = [
                'pageTitle' => 'Page about',
                'description' => 'about us'
            ];

            $this -> view('pages/about', $data);

        }

    }

?>