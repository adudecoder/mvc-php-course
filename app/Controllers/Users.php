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
                        Session::msgAlert('user','Successfully registered');
                        URL::redirection('users/login');
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

        } else {
            $dados = [
                'name' => '',
                'email' => '',
                'password' => '',
                'password_confirm' => '',
                'error_name' => '',
                'error_email' => '',
                'error_password' => '',
                'error_password_confirm' => '',
            ];
        }

        $this->view('users/register', $dados);
    }

    public function login()
    {

        // FILTER_SANITIZE_STRING deprecated
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($form)) {
            $dados = [
                'email' => trim($form['email']),
                'password' => trim($form['password']),
            ];

            if (in_array('', $form)) {

                if (empty($form['email'])) {
                    $dados['error_email'] = 'Fill in the email field';
                }

                if (empty($form['password'])) {
                    $dados['error_password'] = 'Fill in the password field';
                }
            } else {

                if (Check::checkEmail($form['email'])) {
                    $dados['error_email'] = 'Email is invalid';
                } else {

                    $user = $this->userModel->checkLogin($form['email'], $form['password']);

                    if ($user) {
                        $this->createSessionUser($user);
                    } else {
                        Session::msgAlert('user','username or password is invalid','alert alert-danger');
                    }

                }
            }

            // echo 'Original password: '.$form['password'].'<hr>';
            // echo 'md5 password: '.md5($form['password']).'<hr>';
            // echo 'sha1 password: '.sha1($form['password']).'<hr>';

            // $securePassword = password_hash($form['password'], PASSWORD_DEFAULT);
            // echo 'Hash password: '.$securePassword.'<hr>';

        } else {
            $dados = [
                'email' => '',
                'password' => '',
                'error_email' => '',
                'error_password' => '',
            ];
        }

        $this->view('users/login', $dados);
    }

    private function createSessionUser($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;

        URL::redirection('pages/home');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);

        session_destroy();

        URL::redirection('users/login');
    }
}
