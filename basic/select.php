<?php
require_once 'config.php';
require_once 'connect.php';

$sql = 'SELECT * FROM users LIMIT 10;';
$result = $pdo->query($sql);