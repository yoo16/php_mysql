<?php
// app.php を読み込み
require_once '../app.php';

// POSTリクエストでなければ何も表示しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// セッションに保存
$posts = $_SESSION[APP_KEY]['regist'] = $_POST;

if ($posts) {
    // DBに登録
    $result = insert($posts);

    if (isset($result['errors'])) {
        // 登録に失敗した場合はエラーメッセージを表示
        $_SESSION[APP_KEY]['errors'] = $result['errors'];
        // エラーメッセージを表示するために regist.php にリダイレクト
        header('Location: input.php');
        exit;
    } else {
        // 登録完了メッセージを表示するために complete.php にリダイレクト
        header('Location: complete.php');
        exit;
    }
}


// POSTリクエストの場合、ユーザデータを登録
function insert($posts)
{
    // パスワードハッシュ化
    $posts['password'] = password_hash($posts['password'], PASSWORD_DEFAULT);
    // DB接続
    $pdo = Database::getInstance();
    // SQL作成
    $sql = "INSERT INTO users (account_name, email, password, display_name)
        VALUES(:account_name, :email, :password, :display_name);";

    try {
        // SQLを設定して、プリペアードステートメントを生成
        $stmt = $pdo->prepare($sql);
        // SQL実行
        $result = $stmt->execute($posts);
        // 成功した場合は、登録したユーザのIDを取得
        if ($result) {
            $user_id = $pdo->lastInsertId();
            // 登録したユーザのIDを返却
            return $user_id;
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        // var_dump($e->getMessage());
        // exit;
    }
    $result['errors']['public'] = "ユーザの登録に失敗しました。";
    return $result;
}