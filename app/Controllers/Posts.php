<?php

class Posts extends Controller
{

    public function __construct()
    {
        if (!Session::loggedInUser()) {
            URL::redirection('users/login');
        }
    }

    public function index()
    {

        $this->view('posts/index');
    }

    public function register()
    {

        // FILTER_SANITIZE_STRING deprecated
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($form)) {
            $dados = [
                'title' => trim($form['title']),
                'text' => trim($form['text'])
            ];

            if (in_array('', $form)) {

                if (empty($form['name'])) {
                    $dados['error_title'] = 'Fill in the title field';
                }

                if (empty($form['email'])) {
                    $dados['error_text'] = 'Fill in the text field';
                }

            } else {
                echo 'Can register post';
            }
        } else {
            $dados = [
                'title' => '',
                'text' => '',
                'error_title' => '',
                'error_text' => ''
            ];
        }

        $this->view('posts/register', $dados);
    }
}
