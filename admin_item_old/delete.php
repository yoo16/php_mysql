<?php
require_once 'config.php';
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    if (findById($pdo, $id)) {
        delete($pdo, $id);
    }
    header('Location: list.php');
}

function delete($pdo, $id)
{
    $sql = "DELETE FROM items SET WHERE id = :id;";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['id' => $id]);
}

function findById($pdo, $id)
{
    $id = htmlspecialchars($id);
    $sql = "SELECT * FROM items WHERE id = {$id}";
    $stmt = $pdo->query($sql);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    return $item;
}
