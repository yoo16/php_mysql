<?php
require_once 'app/models/Item.php';

class ItemController
{
    public function index()
    {
        $item = new Item();
        if (isset($_SESSION['item'])) unset($_SESSION['item']);

        if (isset($_GET['keyword']) || isset($_GET['code'])) {
            $params = $item->check($_GET);
            $items = $item->search($params);
        } else {
            $items = $item->all();
        }

        $template = 'app/views/admin_item/index.view.php';
        include 'app/views/layouts/app.view.php';
    }

    public function input()
    {
        $item = new Item();
        $item->value = Session::load('item');
        $errors = Session::load('errors');
        Session::clear('errors');

        $template = 'app/views/admin_item/input.view.php';
        include 'app/views/layouts/app.view.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $item = new Item();
            $posts = $item->check($_POST);
            $errors = $item->validate($posts);

            //演習：商品コード重複チェック

            //セッション登録
            Session::save('item', $posts);
            Session::save('errors', $errors);

            if (!$errors && $item->insert($posts)) {
                unset($_SESSION['item']);
                header('Location: index.php');
            } else {
                header('Location: input.php');
            }
        }
    }

    public function edit()
    {
        $item = new Item();
        if (!empty($_GET['id'])) $item->findById($_GET['id']);
        if (empty($item->value)) header('Location: index.php');

        $errors = Session::load('errors');
        Session::clear('errors');

        $template = 'app/views/admin_item/edit.view.php';
        include 'app/views/layouts/app.view.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['id'])) return;

            $item = new Item();
            $posts = $item->check($_POST);
            $errors = $item->validate($posts);

            //演習：商品コード重複チェック

            //セッション登録
            Session::save('item', $posts);
            Session::save('errors', $errors);

            if (!$errors && $item->findById($posts['id'])) {
                if ($item->update($posts)) {
                    unset($_SESSION['item']);
                }
            }
            header("Location: index.php");
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $item = new Item();
            $id = $_POST['id'];
            if ($item->findById($id)) {
                $item->delete($id);
            }
            header('Location: index.php');
        }
    }
}
