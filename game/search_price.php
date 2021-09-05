<?php
require_once 'config.php';
require_once 'connect.php';

$sql = "SELECT * FROM items WHERE price >= 100 AND price < 200";
$stmt = $pdo->query($sql);

while ($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $item['name'], PHP_EOL;
}

echo '<br>';

$sql = "SELECT * FROM items WHERE price <= 150";
$stmt = $pdo->query($sql);

while ($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $item['name'], PHP_EOL;
}