<?php
session_start();
$member = [
    'name' => '',
    'kana' => '',
    'email' => '',
    'password' => '',
    'tel' => '',
    'year' => 1980,
    'gender' => 'male',
];

if (isset($_SESSION['posts'])) {
    $member = $_SESSION['posts'];
}
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

// var_dump($errors);

function checked($value, $target)
{
    if ($value == $target) {
        return 'checked';
    }
}

function selected($value, $target)
{
    if ($value == $target) {
        return 'selected';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <!-- Bootstrap のインストール（CDN） -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="h2">会員登録</h2>
        <form action="add.php" method="post">
            <div class="form-floating">
                <input type="text" class="form-control" name="name" value="<?= $member['name'] ?>">
                <label for="">氏名</label>
                <p class="text-danger"><?= @$errors['name'] ?></p>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" name="kana" value="<?= $member['kana'] ?>">
                <label for="">ふりがな</label>
                <p></p>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" name="email" value="<?= $member['email'] ?>">
                <label for="">メールアドレス</label>
                <p class="text-danger"><?= @$errors['email'] ?></p>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" name="password" value="">
                <label for="">パスワード</label>
                <p class="text-danger"><?= @$errors['password'] ?></p>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" name="tel" value="<?= $member['tel'] ?>">
                <label for="">電話番号（ハイフンなし）</label>
                <p class="text-danger"><?= @$errors['tel'] ?></p>
            </div>

            <div class="mb-3">
                <label for="">誕生日年</label>
                <div>
                    <select name="year" class="form-control">
                        <option value="">-- 選択してください --</option>
                        <?php foreach (range(date('Y'), 1900) as $year) : ?>
                            <option value="<?= $year ?>" <?= selected($year, $member['year']) ?>><?= $year ?>年</option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="">性別</label>
                <div>
                    <input id="gender_male" type="radio" name="gender" value="male" <?= checked($member['gender'], 'male') ?>>
                    <label for="gender_male">男性</label>

                    <input id="gender_female" type="radio" name="gender" value="female" <?= checked($member['gender'], 'female') ?>>
                    <label for="gender_female">女性</label>
                </div>
            </div>

            <!-- snippet: button.btn.btn-primary -->
            <button class="btn btn-primary">確認</button>
        </form>
    </div>
</body>

</html>