<?php
require_once 'connect.php';
  
$items = [
    [
        ':code' => 'D00001',
        ':name' => 'コーヒー', 
        ':price' => 150,
        ':stock' => 500
    ],
    [
        ':code' => 'D00002',
        ':name' => '紅茶', 
        ':price' => 110,
        ':stock' => 800
    ],
    [
        ':code' => 'D00003',
        ':name' => 'ほうじ茶', 
        ':price' => 130,
        ':stock' => 300
    ],
];

$sql = "INSERT INTO items (code, name, price, amount, created_at);
         VALUES (:code, :name, :price, :amount ,now())
       ";

foreach ($items as $item) {
    $prepare = $pdo->prepare($sql);
    if ($prepare->execute($item)) {
        echo '成功';
    } else {
        echo '失敗';
    }
}