<?php

class Posts extends Controller
{

    public function __construct()
    {
        if (!Session::loggedInUser()) {
            URL::redirection('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index()
    {

        $dados = [
            'posts' => $this->postModel->readPosts()
        ];

        $this->view('posts/index', $dados);
    }

    public function register()
    {

        // FILTER_SANITIZE_STRING deprecated
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($form)) {
            $dados = [
                'title' => trim($form['title']),
                'text' => trim($form['text']),
                'id_user' => $_SESSION['user_id']
            ];

            if (in_array('', $form)) {

                if (empty($form['name'])) {
                    $dados['error_title'] = 'Fill in the title field';
                }

                if (empty($form['email'])) {
                    $dados['error_text'] = 'Fill in the text field';
                }
            } else {
                if ($this->postModel->store($dados)) {
                    Session::msgAlert('post', 'Successfully post registered');
                    URL::redirection('posts');
                } else {
                    die("Error storing post in database");
                }
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

    public function edit($id)
    {

        // FILTER_SANITIZE_STRING deprecated
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($form)) {
            $dados = [
                'id' => $id,
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
                if ($this->postModel->store($dados)) {
                    Session::msgAlert('post', 'Post successfully updated');
                    URL::redirection('posts');
                } else {
                    die("Error updating post");
                }
            }
        } else {

            $post = $this->postModel->readPostById($id);

            if ($post->id_user != $_SESSION['id_user']) {
                Session::msgAlert('post', 'You are not authorized to edit this post', 'alert alert-danger');
                URL::redirection('posts');
            }

            $dados = [
                'id' => $post->id,
                'title' => $post->title,
                'text' => $post->text,
                'error_title' => '',
                'error_text' => ''
            ];
        }

        $this->view('posts/edit', $dados);
    }

    public function show($id)
    {
        $post = $this->postModel->readPostById($id);
        $user = $this->userModel->readUserById($post->id_user);

        $dados = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/show', $dados);
    }

    public function delete($id)
    {

        if (!$this->checkAutorization($id)) {

            $id = filter_var($id, FILTER_VALIDATE_INT);

            $method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

            if ($id && $method == 'POST') {
                if ($this->postModel->destroy($id)) {
                    Session::msgAlert('post', 'Post deleted successfully');
                    URL::redirection('posts');
                }
            } else {
                Session::msgAlert('post', 'You are not authorized to delete this post', 'alert alert-danger');
                URL::redirection('posts');
            }
        } else {
            Session::msgAlert('post', 'You are not authorized to delete this post', 'alert alert-danger');
            URL::redirection('posts');
        }
    }

    private function checkAutorization($id)
    {
        $post = $this->postModel->readPostById($id);

        if ($post->id_user != $_SESSION['id_user']) {
            return true;
        } else {
            return false;
        }
    }
}
