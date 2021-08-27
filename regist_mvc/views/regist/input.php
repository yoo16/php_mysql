<!DOCTYPE html>
<html lang="ja">

<?php include('views/components/header.php') ?>

<body>
    <div class="container">
        <h2 class="h2">会員登録</h2>
        <form action="confirm.php" method="post">
            <label for="">氏名</label>
            <input type="text" class="form-control" name="name" value="<?= $member->value['name'] ?>">
            <p class="text-danger"><?= @$errors['name'] ?></p>

            <label for="">ふりがな</label>
            <input type="text" class="form-control" name="kana" value="<?= $member->value['kana'] ?>">

            <label for="">メールアドレス</label>
            <input type="email" class="form-control" name="email" value="<?= $member->value['email'] ?>">
            <p class="text-danger"><?= @$errors['email'] ?></p>

            <label for="">パスワード</label>
            <input type="password" class="form-control" name="password" value="">
            <p class="text-danger"><?= @$errors['password'] ?></p>

            <label for="">電話番号（ハイフンなし）</label>
            <input type="text" class="form-control" name="tel" value="<?= $member->value['tel'] ?>">
            <p class="text-danger"><?= @$errors['tel'] ?></p>

            <label for="">誕生日年</label>
            <input type="date" name="birthday_at" value="<?= $member->value['birthday_at'] ?>" class="form-control">

            <label for="">性別</label>
            <div>
                <input id="gender_male" type="radio" name="gender" value="male" <?= Form::checked($member->value['gender'], 'male') ?>>
                <label for="gender_male">男性</label>

                <input id="gender_female" type="radio" name="gender" value="female" <?= Form::checked($member->value['gender'], 'female') ?>>
                <label for="gender_female">女性</label>
            </div>

            <!-- snippet: button.btn.btn-primary -->
            <button class="btn btn-primary">確認</button>
        </form>
    </div>
</body>

</html>