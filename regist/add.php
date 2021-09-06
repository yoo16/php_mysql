<?php
require_once 'config.php';
require_once 'connect.php';

session_start();

//POSTリクエストチェック
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: input.php');
    exit;
}

//サニタイズ
$posts = check($_POST);

//バリデーション
$errors = validate($posts);

//セッション登録
$_SESSION['user'] = $posts;
$_SESSION['errors'] = $errors;

//エラーがなければ入力
if ($errors) {
    header('Location: input.php');
    exit;
} else if (insert($pdo, $_POST)) {
    if (!empty($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    header('Location: list.php');
    exit;
}

function check($posts)
{
    if (empty($posts)) return;
    foreach ($posts as $column => $post) {
        $posts[$column] = htmlspecialchars($post, ENT_QUOTES, 'UTF-8');
    }
    return $posts;
}

function validate($data)
{
    $errors = [];
    if (empty($data['name'])) $errors['name'] = '氏名を入力してください。';
    if (empty($data['email'])) $errors['email'] = 'Emailを入力してください。';
    if (empty($data['password'])) $errors['password'] = 'パスワードを入力してください。';
    return $errors;
}

function insert($pdo, $data)
{
    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name, email, password)
            VALUES (:name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}
