<?php
require_once 'config.php';
require_once 'connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['posts'] = $posts = check($_POST);
    $_SESSION['errors'] = $errors = validate($posts);
    if (!$errors) {
        insert($pdo, $posts);
    }
    header('Location: input.php');
}

function check($posts)
{
    foreach ($posts as $column => $post) {
        $posts[$column] = htmlspecialchars($post, ENT_QUOTES, 'UTF-8');
    }
    return $posts;
}

function validate($data)
{
    $errors = [];
    if (empty($data['name'])) {
        $errors['name'] = 'ユーザ名を入力してください';
    }
    if (empty($data['email'])) {
        $errors['email'] = 'メールアドレスを入力してください';
    }
    return $errors;
}

function insert($pdo, $data)
{
    $sql = "INSERT INTO users (name, kana, email, password, tel ,year, gender)
            VALUES (:name, :kana, :email, :password, :tel, :year, :gender)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}
