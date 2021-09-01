<?php
require_once 'app/models/User.php';

class RegistController
{
    //入力画面
    public function index()
    {
        $user = new User();
        $user->value = Session::load('member');

        if (empty($user->value['gender'])) $user->value['gender'] = 'male';

        $errors = Session::load('errors');
        Session::clear('errors');

        $template = 'app/views/regist/index.view.php';
        include 'app/views/layouts/app.view.php';
    }

    //演習：確認画面
    public function confirm()
    {
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $posts = $user->check($_POST);
            $errors = $user->validate($posts);
            if ($user->findByEmail($posts['email'])) {
                $errors['email'] = '既に登録されています。';
            }
            Session::save('member', $posts);
            Session::save('errors', $errors);
            if (!$errors) {
                if ($user->insert($posts)) {
                    header('Location: result.php');
                    exit;
                }
            }
            header('Location: index.php');
        }
    }

    //完了画面
    public function result()
    {
        if (isset($_SESSION['member'])) {
            Session::clear('member');
        } else {
            header('Location: index.php');
        }
        $template = 'app/views/regist/result.view.php';
        include 'app/views/layouts/app.view.php';
    }
}
