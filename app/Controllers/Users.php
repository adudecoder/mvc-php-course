<?php

class Users extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {

        // FILTER_SANITIZE_STRING deprecated
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($form)) {
            $dados = [
                'name' => trim($form['name']),
                'email' => trim($form['email']),
                'password' => trim($form['password']),
                'password_confirm' => trim($form['password_confirm']),
            ];

            if (in_array('', $form)) {

                if (empty($form['name'])) {
                    $dados['error_name'] = 'Fill in the name field';
                }

                if (empty($form['email'])) {
                    $dados['error_email'] = 'Fill in the email field';
                }

                if (empty($form['password'])) {
                    $dados['error_password'] = 'Fill in the password field';
                }

                if (empty($form['password_confirm'])) {
                    $dados['error_password_confirm'] = 'Confirm password';
                }
            } else {

                if (Check::checkName($form['name'])) {
                    $dados['error_name'] = 'Form name is invalid';
                } else if (Check::checkEmail($form['email'])) {
                    $dados['error_email'] = 'Email is invalid';
                } else if ($this->userModel->checkEmail($form['email'])) {
                    $dados['error_email'] = 'The email provided is already registered';
                }

                if (strlen($form['password']) < 6) {
                    $dados['error_password'] = 'Password must be at least 6 characters long';
                } else if ($form['password'] != $form['password_confirm']) {
                    $dados['error_password_confirm'] = 'The passwords are different';
                } else {

                    $dados['password'] = password_hash($form['password'], PASSWORD_DEFAULT);

                    if ($this->userModel->store($dados)) {
                        echo 'Successfully registered<hr>';
                    } else {
                        die("Error storing user in database");
                    }

                    // echo 'Successfully registered<hr>';
                }
            }

            // echo 'Original password: '.$form['password'].'<hr>';
            // echo 'md5 password: '.md5($form['password']).'<hr>';
            // echo 'sha1 password: '.sha1($form['password']).'<hr>';

            // $securePassword = password_hash($form['password'], PASSWORD_DEFAULT);
            // echo 'Hash password: '.$securePassword.'<hr>';

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
