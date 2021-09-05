<?php
require_once 'config.php';
require_once 'connect.php';

$sql = "SELECT * FROM items WHERE id = 4";
$item = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
echo $item['name'];