<?php
require_once 'config.php';
require_once 'connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $posts = check($_POST);
    $errors = validate($posts);
    if (findByEmail($pdo, $posts)) {
        $errors['email'] = '既に登録されています。';
    }
    $_SESSION['posts'] = $posts;
    $_SESSION['errors'] = $errors;
    if (!$errors) {
        if (insert($pdo, $posts)) {
            header('Location: result.php');
            exit;
        }
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

function findByEmail($pdo, $data)
{
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function insert($pdo, $data)
{
    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name, email, password, gender)
            VALUES (:name, :email, :password, :gender)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}
