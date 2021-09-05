<?php
require_once 'config.php';
require_once 'connect.php';

$sql = "SELECT max(defense_power) AS max FROM items";
$item = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
echo $item['max'];

$sql = "SELECT max(attack_power) AS max FROM items";
$item = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
echo $item['max'];