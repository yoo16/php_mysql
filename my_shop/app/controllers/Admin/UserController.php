<?php
require_once 'app/models/User.php';

class UserController
{
    function index()
    {
        $user = new User();

        //ユーザ数
        $count = $user->count();

        //現在のページ
        $current_page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;

        //limit & offset
        $limit = 10;
        $offset = ($current_page - 1) * $limit;

        //ユーザ一覧データ
        $users = $user->all($limit, $offset);

        //paginate
        $paginate = $user->paginate($count, $current_page, $limit, 5);
        extract($paginate);

        //View
        $template = 'app/views/admin_user/index.view.php';
        include 'app/views/layouts/app.view.php';
    }
}
