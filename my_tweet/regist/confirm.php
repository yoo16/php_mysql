<?php
require_once('../app.php');

//POSTリクエストチェック
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: input.php');
    exit;
}

//サニタイズ
$regist = check($_POST);
//セッション
$_SESSION['regist'] = $regist;
//バリデーション
if ($errors = validate($pdo, $regist)) {
    $_SESSION['errors'] = $errors;
    header('Location: input.php');
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

function validate($pdo, $data)
{
    $errors = [];
    if (empty($data['name'])) $errors['name'] = '氏名を入力してください。';
    if (empty($data['email'])) {
        $errors['email'] = 'Emailを入力してください。';
    } else if (findByEmail($pdo, $data['email'])) {
        $errors['email'] = 'Emailが登録済みです';
    }
    if (empty($data['password'])) {
        $errors['password'] = 'パスワードを入力してください。';
    } else if (strlen($data['password']) < 6 || strlen($data['password']) > 20) {
        $errors['password'] = 'パスワードは6文字以上、20文字以内で入力してください';
    }
    return $errors;
}

function findByEmail($pdo, $email)
{
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include('../components/head.php') ?>

<body>
    <div class="container">
        <h2 class="h2">アカウント登録</h2>
        <p>
            この内容で登録しますか？
        </p>
        <div class="form-group  mb-3">
            <label for="" class="form-label col-2">氏名</label>
            <?= $regist['name'] ?>
        </div>

        <div class="form-group  mb-3">
            <label for="" class="form-label col-2">メールアドレス</label>
            <?= $regist['email'] ?>
        </div>

        <div>
            <form action="add.php" method="post">
                <?php if (empty($errors)) : ?>
                    <button class="btn btn-primary">登録</button>
                <?php endif ?>
                <a href="input.php" class="btn btn-outline-primary">戻る</a>
            </form>
        </div>
    </div>
</body>

</html>