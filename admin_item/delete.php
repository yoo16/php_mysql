<?php
require_once 'config.php';
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['id']) {
        delete($pdo, $item);
    }
    header('Location: list.php');
}

function delete($pdo, $data)
{
    $sql = "DELETE FROM items SET WHERE id = :id;";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}
