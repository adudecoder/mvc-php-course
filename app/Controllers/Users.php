<?php

class Users extends Controller
{

    public function register()
    {

        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($form)) {
            $dados = [
                'name' => trim($form['name']),
                'email' => trim($form['email']),
                'password' => trim($form['password']),
                'password_confirm' => trim($form['password_confirm']),
            ];

            if (empty($form['name'])) {
                $dados['error_name'] = 'Fill in the name field';
            }

            if (empty($form['email'])) {
                $dados['error_email'] = 'Fill in the email field';
            }

            if (empty($form['password'])) {
                $dados['error_password'] = 'Fill in the password field';
            } else if (strlen($form['password']) < 6) {
                $dados['error_password'] = 'Password must be at least 6 characters long';
            }

            if (empty($form['password_confirm'])) {
                $dados['error_password_confirm'] = 'Confirm password';
            } else {
                if ($form['password'] != $form['password_confirm']) {
                    $dados['error_password_confirm'] = 'The passwords are different';
                }
            }

            if (!in_array('', $form)) {
                echo 'You can register';
            }

            var_dump($form);
        } else {
            $dados = [
                'name' => '',
                'email' => '',
                'password' => '',
                'password_confirm' => '',
            ];
        }

        $this->view('users/register', $dados);
    }
}
