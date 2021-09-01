<?php
require_once 'app/models/User.php';

class LoginController
{
    public function index()
    {
        $template = 'app/views/login/index.view.php';
        include 'app/views/layouts/app.view.php';
    }

    public function auth()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $posts = $user->check($_POST);
            if ($user->auth($posts['email'], $posts['password'])) {
                Session::save('auth_user', $user->value);
                header('Location: ../user/');
            } else {
                header('Location: index.php');
            }
        }
    }

}
