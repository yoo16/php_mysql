<?php
require_once 'config.php';
require_once 'connect.php';
require_once 'components/user_auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $posts = check($_POST);
    $errors = validate($user);
    if (empty($errors)) {
        $is_success = update($pdo, $user['id'], $posts);
        if ($is_success) {
            $user = findById($pdo, $user['id']);
            $_SESSION['user'] = $user;
        }
    }
}

function check($posts)
{
    foreach ($posts as $column => $post) {
        $posts[$column] = htmlspecialchars($post, ENT_QUOTES, 'UTF-8');
    }
    return $posts;
}

function validate($user)
{
    $errors = [];
    if (empty($user['name'])) {
        $errors['name'] = 'ユーザ名を入力してください';
    }
    if (empty($user['email'])) {
        $errors['email'] = 'メールアドレスを入力してください';
    }
    return $errors;
}

function findById($pdo, $id)
{
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function update($pdo, $id, $data)
{
    $data['id'] = $id;
    $sql = "UPDATE users SET 
                name = :name,
                email = :email,
                gender = :gender
                WHERE id = :id;";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}

function checked($value, $target)
{
    return ($value == $target) ? 'checked' : '';
}

?>

<!DOCTYPE html>
<html lang="ja">

<?php include('components/head.php') ?>

<body>
    <?php include('components/nav.php') ?>

    <div class="container">
        <h2 class="h2 mt-3">ユーザ情報</h2>

        <form action="" method="post">
            <div class="mb-3">
                <label for="">氏名</label>
                <input type="text" class="form-control" 
                    name="name" value="<?= $user['name'] ?>">
                <p class="text-danger"><?= @$errors['name'] ?></p>
            </div>

            <div class="mb-3">
                <label for="">メールアドレス</label>
                <input type="text" class="form-control" 
                    name="email" value="<?= $user['email'] ?>">
                <p class="text-danger"><?= @$errors['email'] ?></p>
            </div>

            <div class="mb-3">
                <div>
                    <label for="">性別</label>
                </div>
                <div class="form-check form-check-inline">
                    <input id="gender_male" class="form-check-input" type="radio" 
                        name="gender" value="male" <?= checked($user['gender'], 'male') ?>>
                    <label for="gender_male" class="form-check-label">男性</label>
                </div>

                <div class="form-check form-check-inline">
                    <input id="gender_female" class="form-check-input" type="radio" 
                        name="gender" value="female" <?= checked($user['gender'], 'female') ?>>
                    <label for="gender_female" class="form-check-label">女性</label>
                </div>
            </div>

            <button class="btn btn-primary">更新</button>
            <a class="btn btn-outline-primary" href="my_page.php">戻る</a>
        </form>
    </div>
</body>

</html>