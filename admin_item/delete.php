<?php
require_once 'models/Item.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = new Item();
    $id = $_POST['id'];
    if ($item->findById($id)) {
        $item->delete($id);
    }
    header('Location: list.php');
}
