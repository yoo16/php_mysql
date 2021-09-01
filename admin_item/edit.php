<?php
require_once 'config.php';
require_once 'connect.php';

if (!empty($_GET['id'])) $item = findById($pdo, $_GET['id']);
if (empty($item)) header('Location: list.php');

function findById($pdo, $id)
{
    $sql = "SELECT * FROM items WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    return $item;
}

$template = 'views/admin_item/input.view.php';
include 'views/layouts/app.view.php';
?>