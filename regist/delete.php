<?php
require_once 'config.php';
require_once 'connect.php';

function delete($pdo, $id)
{
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['id' => $id]);
}

//POSTデータがあれば書き込み
if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    delete($pdo, $id);
}

header('Location: list.php');