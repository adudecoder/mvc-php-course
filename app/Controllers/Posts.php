<?php

class Posts extends Controller {

    public function __construct()
    {
        if (!Session::loggedInUser()) {
            URL::redirection('users/login');
        }
    }

    public function index() {

        $this->view('posts/index');

    }
    
}