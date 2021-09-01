<?php
require_once 'config.php';
require_once 'connect.php';

echo PHP_EOL;
var_dump($pdo);

$sql = 'SELECT * FROM users LIMIT 10;';
$stmt = $pdo->query($sql);
var_dump($stmt);
exit;

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($users);
