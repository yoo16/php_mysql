<?php
class UserController
{
    public function login()
    {
        $user = new User();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user->auth($_POST['email'], $_POST['password']);
            if ($user->value['id'] > 0) {
                Session::save('auth_user', $user);
                header('Location: index.php');
            }
            $error_message = 'ユーザ名またはパスワードが間違っています';
        }
        include('app/views/user/login.view.php');
    }

    public function logout()
    {
        Session::clear('auth_user');
        header('Location: login.php');
    }

    public function check_auth()
    {
        $this->auth_user = Session::load('auth_user');
        if (!$this->auth_user) {
            header('Location: login.php');
            exit;
        }
    }

    public function index()
    {
        include('app/views/user/index.view.php');
    }

    public function edit()
    {
        $user = new User();
        $user->value = $user->findById($this->auth_user->value['id']);

        $errors = Session::load('errors');
        Session::clear('errors');

        include('app/views/user/edit.view.php');
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            if ($errors = $user->validate($_POST)) {
                Session::save('errors', $errors);
            } else {
                $id = $this->auth_user->value['id'];
                $posts = $user->check($_POST);
                if ($user->update($id, $posts)) {
                    $user->value = $user->findById($id);
                    Session::save('auth_user', $user);
                }
            }
        }
        header('Location: edit.php');
    }
}
