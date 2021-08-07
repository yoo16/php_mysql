<?php
class AdminController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $admin = new Admin();
            if ($admin->auth($_POST['login_name'], $_POST['password'])) {
                Session::save('auth_admin', $admin);
                header('Location: index.php');
            }
            $error_message = 'ユーザ名またはパスワードが間違っています';
        }
        include('app/views/admin/login.view.php');
    }

    public function logout()
    {
        Session::clear('auth_admin');
        header('Location: login.php');
    }

    public function check_auth()
    {
        $this->auth_admin = Session::load('auth_admin');
        if (!$this->auth_admin) {
            header('Location: login.php');
            exit;
        }
    }

    public function index()
    {
        include('app/views/admin/index.view.php');
    }

}
