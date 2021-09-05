<?php
require_once 'config.php';
require_once 'connect.php';

function findById($pdo, $id)
{
    $sql = "SELECT * FROM items WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    return $item;
}

$item = findById($pdo, 3);
echo $item['name'];
