<?php
require_once 'app/models/User.php';
class UserController
{
    public $auth_user;

    public function __construct()
    {
        $this->auth_user = Session::load('auth_user');
        if (!$this->auth_user) {
            header('Location: ../login/');
        }
    }

    public function index()
    {
        $template = 'app/views/user/index.view.php';
        include 'app/views/layouts/user.view.php';
    }

    public function logout()
    {
        Session::clear('auth_user');
        header('Location: ../login/');
    }

    public function edit()
    {
        $user = new User();
        $user->value = $this->auth_user;

        $template = 'app/views/user/edit.view.php';
        include 'app/views/layouts/user.view.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $posts = $user->check($_POST);
            $errors = $user->validateEdit($posts);
            if (empty($errors)) {
                $posts['id'] = $this->auth_user['id'];
                if ($user->update($posts)) {
                    //セッション再登録
                    $user->saveAuth($this->auth_user['id']);
                    header('Location: edit.php');
                }
            }
        }
    }

    public function password()
    {
        $template = 'app/views/user/password.view.php';
        include 'app/views/layouts/user.view.php';
    }

    public function update_password()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $errors = $user->validatePassword($_POST);
            if (empty($errors)) {
                $posts = $this->auth_user;
                $posts['password'] = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
                if ($user->update($this->auth_user['id'], $posts)) {
                    //セッション再登録
                    $user->saveAuth($this->auth_user['id']);
                }
            }
        }
    }

}
