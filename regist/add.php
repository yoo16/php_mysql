<?php
require_once 'config.php';
require_once 'connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['posts'] = $posts = check($_POST);
    $_SESSION['errors'] = $errors = validate($posts);
    if (!$errors) {
        insert($pdo, $posts);
        unset($_SESSION['posts']);
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
    if (empty($data['password'])) {
        $errors['password'] = 'パスワードを入力してください';
    }
    return $errors;
}

function insert($pdo, $data)
{
    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name, kana, email, password, tel ,birthday_at, gender)
            VALUES (:name, :kana, :email, :password, :tel, :birthday_at, :gender)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}
