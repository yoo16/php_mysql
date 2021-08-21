<?php
class AdminUserController
{
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
        $user = new User();
        $count = $user->count();

        $max_page = 10;
        $limit = 10;
        $current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $limit;

        $users = $user->all($limit, $offset);

        $total_page = ceil($count / $limit);
        $pages = Form::paginate($count, $limit, $current_page, $max_page);

        include('app/views/admin_user/index.view.php');
    }
}
