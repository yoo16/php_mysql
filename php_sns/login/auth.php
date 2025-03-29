<?php
// 設定ファイル「app.php」読み込み
require_once '../app.php';

// POSTリクエストでなければ何も表示しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// セッションにPOSTデータを登録
$_SESSION[APP_KEY]['login'] = $_POST;

// emailとpasswordを取得
$email = $_POST['email'];
$password = $_POST['password'];

// ユーザ認証
$user = auth($email, $password);
if ($user) {
    // ログイン成功の場合、セッションにユーザデータを登録
    $_SESSION[APP_KEY]['user'] = $user;

    // トップページにリダイレクト
    header('Location: ../');
} else {
    //ログイン失敗の場合、login/input.php にリダイレクト
    header('Location: input.php');
}

// ユーザ認証メソッド
function auth($email, $password)
{
    // DB接続
    $pdo = Database::getInstance();
    // SQL作成
    $sql = "SELECT * FROM users WHERE email = :email";
    // プリペアードステートメントを使用してSQLを実行
    $stmt = $pdo->prepare($sql);
    // emailをバインドして executeメソッドでSQLを実行
    $stmt->execute(['email' => $email]);
    // ユーザデータを取得
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // ユーザがいれば、password_verify() を使用して、ハッシュ化されたパスワードと比較
    if ($user && password_verify($password, $user['password'])) {
        // パスワードが一致した場合、ユーザデータを返却
        return $user;
    }
}
