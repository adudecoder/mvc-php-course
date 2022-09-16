<?php

class Users extends Controller {

    public function register() {

        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($form)) {
            $dados = [
                'name' => trim($form['name']),
                'email' => trim($form['email']),
                'password' => trim($form['password']),
                'password_confirm' => trim($form['password_confirm']),
            ];
            var_dump($form);
        } else {
            $dados = [
                'name' => '',
                'email' => '',
                'password' => '',
                'password_confirm' => '',
            ];
        }

        $this -> view('users/register', $dados);
    }

}