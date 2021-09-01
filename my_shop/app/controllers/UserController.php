<?php
class UserController
{
    public $auth_user;

    public function __construct()
    {
        $this->auth_user = Session::load('auth_user');
    }

    public function index()
    {

        $template = 'app/views/user/index.view.php';
        include 'app/views/layouts/app.view.php';
    }
    
    public function edit()
    {
        $user = new User();
        $user->value = $this->auth_user;
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $posts = $user->check($_POST);
            $errors = $user->validate($posts);
            if (empty($errors)) {
                if ($user->update($this->auth_user['id'], $posts)) {
                    $user->findById($user['id']);
                    Session::clear('auth_user', $user->value);
                }
            }
        }
    }

    public function logout()
    {
        Session::clear('auth_user');
        header('Location: ../login/');
    }

}
