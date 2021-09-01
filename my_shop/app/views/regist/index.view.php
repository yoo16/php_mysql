<div class="container">
    <h2 class="h2">会員登録</h2>
    <form action="add.php" method="post">
        <div class="form-floating">
            <input type="text" class="form-control" name="name" value="<?= @$user->value['name'] ?>">
            <label for="">氏名</label>
            <p class="text-danger"><?= @$errors['name'] ?></p>
        </div>

        <div class="form-floating">
            <input type="email" class="form-control" name="email" value="<?= @$user->value['email'] ?>">
            <label for="">メールアドレス</label>
            <p class="text-danger"><?= @$errors['email'] ?></p>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" name="password" value="">
            <label for="">パスワード</label>
            <p class="text-danger"><?= @$errors['password'] ?></p>
        </div>

        <div class="mb-3">
            <label for="">性別</label>
            <div>
                <input id="gender_male" type="radio" name="gender" value="male" <?= Form::checked(@$user->value['gender'], 'male') ?>>
                <label for="gender_male">男性</label>

                <input id="gender_female" type="radio" name="gender" value="female" <?= Form::checked(@$user->value['gender'], 'female') ?>>
                <label for="gender_female">女性</label>
            </div>
        </div>

        <button class="btn btn-primary">登録</button>
    </form>
</div>