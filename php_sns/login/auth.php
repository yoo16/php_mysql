<?php
// 設定ファイル「app.php」読み込み
require_once '../app.php';

// POSTリクエストでなければ何も表示しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// DB接続
$model = new Model();

// POSTデータ取得
$posts = $_POST;
$email = $posts['email'];
$password = $posts['password'];

// ユーザ認証
if ($user = auth($model->pdo, $email, $password)) {
    // セッションにユーザを登録
    $_SESSION[APP_KEY]['user'] = $user;

    //ログイン成功の場合、user/ にリダイレクト
    header('Location: ../user/');
} else {
    //ログイン失敗の場合、login/input.php にリダイレクト
    header('Location: input.php');
}

// ユーザ認証メソッド
function auth($pdo, $email, $password)
{
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
}
